import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // CSS existe
                'resources/js/app.js',   // JS existe (pas de app.css dans js/)
            ],
            refresh: true,
        }),
    ],
});