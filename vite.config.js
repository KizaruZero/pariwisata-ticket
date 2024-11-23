import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";

export default defineConfig({
    plugins: [
        laravel({
            input: "resources/js/app.js",
            refresh: ["app/Livewire/**"],
            // klo error ganti true
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    define: {
        "import.meta.env.VITE_TURNSTILE_SITE_KEY": JSON.stringify(
            process.env.TURNSTILE_SITE_KEY
        ),
    },
});
