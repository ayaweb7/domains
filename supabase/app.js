// app.js - Основное приложение (только для аутентифицированны пользователей)
class ShoppingApp {
    constructor() {
        this.init();
    }

    async init() {
        // Проверяем, что пользователь аутентифицирован
        const { data: { session } } = await supabase.auth.getSession();
        
        if (!session) {
            window.location.href = 'index.html';
            return;
        }

        console.log('Запуск приложения для пользователя:', session.user.email);
        this.loadPurchasesData();
        this.setupEventListeners();
    }

    // ОСНОВНАЯ ФУНКЦИЯ ДЛЯ ЗАГРУЗКИ И ОТОБРАЖЕНИЯ ДАННЫХ
    async loadPurchasesData() {
        try {
            console.log("Начинаем загрузку данных...");
            const allRows = [];
            const pageSize = 1000;
            let from = 0;
            let hasMoreData = true;
            let safeExitCounter = 0;
            const maxSafePages = 10;

            while (hasMoreData && safeExitCounter < maxSafePages) {
                safeExitCounter++;

                let to = from + pageSize - 1;
                console.log(`Пытаемся загрузить блок: с ${from} по ${to}`);

                const { data: pageData, error } = await supabase
                    .from('shops')
                    .select('*')
                    .order('id', { ascending: true })
                    .range(from, to);

                if (error) {
                    if (error.message && error.message.includes('416') || error.code === 'PGRST301') {
                        console.log('Достигнут конец данных. Загрузка завершена.');
                        hasMoreData = false;
                        break;
                    } else {
                        console.error('Критическая ошибка при загрузке страницы:', error);
                        throw new Error(`Ошибка Supabase: ${error.message || JSON.stringify(error)}`);
                    }
                }

                if (!pageData || pageData.length === 0) {
                    console.log('Получен пустой ответ. Загрузка завершена.');
                    hasMoreData = false;
                    break;
                }

                allRows.push(...pageData);
                from += pageSize;
                console.log(`Успешно загружено: ${pageData.length} записей. Всего: ${allRows.length}`);

                if (pageData.length < pageSize) {
                    console.log(`Получено неполная страница (${pageData.length}/${pageSize}). Загрузка завершена.`);
                    hasMoreData = false;
                }
            }

            console.log('Всего загружено записей:', allRows.length);
            
            // Скрываем надпись "Загрузка..."
            document.getElementById('loading').style.display = 'none';

            // Инициализируем таблицу со ВСЕМИ данными
            this.initializeTable(allRows);
            
        } catch (error) {
            console.error('Общая ошибка:', error);
            document.getElementById('loading').textContent = 'Ошибка при загрузке данных: ' + error.message;
        }
    }

    initializeTable(data) {
        // Инициализируем Tabulator со ВСЕМИ данными
        new Tabulator('#purchases-table', {
            data: data,
            layout: "fitColumns",
            pagination: "local",
            paginationSize: 20,
            paginationSizeSelector: [10, 20, 50, 100, 500],
            movableColumns: true,
            maxHeight: "100%",
            columns: [
                {
                    title: "ID",
                    field: "id",
                    hozAlign: "left",
                },
                {
                    title: "Дата",
                    field: "date",
                    hozAlign: "left",
                    headerFilter: "input",
                    sorter: "date",
                    sorterParams: { format: "yyyy-MM-dd" },
                    formatter: function(cell, formatterParams, onRendered) {
                        const dateObj = new Date(cell.getValue() + 'T00:00:00');
                        return dateObj.toLocaleDateString('ru-RU');
                    }
                },
                { 
                    title: "Товар", 
                    field: "name", 
                    headerFilter: "input" 
                },
                { 
                    title: "Магазин", 
                    field: "shop", 
                    headerFilter: "input" 
                },
                {
                    title: "Цена, ₽",
                    field: "price",
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
            ]
        });
    }

    setupEventListeners() {
		// Новая кнопка админ-панели
		document.getElementById('admin-btn').addEventListener('click', () => {
			window.location.href = 'admin.html';
		});
        // Кнопка добавления покупки
		document.getElementById('add-purchase-btn').addEventListener('click', () => {
			this.showPurchaseForm();
		});
		// Кнопка выхода
        document.getElementById('logout-btn').addEventListener('click', () => {
            window.authManager.signOut();
        });
    }
	
	// Новый метод для показа формы покупки
	showPurchaseForm(purchaseData = null) {
		// Временная реализация - позже заменим модальным окном
		console.log('Открытие формы покупки', purchaseData);
		alert('Форма добавления покупки будет реализована в следующем шаге');
	}
}

// Запускаем приложение когда DOM готов
document.addEventListener('DOMContentLoaded', () => {
    window.shoppingApp = new ShoppingApp();
});