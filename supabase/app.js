// app.js - Основное приложение
class ShoppingApp {
    constructor() {
        this.storesCache = null;
        this.user = null;
        this.currentPage = 1;
        this.pageSize = 50;
        this.totalRecords = 0;
        this.table = null;
        this.paginationContainer = null;
        this.paginationInfo = null;
        this.init();
    }

    async init() {
        const { data: { session } } = await supabase.auth.getSession();
        
        if (!session) {
            window.location.href = 'index.html';
            return;
        }

        console.log('Запуск приложения для пользователя:', session.user.email);
        this.user = session.user;
        
        await this.loadStoresCache();
        this.loadPurchasesData();
        this.setupEventListeners();
        this.initializePurchaseForm();
    }

    // ЗАГРУЗКА КЭША МАГАЗИНОВ
    async loadStoresCache() {
        try {
            const { data, error } = await supabase
                .from('stores')
                .select(`
                    *,
                    locality:locality_id (town_ru)
                `)
                .order('shop', { ascending: true });

            if (error) throw error;
            
            this.storesCache = data || [];
            console.log('Загружено магазинов в кэш:', this.storesCache.length);
        } catch (error) {
            console.error('Ошибка загрузки кэша магазинов:', error);
            this.storesCache = [];
        }
    }

    // ОСНОВНАЯ ФУНКЦИЯ ДЛЯ ЗАГРУЗКИ ДАННЫХ С СЕРВЕРНОЙ ПАГИНАЦИЕЙ
    async loadPurchasesData(page = this.currentPage, pageSize = this.pageSize) {
        try {
            if (!this.user || !this.user.id) {
                console.error('Пользователь не загружен');
                return;
            }

            console.log(`Загрузка страницы ${page}, размер: ${pageSize} для пользователя:`, this.user.id);
            
            const from = (page - 1) * pageSize;
            const to = from + pageSize - 1;

            const { data, error, count } = await supabase
                .from('shops')
                .select(`
                    *,
                    store:store_id (
                        shop,
                        street,
                        house,
                        locality:locality_id (
                            town_ru
                        )
                    )
                `, { count: 'exact' })
                .eq('user_id', this.user.id)
                .order('date', { ascending: false })
                .range(from, to);

            if (error) throw error;

            const processedData = (data || []).map(row => ({
                ...row,
                full_address: this.formatAddress(row.store)
            }));

            console.log(`Загружено: ${processedData.length} записей из ${count}`);

            document.getElementById('loading').style.display = 'none';
            this.initializeTable(processedData, count, page, pageSize);
            
        } catch (error) {
            console.error('Общая ошибка:', error);
            document.getElementById('loading').textContent = 'Ошибка при загрузке данных: ' + error.message;
            window.notifications.error('Ошибка загрузки данных: ' + error.message);
        }
    }

    // ФОРМИРОВАНИЕ АДРЕСА ИЗ КОМПОНЕНТОВ
    formatAddress(store) {
        if (!store) return 'Не указан';
        
        const parts = [];
        if (store.locality?.town_ru) parts.push(store.locality.town_ru);
        if (store.street && store.street !== 'Empty') parts.push(`ул. ${store.street}`);
        if (store.house && store.house !== 'Empty') parts.push(`д. ${store.house}`);
        
        return parts.length > 0 ? parts.join(', ') : 'Адрес не указан';
    }

    initializeTable(data, totalRecords = 0, currentPage = 1, pageSize = 50) {
        this.currentPage = currentPage;
        this.pageSize = pageSize;
        this.totalRecords = totalRecords;

        // Уничтожаем старую таблицу если есть
        if (this.table) {
            this.table.destroy();
        }

        // Удаляем старые контролы пагинации
        if (this.paginationContainer && this.paginationContainer.parentElement) {
            this.paginationContainer.remove();
        }

        // Инициализируем Tabulator БЕЗ встроенной пагинации
        this.table = new Tabulator('#purchases-table', {
            data: data,
            layout: "fitColumns",
            movableColumns: true,
            maxHeight: "100%",
            columns: [
                {
                    title: "ID",
                    field: "id",
                    width: 80,
                    hozAlign: "left",
                    sorter: "number"
                },
                {
                    title: "Дата",
                    field: "date",
                    width: 100,
                    hozAlign: "center",
                    headerFilter: "input",
                    sorter: "date",
                    sorterParams: { format: "yyyy-MM-dd" },
                    formatter: (cell) => {
                        const dateValue = cell.getValue();
                        if (!dateValue) return '-';
                        const dateObj = new Date(dateValue + 'T00:00:00');
                        return dateObj.toLocaleDateString('ru-RU');
                    }
                },
                { 
                    title: "Товар", 
                    field: "name", 
                    width: 150,
                    headerFilter: "input",
                    tooltip: true
                },
                { 
                    title: "Магазин", 
                    field: "store.shop",
                    width: 150,
                    headerFilter: "input",
                    formatter: (cell) => {
                        const store = cell.getRow().getData().store;
                        return store?.shop || 'Не указан';
                    }
                },
                { 
                    title: "Адрес", 
                    field: "full_address",
                    width: 250,
                    headerFilter: "input",
                    formatter: (cell) => {
                        const store = cell.getRow().getData().store;
                        return this.formatAddress(store);
                    },
                    tooltip: true
                },
                {
                    title: "Категория",
                    field: "gruppa",
                    width: 150,
                    headerFilter: "input",
                    tooltip: true
                },
                {
                    title: "Кол-во",
                    field: "quantity",
                    width: 100,
                    hozAlign: "right",
                    sorter: "number",
                    formatter: (cell) => {
                        const quantity = cell.getValue();
                        const item = cell.getRow().getData().item;
                        return quantity ? `${quantity} ${item || 'шт.'}` : '-';
                    }
                },
                {
                    title: "Цена, ₽",
                    field: "price",
                    width: 100,
                    hozAlign: "right",
                    sorter: "number",
                    formatter: "money",
                    formatterParams: {
                        symbol: "₽",
                        symbolAfter: true,
                        thousand: " ",
                        decimal: ".",
                        precision: 2
                    }
                },
                {
                    title: "Сумма, ₽",
                    field: "amount",
                    width: 100,
                    hozAlign: "right",
                    sorter: "number",
                    formatter: "money",
                    formatterParams: {
                        symbol: "₽",
                        symbolAfter: true,
                        thousand: " ",
                        decimal: ".",
                        precision: 2
                    }
                },
                {
                    title: "Характеристики",
                    field: "characteristic",
                    width: 150,
                    headerFilter: "input",
                    formatter: (cell) => {
                        const value = cell.getValue();
                        return value || '-';
                    },
                    tooltip: true
                },
                {
                    title: "Действия",
                    width: 100,
                    hozAlign: "center",
                    formatter: (cell) => {
                        return `
                            <button class="edit-purchase-btn" title="Редактировать">✏️</button>
                            <button class="delete-purchase-btn" title="Удалить">🗑️</button>
                        `;
                    },
                    cellClick: (e, cell) => {
                        const rowData = cell.getRow().getData();
                        if (e.target.classList.contains('edit-purchase-btn')) {
                            this.showPurchaseForm(rowData);
                        } else if (e.target.classList.contains('delete-purchase-btn')) {
                            this.deletePurchase(rowData.id);
                        }
                    }
                }
            ]
        });

        // СОЗДАЕМ КОНТРОЛЫ ПАГИНАЦИИ ПОСЛЕ ТАБЛИЦЫ
        this.createPaginationControls();
    }

    // СОЗДАНИЕ КОНТРОЛОВ ПАГИНАЦИИ
    createPaginationControls() {
        // Создаем контейнер для пагинации
        const container = document.createElement('div');
        container.className = 'pagination-controls';
        
        // Информация о странице
        const pageInfo = document.createElement('span');
        pageInfo.className = 'page-info';

        // Кнопка "Назад"
        const prevBtn = document.createElement('button');
        prevBtn.innerHTML = '◀ Назад';
        prevBtn.className = 'btn-secondary';
        prevBtn.onclick = () => this.previousPage();

        // Кнопка "Вперед"  
        const nextBtn = document.createElement('button');
        nextBtn.innerHTML = 'Вперед ▶';
        nextBtn.className = 'btn-secondary';
        nextBtn.onclick = () => this.nextPage();

        // Селектор размера страницы
        const sizeSelect = document.createElement('select');
        sizeSelect.innerHTML = `
            <option value="20">20 записей</option>
            <option value="50" ${this.pageSize === 50 ? 'selected' : ''}>50 записей</option>
            <option value="100" ${this.pageSize === 100 ? 'selected' : ''}>100 записей</option>
            <option value="200" ${this.pageSize === 200 ? 'selected' : ''}>200 записей</option>
        `;
        sizeSelect.onchange = (e) => this.changePageSize(parseInt(e.target.value));

        container.appendChild(prevBtn);
        container.appendChild(pageInfo);
        container.appendChild(nextBtn);
        container.appendChild(sizeSelect);

        // Добавляем пагинацию ПОД таблицей
        const tableElement = document.getElementById('purchases-table');
        tableElement.parentNode.insertBefore(container, tableElement.nextSibling);

        this.paginationInfo = pageInfo;
        this.paginationContainer = container;

        this.updatePaginationInfo();
    }

    // ОБНОВЛЕНИЕ ИНФОРМАЦИИ О ПАГИНАЦИИ
    updatePaginationInfo() {
        if (!this.paginationInfo || !this.totalRecords) return;

        const totalPages = Math.ceil(this.totalRecords / this.pageSize);
        const startRecord = (this.currentPage - 1) * this.pageSize + 1;
        const endRecord = Math.min(this.currentPage * this.pageSize, this.totalRecords);

        this.paginationInfo.textContent = 
            `Страница ${this.currentPage} из ${totalPages} | ` +
            `Записи ${startRecord}-${endRecord} из ${this.totalRecords}`;

        // Обновляем состояние кнопок
        const prevBtn = this.paginationContainer.querySelector('button:first-child');
        const nextBtn = this.paginationContainer.querySelector('button:nth-child(3)');
        
        if (prevBtn) prevBtn.disabled = this.currentPage <= 1;
        if (nextBtn) nextBtn.disabled = this.currentPage >= totalPages;
    }

    // ПЕРЕХОД К СЛЕДУЮЩЕЙ СТРАНИЦЕ
    async nextPage() {
        const totalPages = Math.ceil(this.totalRecords / this.pageSize);
        if (this.currentPage < totalPages) {
            this.currentPage++;
            await this.loadPurchasesData(this.currentPage, this.pageSize);
        }
    }

    // ПЕРЕХОД К ПРЕДЫДУЩЕЙ СТРАНИЦЕ  
    async previousPage() {
        if (this.currentPage > 1) {
            this.currentPage--;
            await this.loadPurchasesData(this.currentPage, this.pageSize);
        }
    }

    // ИЗМЕНЕНИЕ РАЗМЕРА СТРАНИЦЫ
    async changePageSize(newSize) {
        this.pageSize = newSize;
        this.currentPage = 1;
        await this.loadPurchasesData(this.currentPage, this.pageSize);
    }

    setupEventListeners() {
        document.getElementById('admin-btn').addEventListener('click', () => {
            window.location.href = 'admin.html';
        });
        
        document.getElementById('add-purchase-btn').addEventListener('click', () => {
            this.showPurchaseForm();
        });
        
        document.getElementById('logout-btn').addEventListener('click', () => {
            window.authManager.signOut();
        });

        document.getElementById('refresh-btn').addEventListener('click', () => {
            this.refreshData();
        });
    }

    // ОБНОВЛЕНИЕ ДАННЫХ
    async refreshData() {
        document.getElementById('loading').style.display = 'block';
        document.getElementById('loading').textContent = 'Обновление данных...';
        
        await this.loadStoresCache();
        await this.loadPurchasesData(this.currentPage, this.pageSize);
    }

    // ИНИЦИАЛИЗАЦИЯ ФОРМЫ ПОКУПКИ
    initializePurchaseForm() {
        this.loadStoresIntoForm();
        this.loadCategoriesAndUnits();
        this.setupFormEventListeners();
        this.setupModalHandlers();
    }

    // ЗАГРУЗКА МАГАЗИНОВ В ВЫПАДАЮЩИЙ СПИСОК
    loadStoresIntoForm() {
        const storeSelect = document.getElementById('purchase-store');
        if (!storeSelect) {
            console.error('Элемент purchase-store не найден!');
            return;
        }
        
        storeSelect.innerHTML = '<option value="">Выберите магазин</option>';
        
        this.storesCache.forEach(store => {
            const option = document.createElement('option');
            option.value = store.id;
            option.textContent = `${store.shop} (${this.formatAddress(store)})`;
            storeSelect.appendChild(option);
        });
    }

    // АВТОМАТИЧЕСКОЕ ЗАПОЛНЕНИЕ КАТЕГОРИЙ И ЕДИНИЦ ИЗ БАЗЫ
	async loadCategoriesAndUnits() {
		try {
			console.log('Загрузка ВСЕХ категорий и единиц из базы...');
			
			// ЗАГРУЖАЕМ ВСЕ уникальные категории с ПАГИНАЦИЕЙ
			let allCategories = [];
			let from = 0;
			const pageSize = 1000;
			let hasMore = true;

			while (hasMore) {
				const { data: categoriesPage, error: categoriesError } = await supabase
					.from('shops')
					.select('gruppa')
					.not('gruppa', 'is', null)
					.range(from, from + pageSize - 1);

				if (categoriesError) throw categoriesError;
				
				if (!categoriesPage || categoriesPage.length === 0) {
					hasMore = false;
				} else {
					allCategories = allCategories.concat(categoriesPage.map(item => item.gruppa));
					from += pageSize;
					
					// Защита от бесконечного цикла
					if (from > 10000) {
						console.warn('Достигнут лимит загрузки категорий');
						hasMore = false;
					}
				}
			}

			// Извлекаем уникальные категории и сортируем
			const uniqueCategories = [...new Set(allCategories)].filter(Boolean).sort();
			console.log('Найдено категорий ВСЕГО:', uniqueCategories.length);
			
			this.populateSelect('purchase-category', uniqueCategories, 'Выберите категорию');
			
			// АНАЛОГИЧНО ДЛЯ ЕДИНИЦ ИЗМЕРЕНИЯ
			let allUnits = [];
			from = 0;
			hasMore = true;

			while (hasMore) {
				const { data: unitsPage, error: unitsError } = await supabase
					.from('shops')
					.select('item')
					.not('item', 'is', null)
					.range(from, from + pageSize - 1);

				if (unitsError) throw unitsError;
				
				if (!unitsPage || unitsPage.length === 0) {
					hasMore = false;
				} else {
					allUnits = allUnits.concat(unitsPage.map(item => item.item));
					from += pageSize;
					
					if (from > 10000) {
						console.warn('Достигнут лимит загрузки единиц измерения');
						hasMore = false;
					}
				}
			}

			const uniqueUnits = [...new Set(allUnits)].filter(Boolean).sort();
			console.log('Найдено единиц измерения ВСЕГО:', uniqueUnits.length);
			
			this.populateSelect('purchase-unit', uniqueUnits, 'шт.', true);
			
		} catch (error) {
			console.error('Ошибка загрузки категорий и единиц:', error);
			// В случае ошибки используем стандартные значения
			this.loadDefaultCategoriesAndUnits();
		}
	}

    // ЗАПОЛНЕНИЕ SELECT ЭЛЕМЕНТА (ИСПРАВЛЕННАЯ ВЕРСИЯ)
    populateSelect(selectId, values, defaultValue = '', isUnit = false) {
        const select = document.getElementById(selectId);
        if (!select) {
            console.error('Элемент не найден:', selectId);
            return;
        }
        
        const currentValue = select.value;
        select.innerHTML = '';
        
        // УБИРАЕМ атрибут size чтобы был нормальный выпадающий список
        select.removeAttribute('size');
        
        if (!isUnit) {
            const defaultOption = document.createElement('option');
            defaultOption.value = '';
            defaultOption.textContent = 'Выберите категорию';
            defaultOption.disabled = true;
            defaultOption.selected = true;
            select.appendChild(defaultOption);
        }
        
        values.forEach(value => {
            if (value && value.trim() !== '') {
                const option = document.createElement('option');
                option.value = value;
                option.textContent = value;
                select.appendChild(option);
            }
        });
        
        if (isUnit && values.length < 3) {
            const defaultUnits = ['шт.', 'кг', 'г', 'л', 'мл', 'упак.', 'банка', 'бутылка', 'пачка'];
            defaultUnits.forEach(unit => {
                if (!values.includes(unit)) {
                    const option = document.createElement('option');
                    option.value = unit;
                    option.textContent = unit;
                    select.appendChild(option);
                }
            });
        }
        
        if (currentValue && Array.from(select.options).some(opt => opt.value === currentValue)) {
            select.value = currentValue;
        } else if (isUnit && defaultValue) {
            select.value = defaultValue;
        }
        
        console.log(`Заполнен ${selectId}: ${values.length} элементов`);
    }

    // ОСТАЛЬНЫЕ МЕТОДЫ остаются без изменений...
    // (loadDefaultCategoriesAndUnits, setupFormEventListeners, createCalculateButton, 
    // suggestCalculation, setupModalHandlers, showPurchaseForm, fillFormWithData, 
    // resetForm, validateForm, savePurchase, deletePurchase, showNotification)

    // РЕЗЕРВНЫЙ МЕТОД ДЛЯ СТАНДАРТНЫХ ЗНАЧЕНИЙ
    loadDefaultCategoriesAndUnits() {
        console.log('Используются стандартные категории и единицы');
        
        const defaultCategories = [
            'Авто', 'Баня', 'Бензин', 'БытоТехника', 'Ветряк', 'Дерево', 'Инструмент', 'Коммуналка',
            'Лакокрасочные', 'Мебель', 'Посуда', 'Продукты', 'Расходники', 'Сад', 'Сантехника',
            'Собака', 'Стройматериалы', 'Текстиль', 'Химия', 'Электрика'
        ];
        
        const defaultUnits = ['шт.', 'кг', 'л', 'мл', 'упак.'];
        
        this.populateSelect('purchase-category', defaultCategories, 'Выберите категорию');
        this.populateSelect('purchase-unit', defaultUnits, 'шт.', true);
    }

    // ОБРАБОТЧИКИ СОБЫТИЙ ФОРМЫ
    setupFormEventListeners() {
        const form = document.getElementById('purchase-form');
        if (!form) {
            console.error('Форма не найдена!');
            return;
        }
        
        this.createCalculateButton();
        
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            this.savePurchase();
        });
        
        const dateInput = document.getElementById('purchase-date');
        if (dateInput) {
            dateInput.valueAsDate = new Date();
        }
    }

    // СОЗДАНИЕ КНОПКИ ДЛЯ ПРЕДЛОЖЕНИЯ РАСЧЕТА
    createCalculateButton() {
        const amountGroup = document.getElementById('purchase-amount')?.closest('.form-group');
        if (!amountGroup) return;
        
        const buttonContainer = document.createElement('div');
        buttonContainer.style.marginTop = '5px';
        buttonContainer.style.display = 'flex';
        buttonContainer.style.gap = '5px';
        buttonContainer.style.alignItems = 'center';
        
        const calcButton = document.createElement('button');
        calcButton.type = 'button';
        calcButton.textContent = '📐 Рассчитать';
        calcButton.className = 'btn-secondary';
        calcButton.style.padding = '4px 8px';
        calcButton.style.fontSize = '11px';
        calcButton.title = 'Предложить расчет на основе цены и количества';
        
        const hint = document.createElement('span');
        hint.textContent = '(цена × количество)';
        hint.style.fontSize = '10px';
        hint.style.color = '#6c757d';
        hint.style.fontStyle = 'italic';
        
        calcButton.addEventListener('click', () => {
            this.suggestCalculation();
        });
        
        buttonContainer.appendChild(calcButton);
        buttonContainer.appendChild(hint);
        amountGroup.appendChild(buttonContainer);
    }

    // ПРЕДЛОЖЕНИЕ РАСЧЕТА
    suggestCalculation() {
        const price = parseFloat(document.getElementById('purchase-price').value) || 0;
        const quantity = parseFloat(document.getElementById('purchase-quantity').value) || 0;
        const currentAmount = parseFloat(document.getElementById('purchase-amount').value) || 0;
        
        if (price > 0 && quantity > 0) {
            const suggestedAmount = price * quantity;
            
            if (currentAmount === 0) {
                document.getElementById('purchase-amount').value = suggestedAmount.toFixed(2);
                this.showNotification(`Предложена стоимость: ${suggestedAmount.toFixed(2)} ₽`, 'info');
            } else {
                const confirmUpdate = confirm(
                    `Текущая стоимость: ${currentAmount.toFixed(2)} ₽\n` +
                    `Предлагаемая: ${suggestedAmount.toFixed(2)} ₽\n\n` +
                    `Заменить текущее значение?`
                );
                
                if (confirmUpdate) {
                    document.getElementById('purchase-amount').value = suggestedAmount.toFixed(2);
                }
            }
        } else {
            this.showNotification('Укажите цену и количество для расчета', 'error');
        }
    }

    // УПРАВЛЕНИЕ МОДАЛЬНЫМ ОКНОМ
    setupModalHandlers() {
        const modal = document.getElementById('purchase-modal');
        const closeBtn = document.querySelector('.close-modal');
        const cancelBtn = document.getElementById('cancel-purchase');
        
        if (!modal || !closeBtn || !cancelBtn) return;
        
        const closeModal = () => {
            modal.style.display = 'none';
            this.resetForm();
        };
        
        closeBtn.addEventListener('click', closeModal);
        cancelBtn.addEventListener('click', closeModal);
        
        window.addEventListener('click', (e) => {
            if (e.target === modal) {
                closeModal();
            }
        });
    }

    // ПОКАЗАТЬ ФОРМУ
    showPurchaseForm(purchaseData = null) {
        const modal = document.getElementById('purchase-modal');
        const title = document.getElementById('purchase-modal-title');
        
        if (!modal || !title) return;
        
        if (purchaseData) {
            title.textContent = '✏️ Редактировать покупку';
            this.fillFormWithData(purchaseData);
        } else {
            title.textContent = '📝 Новая покупка';
            this.resetForm();
        }
        
        modal.style.display = 'block';
    }

    // ЗАПОЛНЕНИЕ ФОРМЫ ДАННЫМИ
    fillFormWithData(purchaseData) {
        document.getElementById('purchase-id').value = purchaseData.id || '';
        document.getElementById('purchase-date').value = purchaseData.date || '';
        document.getElementById('purchase-store').value = purchaseData.store_id || '';
        document.getElementById('purchase-name').value = purchaseData.name || '';
        
        setTimeout(() => {
            document.getElementById('purchase-category').value = purchaseData.gruppa || '';
        }, 100);
        
        document.getElementById('purchase-price').value = purchaseData.price || '';
        document.getElementById('purchase-quantity').value = purchaseData.quantity || '1';
        
        setTimeout(() => {
            document.getElementById('purchase-unit').value = purchaseData.item || 'шт.';
        }, 100);
        
        document.getElementById('purchase-amount').value = purchaseData.amount || '';
        document.getElementById('purchase-characteristics').value = purchaseData.characteristic || '';
    }

    // СБРОС ФОРМЫ
    resetForm() {
        document.getElementById('purchase-form').reset();
        document.getElementById('purchase-id').value = '';
        document.getElementById('purchase-date').valueAsDate = new Date();
        document.getElementById('purchase-quantity').value = '1';
        document.getElementById('purchase-unit').value = 'шт.';
        
        document.querySelectorAll('.error-message').forEach(el => {
            el.textContent = '';
        });
        document.querySelectorAll('.form-group').forEach(el => {
            el.classList.remove('error');
        });
    }

    // ВАЛИДАЦИЯ ФОРМЫ
    validateForm() {
        let isValid = true;
        
        const fields = [
            { id: 'purchase-date', message: 'Укажите дату покупки' },
            { id: 'purchase-store', message: 'Выберите магазин' },
            { id: 'purchase-name', message: 'Введите название товара' },
            { id: 'purchase-price', message: 'Укажите цену товара' },
            { id: 'purchase-quantity', message: 'Укажите количество' }
        ];
        
        fields.forEach(field => {
            const inputElement = document.getElementById(field.id);
            if (!inputElement) return;
            
            const errorElement = document.getElementById(field.id.replace('purchase-', '') + '-error');
            const formGroup = inputElement.closest('.form-group');
            
            if (formGroup) formGroup.classList.remove('error');
            if (errorElement) errorElement.textContent = '';
            
            if (!inputElement.value.trim()) {
                if (formGroup) formGroup.classList.add('error');
                if (errorElement) errorElement.textContent = field.message;
                isValid = false;
            }
            
            if (field.id.includes('price') || field.id.includes('quantity')) {
                const value = parseFloat(inputElement.value);
                if (isNaN(value) || value <= 0) {
                    if (formGroup) formGroup.classList.add('error');
                    if (errorElement) errorElement.textContent = 'Значение должно быть больше 0';
                    isValid = false;
                }
            }
        });
        
        return isValid;
    }

    // СОХРАНЕНИЕ ПОКУПКИ
    async savePurchase() {
        if (!this.validateForm()) {
            this.showNotification('Пожалуйста, исправьте ошибки в форме', 'error');
            return;
        }
        
        try {
            const storeId = parseInt(document.getElementById('purchase-store').value);
            const selectedStore = this.storesCache.find(store => store.id === storeId);
            
            const formData = {
                date: document.getElementById('purchase-date').value,
                store_id: storeId,
                shop: selectedStore ? selectedStore.shop : 'Неизвестный магазин',
                name: document.getElementById('purchase-name').value,
                gruppa: document.getElementById('purchase-category').value,
                price: parseFloat(document.getElementById('purchase-price').value),
                quantity: parseFloat(document.getElementById('purchase-quantity').value),
                item: document.getElementById('purchase-unit').value,
                characteristic: document.getElementById('purchase-characteristics').value,
                amount: parseFloat(document.getElementById('purchase-amount').value)
            };
            
            const purchaseId = document.getElementById('purchase-id').value;
            let result;
            
            if (purchaseId) {
                result = await supabase
                    .from('shops')
                    .update(formData)
                    .eq('id', purchaseId);
            } else {
                result = await supabase
                    .from('shops')
                    .insert([formData]);
            }
            
            if (result.error) throw result.error;
            
            this.showNotification(
                purchaseId ? 'Покупка обновлена!' : 'Покупка добавлена!', 
                'success'
            );
            
            document.getElementById('purchase-modal').style.display = 'none';
            this.refreshData();
            
        } catch (error) {
            console.error('Ошибка сохранения покупки:', error);
            this.showNotification('Ошибка при сохранении покупки: ' + error.message, 'error');
        }
    }

    // УДАЛЕНИЕ ПОКУПКИ
    async deletePurchase(purchaseId) {
        if (!confirm('Вы уверены, что хотите удалить эту покупку?')) return;
        
        try {
            const { error } = await supabase
                .from('shops')
                .delete()
                .eq('id', purchaseId);
                
            if (error) throw error;
            
            this.showNotification('Покупка удалена!', 'success');
            this.refreshData();
        } catch (error) {
            console.error('Ошибка удаления покупки:', error);
            this.showNotification('Ошибка при удалении покупки', 'error');
        }
    }

    // УВЕДОМЛЕНИЯ
    showNotification(message, type = 'info') {
        window.notifications[type]?.(message) || window.notifications.info(message);
    }
}

// Запускаем приложение когда DOM готов
document.addEventListener('DOMContentLoaded', () => {
    window.shoppingApp = new ShoppingApp();
});