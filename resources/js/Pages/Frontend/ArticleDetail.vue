<template>
    <GuestLayout>
        <div class="container mx-auto py-8 bg-cream">
            <div v-if="loading" class="flex justify-center items-center h-64">
                <div
                    class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900"
                ></div>
            </div>

            <div
                v-else-if="error"
                class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                role="alert"
            >
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ error }}</span>
            </div>

            <article v-else class="mx-auto px-24 py-6 ">
                <div class="mx-auto flex flex-row gap-4">
                    <div class="p-12 bg-white rounded-lg shadow-sm w-4/5">
                        <header class="mb-8">
                            <h1 class="text-4xl font-bold font-montseratt mb-4 text-gray-800">
                                {{ article.title }}
                            </h1>
                            <div class="flex items-center text-sm text-gray-600">
                                <span class="mr-4">By {{ article.author.name }}</span>
                                <span>{{ formattedDate(article.published_at) }}</span>
                            </div>
                        </header>

                        <!-- <img
                            :src="`/storage/${article.image_url}`"
                            :alt="article.title"
                            class=" h-96 object-cover rounded-lg shadow-lg mb-8"
                        /> -->

                        <img
                            src="../../assets/home.png"
                            :alt="article.title"
                            class="mx-auto h-96 object-cover rounded-lg shadow-lg mb-8"
                        />


                        <div
                            class="prose prose-lg max-w-none text-justify"
                            v-html="article.content"
                        ></div>
                        
                        <!-- Add Destination Component -->
                        <div class="mt-4 mx-auto">
                            <div class="max-w-6xl mx-auto p-6">
                            <div class="text-center">
                                <h1
                                    class="text-3xl text-vaga font-bold hover:text-pink-600 transition duration-300"
                                >
                                    Travel to destination?
                                </h1>
                            </div>
                        </div>
                            <DestinationCard :destination="article.destination" class="mx-auto"/>
                        </div>
                        <!-- <div class="mt-8 ">
                            <button
                                @click="goBack"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-900 text-white rounded-full"
                            >
                                Go Back
                            </button>
                        </div> -->
                    </div>
                    <div class="w-full bg-white rounded-lg py-12 px-6 shadow-sm max-w-80">
                        <h2 class="text-2xl font-montseratt text-bond font-semibold">
                            Our Latest Article
                        </h2>
                        <div v-if="loading">
                            <div
                            class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900 mx-auto my-auto"
                            ></div>
                        </div>
                        <div class="grid grid-rows-1 items-center bg-white justify-center bg-black ">
                            <ArticleBox 
                            v-for="article in articles" 
                            :key="article.id" 
                            :article="article"
                            class="bg-white w-64 m-4 "></ArticleBox>
                        </div>
                    </div>

                </div>
                
                
                

                
                <div class="bg-white p-12 mt-6 rounded-md shadow-lg">
                <!-- Recomended Destination -->
                <div class="max-w-6xl mx-auto">
                    <div class="text-center">
                        <h1
                            class="text-3xl font-bold text-vaga hover:text-pink-600 transition duration-300"
                        >
                            Travel Recommendations
                        </h1>
                    </div>
                </div>

                <!-- Destination List -->
                
                    <div v-if="loading">Loading...</div>
                    <div v-else-if="recommendeds.length === 0">
                        No destinations found.
                    </div>
                    <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6 ">
                        <DestinationCard
                            v-for="destination in recommendeds"
                            :key="destination.id"
                            :destination="destination"
                        />
                    </div>

                </div>
                
            </article>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import { defineProps } from "vue";
import DestinationCard from "@/Frontend Components/DestinationCard.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ArticleBox from '@/Frontend Components/ArticleBox.vue';

const props = defineProps({
    id: {
        type: [Number, String],
        required: true,
    },
});

const article = ref(null);
const loading = ref(true);
const recommendeds = ref([]);
const error = ref(null);
const articles = ref([]);

const fetchArticle = async () => {
    try {
        loading.value = true;
        const response = await axios.get(`/api/article/${props.id}`);
        article.value = response.data;
        console.log(response.data);
    } catch (err) {
        error.value = "Failed to fetch the article. Please try again later.";
        console.error("Error fetching article:", err);
    } finally {
        loading.value = false;
    }
};

const fetchArticleLatest = async () => {
    try {
        const response = await axios.get("/api/articles/latest");
        articles.value = response.data;
    } catch (error) {
        console.error("Error fetching articles:", error);
    }
};

const fetchRecommendedDestinations = async () => {
    try {
        const response = await axios.get("/api/destination/recomendation");
        recommendeds.value = response.data;
    } catch (error) {
        console.error("Error fetching recommended destinations:", error);
    }
};

onMounted(() => {
    fetchArticleLatest();
    fetchArticle();
    fetchRecommendedDestinations();
});

const formattedDate = (date) => {
    return new Date(date).toLocaleDateString("id-ID", {
        year: "numeric",
        month: "long",
        day: "numeric",
    });
};

const goBack = () => {
    window.history.back();
};
</script>
<style>
/* Additional Tailwind CSS customizations for article content */
.prose h2 {
    @apply text-3xl font-bold mt-8 mb-4;
}

.prose h3 {
    @apply text-2xl font-semibold mt-6 mb-3;
}

.prose p {
    @apply mb-4;
}

.prose ul,
.prose ol {
    @apply my-4 ml-6;
}

.prose li {
    @apply mb-2;
}

.prose strong {
    @apply font-bold;
}
</style>
