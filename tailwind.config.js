import { defaultTheme } from 'tailwindcss/defaultTheme';
import * as forms from '@tailwindcss/forms';
import flowbite from '@tailwindcss/plugin-flowbite'; // Replace '@tailwindcss/plugin-flowbite' with the correct path to the Flowbite plugin

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, flowbite], // Use the imported flowbite plugin here
};
