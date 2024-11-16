import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],

    theme: {
        extend: {
            colors: {
                'vaga': '#18A7A6',
                'bond': '#34383D',
                'cream': '#EEEBE3',
                'semiBlack':"1E1E1E"
                
            },
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                plex: ['IBM Plex Serif', 'serif'],
                bodoni: ['Libre Bodoni', 'serif'],
                montseratt:['Montserrat', 'sans-serif']
            },
        },
    },

    plugins: [forms],
};
