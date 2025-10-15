// admin.js
// admin.js - Административная панель
class AdminPanel {
    constructor() {
        this.init();
    }

    async init() {
        // Проверка аутентификации
        const { data: { session } } = await supabase.auth.getSession();
        
        if (!session) {
            window.location.href = 'index.html';
            return;
        }

        console.log('Админ-панель для пользователя:', session.user.email);
        this.initializeAdmin();
        this.setupEventListeners();
    }

    initializeAdmin() {
        this.initializeShopsTable();
        this.initializeCitiesTable();
    }

    // ТАБЛИЦА МАГАЗИНОВ
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
                    title: "Название магазина", 
                    field: "shop", 
                    editor: "input",
                    headerFilter: "input",
                    validator: "required"
                },
                { 
                    title: "Город", 
                    field: "town", 
                    editor: "input",
                    headerFilter: "input"
                },
                { 
                    title: "Улица", 
                    field: "street", 
                    editor: "input" 
                },
                { 
                    title: "Дом", 
                    field: "house", 
                    editor: "input",
                    width: 100
                },
                { 
                    title: "Телефон", 
                    field: "phone", 
                    editor: "input" 
                },
                { 
                    title: "Действия", 
                    formatter: this.actionsFormatter, 
                    cellClick: (e, cell) => {
                        const data = cell.getRow().getData();
                        if (e.target.classList.contains('edit-btn')) {
                            this.editShop(data);
                        } else if (e.target.classList.contains('delete-btn')) {
                            this.deleteShop(data.id);
                        }
                    },
                    width: 120,
                    headerSort: false
                }
            ],
        });

        this.loadShopsData();
    }

    // ЗАГРУЗКА ДАННЫХ МАГАЗИНОВ
    async loadShopsData() {
        try {
            const { data, error } = await supabase
                .from('stores')
                .select('*')
                .order('id', { ascending: true });

            if (error) throw error;
            
            this.shopsTable.setData(data || []);
            console.log('Загружено магазинов:', data?.length || 0);
        } catch (error) {
            console.error('Ошибка загрузки магазинов:', error);
            this.showNotification('Ошибка загрузки магазинов', 'error');
        }
    }

    // ФОРМАТТЕР КНОПОК ДЕЙСТВИЙ
    actionsFormatter(cell) {
        return `
            <button class="edit-btn" title="Редактировать">✏️</button>
            <button class="delete-btn" title="Удалить">🗑️</button>
        `;
    }

    // РЕДАКТИРОВАНИЕ МАГАЗИНА
    editShop(shopData) {
        console.log('Редактирование магазина:', shopData);
        // Временная реализация - используем встроенный редактор Tabulator
        this.showNotification(`Редактирование магазина: ${shopData.shop}`, 'info');
    }

    // УДАЛЕНИЕ МАГАЗИНА
    async deleteShop(shopId) {
        if (!confirm('Вы уверены, что хотите удалить этот магазин?')) return;

        try {
            const { error } = await supabase
                .from('stores')
                .delete()
                .eq('id', shopId);

            if (error) throw error;

            this.showNotification('Магазин успешно удален', 'success');
            this.loadShopsData(); // Перезагружаем данные
        } catch (error) {
            console.error('Ошибка удаления магазина:', error);
            this.showNotification('Ошибка удаления магазина', 'error');
        }
    }

    // ТАБЛИЦА ГОРОДОВ (аналогично магазинам)
    initializeCitiesTable() {
        this.citiesTable = new Tabulator("#cities-table", {
            layout: "fitColumns",
            pagination: "local",
            paginationSize: 10,
            columns: [
                { title: "ID", field: "id", width: 80 },
                { title: "Город (RU)", field: "town_ru", editor: "input" },
                { title: "Город (EN)", field: "town_en", editor: "input" },
                { title: "Код", field: "code", editor: "input", width: 100 },
                { 
                    title: "Действия", 
                    formatter: this.actionsFormatter, 
                    cellClick: (e, cell) => {
                        const data = cell.getRow().getData();
                        if (e.target.classList.contains('delete-btn')) {
                            this.deleteCity(data.id);
                        }
                    },
                    width: 80
                }
            ],
        });

        this.loadCitiesData();
    }

    async loadCitiesData() {
        try {
            const { data, error } = await supabase
                .from('locality')
                .select('*')
                .order('id', { ascending: true });

            if (error) throw error;
            
            this.citiesTable.setData(data || []);
        } catch (error) {
            console.error('Ошибка загрузки городов:', error);
            this.showNotification('Ошибка загрузки городов', 'error');
        }
    }

    async deleteCity(cityId) {
        if (!confirm('Вы уверены, что хотите удалить этот город?')) return;

        try {
            const { error } = await supabase
                .from('locality')
                .delete()
                .eq('id', cityId);

            if (error) throw error;

            this.showNotification('Город успешно удален', 'success');
            this.loadCitiesData();
        } catch (error) {
            console.error('Ошибка удаления города:', error);
            this.showNotification('Ошибка удаления города', 'error');
        }
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
    }

    // ПЕРЕКЛЮЧЕНИЕ ВКЛАДОК
    switchTab(tabName) {
        // Скрыть все вкладки
        document.querySelectorAll('.tab-content').forEach(tab => {
            tab.classList.remove('active');
        });
        document.querySelectorAll('.tab-button').forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Показать выбранную вкладку
        document.getElementById(`${tabName}-section`).classList.add('active');
        document.getElementById(`${tabName}-tab`).classList.add('active');
    }

    // ДОБАВЛЕНИЕ НОВОГО МАГАЗИНА
    addNewShop() {
        // Временная реализация - добавляем пустую строку для редактирования
        this.shopsTable.addRow({}, true)
            .then(row => {
                row.getCells().forEach(cell => {
                    if (cell.getColumn().getDefinition().field !== 'id') {
                        cell.edit();
                    }
                });
            });
    }

    // ДОБАВЛЕНИЕ НОВОГО ГОРОДА
    addNewCity() {
        this.citiesTable.addRow({}, true)
            .then(row => {
                row.getCells().forEach(cell => {
                    if (cell.getColumn().getDefinition().field !== 'id') {
                        cell.edit();
                    }
                });
            });
    }

    // УВЕДОМЛЕНИЯ
    showNotification(message, type = 'info') {
        // Временная реализация - используем alert
        alert(`[${type.toUpperCase()}] ${message}`);
    }
}

// ЗАПУСК АДМИН-ПАНЕЛИ
document.addEventListener('DOMContentLoaded', () => {
    window.adminPanel = new AdminPanel();
});