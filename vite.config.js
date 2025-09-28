import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss(),
    ],
    server: {
        host: true, // listen on all addresses, including 0.0.0.0 and ::
        port: 5173,
        strictPort: false,
        hmr: {
            host: '127.0.0.1', // ensure HMR connects via IPv4; let Vite pick the port
        },
    },
});
