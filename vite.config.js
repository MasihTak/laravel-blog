import {defineConfig} from 'vite'
import {resolve} from 'path'
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/scss/app.scss', 'resources/js/app.js'],
            refresh: ['resources/**'],
        }),
    ],
    resolve: {
        alias: {
            '@': resolve(__dirname, './resources'),
        },
    },
})
