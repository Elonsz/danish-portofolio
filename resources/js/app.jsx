import './bootstrap';
import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './components/App';

// Mount React Application for Public Portfolio
function initPortfolio() {
    const rootEl = document.getElementById('portfolio-app');
    if (rootEl) {
        let initialData = {};
        try {
            const rawData = rootEl.getAttribute('data-portfolio');
            if (rawData) {
                initialData = JSON.parse(rawData);
            }
        } catch (e) {
            console.error('Failed to parse portfolio data:', e);
        }

        const csrfToken = rootEl.getAttribute('data-csrf') || '';

        ReactDOM.createRoot(rootEl).render(
            <React.StrictMode>
                <App initialData={initialData} csrfToken={csrfToken} />
            </React.StrictMode>
        );
    } else {
        // Fallback behavior for Admin pages if needed
        const themeToggleBtn = document.getElementById('theme-toggle');
        if (themeToggleBtn) {
            themeToggleBtn.addEventListener('click', () => {
                const isDark = document.documentElement.classList.toggle('dark');
                localStorage.setItem('color-theme', isDark ? 'dark' : 'light');
            });
        }
    }
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initPortfolio);
} else {
    initPortfolio();
}
