<template>
    <div class="bg-white text-gray-800">
        <div class="container mx-auto p-6" id="app">
            <!-- Articles Section -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div
                    class="bg-white bg-opacity-70 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl relative"
                >
                    <img
                        :alt="article.alt"
                        class="w-full h-64 object-cover transition-transform transform hover:scale-105"
                        :src="`/storage/${article.image_url}`"
                    />
                    <div class="px-4">
                        <h2 class="text-lg font-bold">
                            {{
                                article.title.length > 50
                                    ? article.title.slice(0, 50) + "..."
                                    : article.title
                            }}
                        </h2>
                    </div>

                    <div class="mt-2 mb-4 px-4">
                        <NavLink
                            :href="`/article/${article.id}`"
                            class="custom-button w-full"
                        >
                            Read More
                        </NavLink>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from "vue";
import NavLink from "../Components/NavLink.vue";

const props = defineProps({
    article: {
        type: Object,
        required: true,
    },
});
</script>

<style scoped>
body {
    font-family: "Roboto", sans-serif;
}

.custom-button {
    background-color: #ff4b5c;
    color: white;
    padding: 10px 20px;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s, transform 0.3s;
}

.custom-button:hover {
    background-color: #ff6b7c;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
}

input:focus {
    outline: none;
    range: 2px;
    outline-color: #ff4b5c;
}
</style>
