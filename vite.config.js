import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    server: {
        host: 'localhost',
        port: 5173,
        strictPort: true,
        https: false,
    },
    plugins: [
        laravel({
            input: [
                'resources/js/app.css',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
