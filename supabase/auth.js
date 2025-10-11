// auth.js - Управление аутентификацией
const SUPABASE_URL = 'https://fmlozfzmonszroxsrldk.supabase.co';
const SUPABASE_ANON_KEY = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImZtbG96Znptb25zenJveHNybGRrIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTYzMTgxMTAsImV4cCI6MjA3MTg5NDExMH0.WQRiC0vg1tVF2vTlO7uMst6FYZnWW_76NMYKwPoL4iw';

const supabase = window.supabase.createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

class AuthManager {
  constructor() {
    this.checkAuthState();
  }

  // Проверка статуса аутентификации
  async checkAuthState() {
    const { data: { session }, error } = await supabase.auth.getSession();
    
    if (session) {
      this.onUserSignedIn(session.user);
    } else {
      this.onUserSignedOut();
    }
  }

  // Вход по email/password
  async signIn(email, password) {
    try {
      const { data, error } = await supabase.auth.signInWithPassword({
        email: email,
        password: password,
      });

      if (error) throw error;
      return { success: true, user: data.user };
      
    } catch (error) {
      console.error('Ошибка входа:', error);
      return { success: false, error: error.message };
    }
  }

  // Регистрация
  async signUp(email, password, fullName) {
    try {
      const { data, error } = await supabase.auth.signUp({
        email: email,
        password: password,
        options: {
          data: {
            full_name: fullName
          }
        }
      });

      if (error) throw error;
      return { success: true, user: data.user };
      
    } catch (error) {
      console.error('Ошибка регистрации:', error);
      return { success: false, error: error.message };
    }
  }

  // Выход
  async signOut() {
    const { error } = await supabase.auth.signOut();
    if (error) console.error('Ошибка выхода:', error);
  }

  // Обработчики событий
  onUserSignedIn(user) {
    console.log('Пользователь вошел:', user);
    // Перенаправление на защищенную страницу
    if (window.location.pathname === '/index.html') {
      window.location.href = 'app.html';
    }
  }

  onUserSignedOut() {
    console.log('Пользователь вышел');
    // Перенаправление на публичную страницу
    if (window.location.pathname === '/app.html') {
      window.location.href = 'index.html';
    }
  }
}

// Слушаем изменения состояния аутентификации
supabase.auth.onAuthStateChange((event, session) => {
  if (event === 'SIGNED_IN' && session) {
    window.authManager.onUserSignedIn(session.user);
  } else if (event === 'SIGNED_OUT') {
    window.authManager.onUserSignedOut();
  }
});

// Создаем глобальный экземпляр
window.authManager = new AuthManager();