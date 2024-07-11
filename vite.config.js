import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/estilo.css',
                'resources/css/login.css',
                'resources/css/loginsano.css',
                'resources/js/app.js',
                'resources/js/autocompletePropietarios.js',
                'resources/js/autocompleteUsers.js',
                'resources/js/autocompleteEquipos.js',
                'resources/js/home.js',
               
            ],
            refresh: true,
        }),
    ],

    build: {
        outDir: 'public/build',
        manifest: 'manifest.json', 
        minify: false,
    },    
});
