<template>
    <GuestLayout>
        <div class="bg-cream text-gray-800 ">
            <div class="mx-auto" id="app">
                <div class="relative tracking-wide">
                    <img
                        src="../../assets/Explore.png"
                        alt="Scenic view of a coastline"
                        class="w-screen h-[350px] object-cover z-0 tracking-wider"
                    />
                    <div class="absolute inset-0 flex flex-col items-center text-center bg-black bg-opacity-50 space-y-4">
                        <!--Text Part-->
                        <transition name="fade-in-bottom">
                            <div v-if="show" class="text-5xl text-cream p-6 mt-10 font-semibold">
                                <h1>Popular Places Near Where You Are</h1>
                            </div>
                        </transition>
                        <section class="absolute bottom-0 w-full h-[50px] bg-cream rounded-t-[91px]">
                            <div class="h-full flex items-center -mt-8 justify-center italic text-white text-3xl">
                            </div>
                        </section>
                    </div>
                </div>
                <div class="text-center mb-12 bg-cream px-72">
                    <h1 class="text-4xl font-bold mb-2">Our Latest Articles About Travel</h1>
                    <p class="text-gray-500">Know the latest articles about travel</p>
                    <div class="grid grid-cols-2 ">
                        <ArticleBox 
                        v-for="article in articles" 
                        :key="article.id" 
                        :article="article"
                        class="bg-cream "></ArticleBox>
                    </div>
                    
                    <div>
                    
                    </div>
                    <div class="text-center mb-12">
                        <button class="custom-button px-8 py-3 transition-all transform hover:scale-110 hover:bg-pink-500 bg-pink-400 text-white font-bold rounded-full">
                            Explore More
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
