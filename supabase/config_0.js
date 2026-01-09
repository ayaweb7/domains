// config.js - Конфигурация приложения
class AppConfig {
    constructor() {
        this.loadConfig();
    }

    loadConfig() {
        // В разработке используем значения из process.env или fallback
        // В продакшене Netlify автоматически подставит значения
        this.supabaseUrl = typeof process !== 'undefined' && process.env?.SUPABASE_URL 
            ? process.env.SUPABASE_URL
            : window.ENV?.SUPABASE_URL 
            ? window.ENV.SUPABASE_URL
            : 'https://fmlozfzmonszroxsrldk.supabase.co'; // Fallback для разработки

        this.supabaseKey = typeof process !== 'undefined' && process.env?.SUPABASE_ANON_KEY 
            ? process.env.SUPABASE_ANON_KEY
            : window.ENV?.SUPABASE_ANON_KEY 
            ? window.ENV.SUPABASE_ANON_KEY
            : 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImZtbG96Znptb25zenJveHNybGRrIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTYzMTgxMTAsImV4cCI6MjA3MTg5NDExMH0.WQRiC0vg1tVF2vTlO7uMst6FYZnWW_76NMYKwPoL4iw'; // Fallback для разработки

        console.log('Конфигурация загружена:', {
            url: this.supabaseUrl ? '✓ Установлен' : '✗ Отсутствует',
            key: this.supabaseKey ? '✓ Установлен' : '✗ Отсутствует'
        });
    }

    getSupabaseConfig() {
        return {
            url: this.supabaseUrl,
            key: this.supabaseKey
        };
    }

    validateConfig() {
        const errors = [];
        
        if (!this.supabaseUrl || this.supabaseUrl.includes('my_supabase_url')) {
            errors.push('SUPABASE_URL не настроен');
        }
        
        if (!this.supabaseKey || this.supabaseKey.includes('my_supabase_anon_key')) {
            errors.push('SUPABASE_ANON_KEY не настроен');
        }

        if (errors.length > 0) {
            console.error('Ошибки конфигурации:', errors);
            return false;
        }

        console.log('Конфигурация валидна ✓');
        return true;
    }
	
}
// В конец config.js добавьте:
	console.log('Config loaded, supabase should be available in 100ms...');
	setTimeout(() => {
		console.log('Window.supabaseClient:', window.supabaseClient);
	}, 100);

// Глобальный экземпляр конфигурации
window.appConfig = new AppConfig();