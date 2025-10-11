// app.js - Основное приложение (только для аутентифицированных пользователей)
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

  async loadPurchasesData() {
    try {
      // ★ ВАЖНО: Теперь запрос автоматически возвращает только данные текущего пользователя
      // благодаря RLS политикам!
      const { data: purchases, error } = await supabase
        .from('shops')
        .select('*')
        .order('date', { ascending: false });

      if (error) throw error;

      // Инициализация Tabulator (ваш существующий код)
      this.initializeTable(purchases);
      
    } catch (error) {
      console.error('Ошибка загрузки данных:', error);
    }
  }

  initializeTable(data) {
    // Ваш существующий код инициализации Tabulator
    new Tabulator('#purchases-table', {
      data: data,
      // ... остальные настройки
      columns: [
        // ... ваши колонки
      ]
    });
  }

  setupEventListeners() {
    // Кнопка выхода
    document.getElementById('logout-btn').addEventListener('click', () => {
      window.authManager.signOut();
    });
  }
}

// Запускаем приложение когда DOM готов
document.addEventListener('DOMContentLoaded', () => {
  window.shoppingApp = new ShoppingApp();
});