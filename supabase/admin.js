// admin.js - Административная панель (УЛУЧШЕННАЯ ВЕРСИЯ)
class AdminPanel {
    constructor() {
        this.citiesCache = null;
        this.storesCache = null;
        this.saveTimeouts = new Map(); // Для debounce автосохранения
        this.isAdmin = false;
        this.init();
    }

    async init() {
        // Проверка аутентификации
        const { data: { session } } = await supabase.auth.getSession();
        
        if (!session) {
            window.location.href = 'index.html';
            return;
        }

        // ПРОВЕРКА ПРАВ АДМИНИСТРАТОРА С УЛУЧШЕННОЙ ОБРАБОТКОЙ
        try {
            const { data: profile, error: profileError } = await supabase
                .from('profiles')
                .select('role')
                .eq('id', session.user.id)
                .single();

            if (profileError || !profile || profile.role !== 'admin') {
                window.notifications.error('Недостаточно прав для доступа к админ-панели');
                setTimeout(() => window.location.href = 'app.html', 2000);
                return;
            }

            this.isAdmin = true;
            console.log('Админ-панель для администратора:', session.user.email);
            
        } catch (error) {
            console.error('Ошибка проверки прав:', error);
            window.notifications.error('Ошибка проверки прав доступа');
            return;
        }

        // Загружаем кэши и инициализируем
        await this.loadCitiesCache();
        await this.loadStoresCache();
        this.initializeAdmin();
        this.setupEventListeners();
        
        window.notifications.success('Админ-панель загружена');
    }

    // ЗАГРУЗКА КЭША ГОРОДОВ С УЛУЧШЕННОЙ ОБРАБОТКОЙ
    async loadCitiesCache() {
        try {
            const { data, error } = await supabase
                .from('locality')
                .select('id, town_ru, town_en, code')
                .order('town_ru');
            
            if (error) throw error;
            
            this.citiesCache = data || [];
            console.log('Загружено городов в кэш:', this.citiesCache.length);
        } catch (error) {
            console.error('Ошибка загрузки кэша городов:', error);
            window.notifications.error('Ошибка загрузки списка городов');
        }
    }

    // ЗАГРУЗКА КЭША МАГАЗИНОВ ДЛЯ ПРОВЕРОК
    async loadStoresCache() {
        try {
            const { data, error } = await supabase
                .from('stores')
                .select('id, shop, locality_id');
            
            if (error) throw error;
            
            this.storesCache = data || [];
            console.log('Загружено магазинов в кэш:', this.storesCache.length);
        } catch (error) {
            console.error('Ошибка загрузки кэша магазинов:', error);
        }
    }

    initializeAdmin() {
        this.initializeShopsTable();
        this.initializeCitiesTable();
    }

    // ТАБЛИЦА МАГАЗИНОВ - ИСПРАВЛЕННАЯ ВЕРСИЯ
	initializeShopsTable() {
		this.shopsTable = new Tabulator("#shops-table", {
			layout: "fitColumns",
			pagination: "local",
			paginationSize: 10,
			paginationSizeSelector: [5, 10, 20, 50],
			columns: [
				{ 
					title: "ID", 
					field: "id", 
					width: 80,
					sorter: "number"
				},
				{ 
					title: "Название", 
					field: "shop", 
					editor: "input",
					headerFilter: "input",
					validator: ["required", "string", "maxLength:100"]
				},
				{ 
					title: "Город", 
					field: "locality_id",
					editor: "list", // ИСПРАВЛЕНО: select → list
					editorParams: {
						values: this.getCitiesForDropdown(),
						allowEmpty: false
					},
					formatter: (cell) => {
						const cityId = cell.getValue();
						const city = this.citiesCache.find(c => c.id === cityId);
						return city ? city.town_ru : 'Не указан';
					},
					headerFilter: "list", // ИСПРАВЛЕНО: select → list
					headerFilterParams: {
						values: this.getCitiesForDropdown()
					},
					validator: "required"
				},
				{ 
					title: "Улица", 
					field: "street", 
					editor: "input",
					validator: "maxLength:200"
				},
				{ 
					title: "Дом", 
					field: "house", 
					editor: "input",
					width: 100,
					validator: "maxLength:20"
				},
				{ 
					title: "Телефон", 
					field: "phone", 
					editor: "input",
					validator: "maxLength:20"
				},
				{ 
					title: "Дата обновления", 
					field: "updated_store",
					width: 150,
					formatter: (cell) => {
						const value = cell.getValue();
						if (!value) return '-';
						return new Date(value).toLocaleDateString('ru-RU');
					}
				},
				{ 
					title: "Действия", 
					formatter: this.actionsFormatter, 
					cellClick: (e, cell) => {
						const data = cell.getRow().getData();
						if (e.target.classList.contains('delete-btn')) {
							this.deleteShop(data.id, data.shop);
						}
						// УБИРАЕМ editShop - используем встроенное редактирование
					},
					width: 120,
					headerSort: false
				}
			],
			// АВТОСОХРАНЕНИЕ С DEBOUNCE
			cellEdited: (cell) => {
				const rowData = cell.getRow().getData();
				this.debouncedSave('shop', rowData, () => {
					this.saveShopEdit(rowData);
				});
			}
		});

		this.loadShopsData();
	}

    // DEBOUNCE ДЛЯ АВТОСОХРАНЕНИЯ
    debouncedSave(type, data, saveFunction) {
        const key = `${type}_${data.id}`;
        
        // Очищаем предыдущий таймер
        if (this.saveTimeouts.has(key)) {
            clearTimeout(this.saveTimeouts.get(key));
        }
        
        // Устанавливаем новый таймер
        const timeout = setTimeout(() => {
            saveFunction();
            this.saveTimeouts.delete(key);
        }, 1000); // 1 секунда задержки
        
        this.saveTimeouts.set(key, timeout);
    }

    // ЗАГРУЗКА ДАННЫХ МАГАЗИНОВ С ИНДИКАТОРОМ ЗАГРУЗКИ
    async loadShopsData() {
        try {
            this.showTableLoading('shops-table');
            
            const { data, error } = await supabase
                .from('stores')
                .select(`
                    *,
                    locality:locality_id (town_ru, town_en, code)
                `)
                .order('id', { ascending: true });

            if (error) throw error;
            
            const formattedData = (data || []).map(shop => ({
                ...shop,
                city_name: shop.locality?.town_ru || 'Не указан'
            }));
            
            this.shopsTable.setData(formattedData);
            console.log('Загружено магазинов:', formattedData.length);
            
        } catch (error) {
            console.error('Ошибка загрузки магазинов:', error);
            window.notifications.error('Ошибка загрузки магазинов: ' + error.message);
        } finally {
            this.hideTableLoading('shops-table');
        }
    }

    // СОХРАНЕНИЕ ИЗМЕНЕНИЙ МАГАЗИНА С ОБРАБОТКОЙ ОШИБОК
    async saveShopEdit(shopData) {
        try {
            // Показываем индикатор сохранения
            this.showSavingIndicator(shopData.id, 'shop');
            
            const { locality, city_name, ...cleanData } = shopData;
            
            // Добавляем timestamp обновления
            cleanData.updated_store = new Date().toISOString();
            
            const { error } = await supabase
                .from('stores')
                .update(cleanData)
                .eq('id', shopData.id);

            if (error) throw error;

            window.notifications.success('Изменения магазина сохранены');
            
        } catch (error) {
            console.error('Ошибка сохранения магазина:', error);
            window.notifications.error('Ошибка сохранения: ' + error.message);
            // Перезагружаем данные чтобы откатить изменения
            this.loadShopsData();
        } finally {
            this.hideSavingIndicator(shopData.id, 'shop');
        }
    }

    // ТАБЛИЦА ГОРОДОВ - ИСПРАВЛЕННАЯ ВЕРСИЯ
	initializeCitiesTable() {
		this.citiesTable = new Tabulator("#cities-table", {
			layout: "fitColumns",
			pagination: "local",
			paginationSize: 10,
			columns: [
				{ 
					title: "ID", 
					field: "id", 
					width: 80,
					sorter: "number" 
				},
				{ 
					title: "Город (RU)", 
					field: "town_ru", 
					editor: "input",
					headerFilter: "input",
					validator: ["required", "string", "maxLength:100"]
				},
				{ 
					title: "Город (EN)", 
					field: "town_en", 
					editor: "input",
					headerFilter: "input",
					validator: ["maxLength:100"]
				},
				{ 
					title: "Код", 
					field: "code", 
					editor: "input", 
					width: 100,
					validator: ["maxLength:10"]
				},
				{ 
					title: "Действия", 
					formatter: this.actionsFormatter, 
					cellClick: (e, cell) => {
						const data = cell.getRow().getData();
						if (e.target.classList.contains('delete-btn')) {
							this.deleteCity(data.id, data.town_ru);
						}
					},
					width: 80,
					headerSort: false
				}
			],
			// АВТОСОХРАНЕНИЕ ДЛЯ ГОРОДОВ
			cellEdited: (cell) => {
				const rowData = cell.getRow().getData();
				this.debouncedSave('city', rowData, () => {
					this.saveCityEdit(rowData);
				});
			}
		});

		this.loadCitiesData();
	}

    // ЗАГРУЗКА ДАННЫХ ГОРОДОВ
    async loadCitiesData() {
        try {
            this.showTableLoading('cities-table');
            
            const { data, error } = await supabase
                .from('locality')
                .select('*')
                .order('town_ru', { ascending: true });

            if (error) throw error;
            
            this.citiesTable.setData(data || []);
            
        } catch (error) {
            console.error('Ошибка загрузки городов:', error);
            window.notifications.error('Ошибка загрузки городов: ' + error.message);
        } finally {
            this.hideTableLoading('cities-table');
        }
    }

    // СОХРАНЕНИЕ ИЗМЕНЕНИЙ ГОРОДА
    async saveCityEdit(cityData) {
        try {
            this.showSavingIndicator(cityData.id, 'city');
            
            const { error } = await supabase
                .from('locality')
                .update(cityData)
                .eq('id', cityData.id);

            if (error) throw error;

            window.notifications.success('Город сохранен');
            // Обновляем кэш
            await this.loadCitiesCache();
            
        } catch (error) {
            console.error('Ошибка сохранения города:', error);
            window.notifications.error('Ошибка сохранения города: ' + error.message);
            this.loadCitiesData();
        } finally {
            this.hideSavingIndicator(cityData.id, 'city');
        }
    }

    // ФОРМАТТЕР КНОПОК ДЕЙСТВИЙ - УПРОЩЕННАЯ ВЕРСИЯ
	actionsFormatter(cell) {
		const rowData = cell.getRow().getData();
		const isSaving = cell.getRow().getElement().classList.contains('saving');
		
		return `
			<button class="delete-btn" title="Удалить" ${isSaving ? 'disabled' : ''}>
				🗑️
			</button>
		`;
	}

    // УДАЛЕНИЕ МАГАЗИНА С ПОДТВЕРЖДЕНИЕМ
    async deleteShop(shopId, shopName) {
        if (!confirm(`Вы уверены, что хотите удалить магазин "${shopName}"?`)) return;

        try {
            // ПРОВЕРКА ИСПОЛЬЗОВАНИЯ МАГАЗИНА В ПОКУПКАХ
            const { data: purchases, error: checkError } = await supabase
                .from('shops')
                .select('id')
                .eq('store_id', shopId)
                .limit(1);

            if (checkError) throw checkError;
            
            if (purchases && purchases.length > 0) {
                window.notifications.error('Нельзя удалить магазин: он используется в покупках');
                return;
            }

            const { error } = await supabase
                .from('stores')
                .delete()
                .eq('id', shopId);

            if (error) throw error;

            window.notifications.success('Магазин успешно удален');
            this.loadShopsData();
            
        } catch (error) {
            console.error('Ошибка удаления магазина:', error);
            window.notifications.error('Ошибка удаления магазина: ' + error.message);
        }
    }

    // УДАЛЕНИЕ ГОРОДА С ПРОВЕРКОЙ ИСПОЛЬЗОВАНИЯ
    async deleteCity(cityId, cityName) {
        if (!confirm(`Вы уверены, что хотите удалить город "${cityName}"?`)) return;

        try {
            // ПРОВЕРКА ИСПОЛЬЗОВАНИЯ ГОРОДА В МАГАЗИНАХ
            const { data: storesUsingCity, error: checkError } = await supabase
                .from('stores')
                .select('id, shop')
                .eq('locality_id', cityId)
                .limit(1);

            if (checkError) throw checkError;
            
            if (storesUsingCity && storesUsingCity.length > 0) {
                window.notifications.error(
                    `Нельзя удалить город: используется в магазине "${storesUsingCity[0].shop}"`
                );
                return;
            }

            const { error } = await supabase
                .from('locality')
                .delete()
                .eq('id', cityId);

            if (error) throw error;

            window.notifications.success('Город успешно удален');
            this.loadCitiesData();
            await this.loadCitiesCache();
            
        } catch (error) {
            console.error('Ошибка удаления города:', error);
            window.notifications.error('Ошибка удаления города: ' + error.message);
        }
    }

    // ПОЛУЧЕНИЕ ГОРОДОВ ДЛЯ ВЫПАДАЮЩЕГО СПИСКА
    getCitiesForDropdown() {
        if (!this.citiesCache) return {};
        
        return this.citiesCache.reduce((acc, city) => {
            acc[city.id] = city.town_ru;
            return acc;
        }, {});
    }

    // ИНДИКАТОРЫ ЗАГРУЗКИ И СОХРАНЕНИЯ
    showTableLoading(tableId) {
        const tableElement = document.getElementById(tableId);
        if (tableElement) {
            tableElement.classList.add('loading');
        }
    }

    hideTableLoading(tableId) {
        const tableElement = document.getElementById(tableId);
        if (tableElement) {
            tableElement.classList.remove('loading');
        }
    }

    showSavingIndicator(id, type) {
        const table = type === 'shop' ? this.shopsTable : this.citiesTable;
        const row = table.getRow(id);
        if (row) {
            row.getElement().classList.add('saving');
            table.redraw();
        }
    }

    hideSavingIndicator(id, type) {
        const table = type === 'shop' ? this.shopsTable : this.citiesTable;
        const row = table.getRow(id);
        if (row) {
            row.getElement().classList.remove('saving');
            table.redraw();
        }
    }

    showValidationError(cell, message) {
        window.notifications.error(message);
    }

    // НАСТРОЙКА СОБЫТИЙ
    setupEventListeners() {
        // Навигация по вкладкам
        document.getElementById('shops-tab').addEventListener('click', () => this.switchTab('shops'));
        document.getElementById('cities-tab').addEventListener('click', () => this.switchTab('cities'));
        
        // Кнопки управления
        document.getElementById('back-to-app').addEventListener('click', () => {
            window.location.href = 'app.html';
        });

        document.getElementById('logout-btn').addEventListener('click', () => {
            window.authManager.signOut();
        });

        // Кнопки добавления
        document.getElementById('add-shop').addEventListener('click', () => this.addNewShop());
        document.getElementById('add-city').addEventListener('click', () => this.addNewCity());
		
		// Формы добавления
		document.getElementById('add-shop-form').addEventListener('submit', (e) => {
			e.preventDefault();
			this.handleAddShopSubmit(e);
		});
		
		document.getElementById('add-city-form').addEventListener('submit', (e) => {
			e.preventDefault();
			this.handleAddCitySubmit(e);
		});
    }
	
	// ОБРАБОТЧИКИ ФОРМ
	handleAddShopSubmit(e) {
		const formData = {
			name: document.getElementById('new-shop-name').value,
			cityId: document.getElementById('new-shop-city').value,
			street: document.getElementById('new-shop-street').value,
			house: document.getElementById('new-shop-house').value,
			phone: document.getElementById('new-shop-phone').value
		};
		
		if (!formData.name || !formData.cityId) {
			window.notifications.error('Заполните обязательные поля');
			return;
		}
		
		this.saveNewShop(formData);
	}

	handleAddCitySubmit(e) {
		const formData = {
			nameRu: document.getElementById('new-city-ru').value,
			nameEn: document.getElementById('new-city-en').value,
			code: document.getElementById('new-city-code').value
		};
		
		if (!formData.nameRu) {
			window.notifications.error('Название города обязательно');
			return;
		}
		
		this.saveNewCity(formData);
	}

    // ПЕРЕКЛЮЧЕНИЕ ВКЛАДОК
    switchTab(tabName) {
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelectorAll('.tab-button').forEach(btn => {
            btn.classList.remove('active');
        });
        
        document.getElementById(`${tabName}-section`).classList.add('active');
        document.getElementById(`${tabName}-tab`).classList.add('active');
        
        window.notifications.info(`Открыта вкладка: ${tabName === 'shops' ? 'Магазины' : 'Города'}`);
    }

    // ОБНОВЛЕННЫЙ МЕТОД ДОБАВЛЕНИЯ МАГАЗИНА С ФОРМОЙ
	async addNewShop() {
		this.showAddShopForm();
	}

    // ОБНОВЛЕННЫЙ МЕТОД ДОБАВЛЕНИЯ ГОРОДА С ФОРМОЙ  
	async addNewCity() {
		this.showAddCityForm();
	}
	
	// ПОКАЗАТЬ ФОРМУ ДОБАВЛЕНИЯ МАГАЗИНА
	showAddShopForm() {
		const modal = document.getElementById('add-shop-modal');
		const citySelect = document.getElementById('new-shop-city');
		
		// Заполняем список городов
		citySelect.innerHTML = '<option value="">Выберите город</option>';
		this.citiesCache.forEach(city => {
			const option = document.createElement('option');
			option.value = city.id;
			option.textContent = city.town_ru;
			citySelect.appendChild(option);
		});
		
		modal.style.display = 'block';
	}

	// ПОКАЗАТЬ ФОРМУ ДОБАВЛЕНИЯ ГОРОДА
	showAddCityForm() {
		const modal = document.getElementById('add-city-modal');
		modal.style.display = 'block';
	}

	// СОХРАНЕНИЕ НОВОГО МАГАЗИНА ИЗ ФОРМЫ
	async saveNewShop(formData) {
		try {
			const { data: maxIdData } = await supabase
				.from('stores')
				.select('id')
				.order('id', { ascending: false })
				.limit(1);

			const nextId = maxIdData && maxIdData[0] ? maxIdData[0].id + 1 : 1;

			const newShop = {
				id: nextId,
				shop: formData.name,
				locality_id: parseInt(formData.cityId),
				street: formData.street || '',
				house: formData.house || '',
				phone: formData.phone || '',
				date_store: new Date().toISOString().split('T')[0],
				updated_store: new Date().toISOString()
			};

			const { data, error } = await supabase
				.from('stores')
				.insert([newShop])
				.select();

			if (error) throw error;

			window.notifications.success('Магазин успешно добавлен!');
			this.loadShopsData();
			closeModal('add-shop-modal');
			
		} catch (error) {
			console.error('Ошибка добавления магазина:', error);
			window.notifications.error('Ошибка добавления магазина: ' + error.message);
		}
	}

	// СОХРАНЕНИЕ НОВОГО ГОРОДА ИЗ ФОРМЫ
	async saveNewCity(formData) {
		try {
			const { data: maxIdData } = await supabase
				.from('locality')
				.select('id')
				.order('id', { ascending: false })
				.limit(1);

			const nextId = maxIdData && maxIdData[0] ? maxIdData[0].id + 1 : 1;

			const newCity = {
				id: nextId,
				town_ru: formData.nameRu,
				town_en: formData.nameEn || '',
				code: formData.code || ''
			};

			const { data, error } = await supabase
				.from('locality')
				.insert([newCity])
				.select();

			if (error) throw error;

			window.notifications.success('Город успешно добавлен!');
			this.loadCitiesData();
			await this.loadCitiesCache();
			closeModal('add-city-modal');
			
		} catch (error) {
			console.error('Ошибка добавления города:', error);
			window.notifications.error('Ошибка добавления города: ' + error.message);
		}
	}
}

// Глобальная функция закрытия модальных окон (добавьте в конец admin.js)
function closeModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal) {
        modal.style.display = 'none';
        // Очищаем форму
        const form = modal.querySelector('form');
        if (form) form.reset();
    }
}

// Запускаем админ-панель когда DOM готов
document.addEventListener('DOMContentLoaded', () => {
    window.adminPanel = new AdminPanel();
});