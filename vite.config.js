import {defineConfig} from 'vite'
import { resolve } from 'path'
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel([
            'resources/js/app.js',
        ]),
        ],
    resolve: {
        alias: {
            '@': resolve(__dirname, './resources'),
        },
    },
})
