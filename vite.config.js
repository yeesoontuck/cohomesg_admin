import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',       
                'resources/css/app.css',     
                'resources/css/web.css',     
            ],
            refresh: true,
            detectTls: 'cohomesg.test', // only affects npm run dev, because valet link differs from directory name
        }),
        tailwindcss(),
    ],
});
