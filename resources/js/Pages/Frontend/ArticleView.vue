<template>
    <GuestLayout>
        <div class="bg-cream text-gray-800 ">
            <div class="mx-auto" id="app">
                <div class="relative tracking-wide">
                    <img
                        src="../../assets/home.png"
                        alt="Scenic view of a coastline"
                        class="w-screen h-[350px] object-cover z-0 tracking-wider bg-no-repeat bg-bottom"
                    />
                    <div class="absolute inset-0 flex flex-col items-center text-center bg-black bg-opacity-50 space-y-4">
                        <!--Text Part-->
                            <transition name="fade-up" appear>
                                <div class="text-5xl text-cream p-6 mt-20 font-semibold">
                                    <h1>Our Latest Articles About Travel</h1>
                                </div>
                            </transition>
                        <section class="absolute bottom-0 w-full h-[50px] bg-cream rounded-t-[91px]">
                            <div class="h-full flex items-center -mt-8 justify-center italic text-white text-3xl">
                            </div>
                        </section>
                    </div>
                </div>
                <div v-if="loading" class="flex justify-center items-center h-64">
                <div
                    class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900"
                ></div>
                </div>
                <div class="text-center bg-cream  py-12 px-16">
                    <div class="grid grid-cols-3 gap-6 justify-center items-center ">
                        <ArticleBox 
                        v-for="article in articles" 
                        :key="article.id" 
                        :article="article"
                        class="bg-cream  w-80 "></ArticleBox>
                    </div>
                </div>
                
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { onMounted, ref } from "vue";
import axios from "axios";
import ArticleBox from "@/Frontend Components/ArticleBox.vue";
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

const show = ref(false);
onMounted(() => {
    fetchArticles();
    setTimeout(() => {
        show.value = true; // Delay to ensure animation triggers correctly
    }, 800);
});
</script>

<style scoped>
    @keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(40px); /* Adjust for the slide distance */
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
    }

    /* Transition classes for Vue */
    .fade-up-enter-active,
    .fade-up-appear-active {
    animation: fadeUp 1.2s ease-out; /* Duration and easing */
    }

    .fade-up-enter-from,
    .fade-up-appear-from {
    opacity: 0;
    transform: translateY(40px);
    }

    .fade-up-enter-to,
    .fade-up-appear-to {
    opacity: 1;
    transform: translateY(0);
    }
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

    .fade-in-bottom-enter-active {
        transition: opacity 2.0s ease, transform 2.0s ease;
    }

    .fade-in-bottom-enter {
        opacity: 0;
        transform: translateY(100px);
    }
</style>
