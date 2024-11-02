import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                "resources/js/app.js",
                "dist/js",
                "dist/css/_app.css",
                "dist/css/app.css"
            ],
            refresh: true,
        }),
    ],
});
