<template>
    <GuestLayout>
        <div
            class="flex flex-col items-center justify-center min-h-screen bg-blue-100"
        >
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
            <!-- Dropdown for categories -->
            <div class="mb-4">
                <select v-model="selectedCategory">
                    <option value="">All Categories</option>
                    <option
                        v-for="category in categories"
                        :key="category.id"
                        :value="category.id"
                    >
                        {{ category.name }}
                    </option>
                </select>
            </div>

            <!-- Dropdown for regions -->
            <div class="mb-4">
                <select v-model="selectedRegion">
                    <option value="">All Regions</option>
                    <option
                        v-for="region in regions"
                        :key="region.id"
                        :value="region.id"
                    >
                        {{ region.name }}
                    </option>
                </select>
            </div>

            <!-- Search Field with Clear Button -->
            <div class="my-4">
                <form
                    @submit.prevent="submitSearch"
                    class="flex items-center space-x-2"
                >
                    <label for="search" class="sr-only"
                        >Search for destination</label
                    >
                    <input
                        id="search"
                        type="text"
                        v-model="search"
                        placeholder="Search for destination..."
                        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                    />
                    <button
                        type="submit"
                        class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
                        Search
                    </button>
                    <!-- Clear Button -->
                    <button
                        v-if="search"
                        type="button"
                        @click="clearSearch"
                        class="px-4 py-2 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-300"
                    >
                        Clear
                    </button>
                </form>
            </div>

            <!-- Destination Result  -->
            <div v-if="searchResult.length === 0"></div>
            <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <h1 class="text-3xl font-bold">Search Result</h1>
                <DestinationCard
                    v-for="destination in searchResult"
                    :key="destination.id"
                    :destination="destination"
                />
            </div>

            <!-- Recomended Destination -->
            <div class="mx-auto p-6">
                <div class="text-center mb-8">
                    <h1
                        class="text-3xl font-bold hover:text-pink-600 transition duration-300"
                    >
                        Travel Recommendations
                    </h1>
                    <p class="text-gray-500">
                        The best travel recommendations from around the world
                        for you.
                    </p>
                    <button
                        class="mt-4 px-6 py-2 bg-pink-500 hover:bg-pink-600 text-white rounded-full transition duration-300 transform hover:scale-105"
                    >
                        Explore more
                    </button>
                </div>
            </div>

            <!-- Destination List -->
            <div v-if="loading">Loading...</div>
            <div v-else-if="recommendeds.length === 0">
                No destinations found.
            </div>
            <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <DestinationCard
                    v-for="destination in recommendeds"
                    :key="destination.id"
                    :destination="destination"
                />
            </div>

            <!-- Recomended Destination -->
            <div class="mx-auto p-6">
                <div class="text-center mb-8">
                    <h1
                        class="text-3xl font-bold hover:text-pink-600 transition duration-300"
                    >
                        Destination Recomendation by Your Interest
                    </h1>
                </div>
            </div>

            <!-- Destination List -->
            <!-- Destination List -->
            <div v-if="loading">Loading...</div>
            <div v-else-if="recomendationByUser.length === 0">
                No destinations found.
            </div>
            <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <DestinationCard
                    v-for="destination in recomendationByUser"
                    :key="destination.id"
                    :destination="destination"
                />
            </div>

            <!-- Ordinary Recomendation -->
            <h1 class="text-4xl font-bold text-blue-900">Destinations List</h1>

            <!-- Destination List -->
            <div v-if="loading">Loading...</div>
            <div v-else-if="destinations.length === 0">
                No destinations found.
            </div>
            <div v-else class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <DestinationCard
                    v-for="destination in destinations"
                    :key="destination.id"
                    :destination="destination"
                />
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import DestinationCard from "@/Frontend Components/DestinationCard.vue";
import axios from "axios";

const selectedCategory = ref("");
const selectedRegion = ref("");
const destinations = ref([]);
const recommendeds = ref([]);
const recomendationByUser = ref([]);
const categories = ref([]);
const regions = ref([]);
const loading = ref(false);
const error = ref(null);

const fetchDestinations = async () => {
    loading.value = true;
    try {
        const response = await axios.get("/api/destinations", {
            params: {
                category: selectedCategory.value,
                region: selectedRegion.value,
            },
        });
        destinations.value = response.data.data;
    } catch (error) {
        console.error("Error fetching destinations:", error);
    } finally {
        loading.value = false;
    }
};

const fetchCategories = async () => {
    loading.value = true;
    try {
        const response = await axios.get("/api/categories");
        categories.value = response.data.data;
    } catch (error) {
        console.error("Error fetching categories:", error);
    }
};

const fetchRegions = async () => {
    loading.value = true;
    try {
        const response = await axios.get("/api/regions");
        regions.value = response.data;
    } catch (error) {
        console.error("Error fetching regions:", error);
    }
};

const fetchRecommendedDestinations = async () => {
    loading.value = true;
    try {
        const response = await axios.get("/api/destination/recomendation");
        recommendeds.value = response.data;
    } catch (error) {
        console.error("Error fetching recommended destinations:", error);
    }
};

const fetchRecommendedByUser = async () => {
    loading.value = true;
    try {
        const response = await axios.get(
            "/api/destination/recommendationByUser"
        );
        recomendationByUser.value = response.data;
    } catch (error) {
        console.error("Error fetching recommended destinations:", error);
    }
};

const search = ref("");
const searchResult = ref("");

const submitSearch = async () => {
    loading.value = true;
    try {
        const response = await axios.get(
            `/api/destination/search/${search.value}`
        );
        searchResult.value = response.data;
        console.log(searchResult.value);
    } catch (error) {
        console.error("Error fetching destinations:", error);
    } finally {
        loading.value = false;
    }
};

const clearSearch = async () => {
    loading.value = true;
    try {
        const response = await axios.get(`/api/destination/search/""`);
        searchResult.value = response.data;
        console.log(searchResult.value);
    } catch (error) {
        console.error("Error fetching destinations:", error);
    } finally {
        loading.value = false;
    }

    search.value = "";
};

watch([selectedCategory, selectedRegion], () => {
    fetchDestinations();
});

onMounted(() => {
    fetchCategories();
    fetchRegions();
    fetchDestinations();
    fetchRecommendedDestinations();
    fetchRecommendedByUser();
});
</script>
