<template>
    <GuestLayout>
        <div class="bg-white text-gray-800">
            <div class="container mx-auto p-6" id="app">
                <!-- Title Section -->
                <div class="text-center mb-12">
                    <h1 class="text-4xl font-bold mb-2">
                        Our Latest Articles About Travel
                    </h1>
                    <p class="text-gray-500">
                        Know the latest articles about travel
                    </p>
                </div>

                <!-- Articles Section -->
                <div class="">
                    <ArticleCard
                        v-for="article in articles"
                        :key="article.id"
                        :article="article"
                    />
                </div>

                <!-- Explore More Button -->
                <div class="text-center mb-12">
                    <button
                        class="custom-button px-8 py-3 transition-all transform hover:scale-110 hover:bg-pink-500 bg-pink-400 text-white font-bold rounded-full"
                    >
                        Explore More
                    </button>
                </div>

                <!-- Subscribe Section -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold mb-2">
                        Subscribe To Get The Latest News About Us
                    </h2>
                    <p class="text-gray-500 mb-4">
                        We never spam. Enter your email below to get daily
                        updates about us.
                    </p>
                    <div class="flex justify-center">
                        <input
                            class="p-3 border border-gray-300 rounded-l-lg w-1/2 focus:outline-none focus:ring-2 focus:ring-pink-400 transition"
                            placeholder="Enter your email address"
                            type="email"
                        />
                        <button
                            class="custom-button rounded-r-lg px-6 py-3 bg-pink-400 text-white transition-all transform hover:scale-110 hover:bg-pink-500"
                        >
                            Subscribe Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import ArticleCard from "@/Frontend Components/ArticleCard.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";

const articles = ref([]);

const fetchArticles = async () => {
    try {
        const response = await axios.get("/api/articles");
        articles.value = response.data;
    } catch (error) {
        console.error("Error fetching articles:", error);
    }
};

onMounted(() => {
    fetchArticles();
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
    border-radius: 25px;
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
</style>
