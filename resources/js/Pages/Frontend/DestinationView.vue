<template>
    <GuestLayout>
        <div
            class="flex flex-col items-center justify-center min-h-screen bg-cream"
        >
            <div
                v-if="loading"
                class="flex justify-center items-center h-64 absolute"
            >
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

            <!-- Hero -->
            <div class="relative tracking-wide">
                <!-- Image -->
                <img
                    src="../../assets/Explore.png"
                    alt="Scenic view of a coastline"
                    class="w-screen h-[350px] object-cover z-0 tracking-wider"
                />

                <!-- Dropdowns and Search Field on Top of Image -->
                <div
                    class="absolute inset-0 flex flex-col items-center text-center bg-black bg-opacity-50 space-y-4"
                >
                    <!--Text Part-->
                    <div class="text-5xl text-cream p-6 mt-10 font-semibold">
                        <h1>Popular Places Near Where You Are</h1>
                    </div>
                    <!--Dropdown Part-->
                    <!-- Dropdown for categories -->
                    <div
                        class="font-montseratt w-full items-center justify-center flex space-x-20"
                    >
                        <div class="w-full max-w-[300px]">
                            <select
                                v-model="selectedCategory"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            >
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
                        <div class="w-full max-w-[300px] font-montseratt">
                            <select
                                v-model="selectedRegion"
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            >
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
                    </div>

                    <!-- Search Field with Clear Button -->
                    <div class="w-full max-w-md pt-4 font-montseratt">
                        <form
                            @submit.prevent="submitSearch"
                            class="flex items-center space-x-2"
                        >
                            <input
                                id="search"
                                type="text"
                                v-model="search"
                                placeholder="Search for destination..."
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500"
                            />
                            <button
                                v-if="search"
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

                    <section
                        class="absolute bottom-0 w-full h-[50px] bg-cream rounded-t-[91px]"
                    >
                        <div
                            class="h-full flex items-center -mt-8 justify-center italic text-white text-3xl"
                        ></div>
                    </section>
                </div>
            </div>

            <!-- Destination Search Result -->
            <div class="">
                <div v-if="loading" class="mt-72 relative">.</div>
                <div
                    v-if="
                        !loading && searchClicked && searchResult.length === 0
                    "
                    class=""
                >
                    <h1
                        class="text-4xl text-vaga font-bold col-span-full w-full justify-center items-center mx-auto font-montseratt"
                    >
                        Search Result
                    </h1>
                    <p
                        class="text-xl text-bond font-semibold text-center mt-2 mb-8 font-montseratt"
                    >
                        No Destination Found.
                    </p>
                </div>
                <div
                    v-else-if="searchClicked && searchResult.length > 0"
                    class="grid grid-cols-1 md:grid-cols-3 gap-6"
                >
                    <h1
                        class="text-4xl text-vaga font-bold col-span-full justify-center items-center mx-auto font-montseratt"
                    >
                        Search Result
                    </h1>
                    <DestinationCard
                        v-for="destination in searchResult"
                        :key="destination.id"
                        :destination="destination"
                    />
                </div>
            </div>

            <!--All Destination List -->
            <div>
                <div v-if="loading">.</div>
                <div v-else-if="destinations.length === 0">
                    No destinations found.
                </div>
                <div v-else class="flex flex-col">
                    <h1
                        class="text-4xl font-bold text-vaga justify-center items-center mx-auto font-montseratt"
                    >
                        Destinations List
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                        <DestinationCard
                            v-for="destination in destinations"
                            :key="destination.id"
                            :destination="destination"
                        />
                    </div>
                </div>
            </div>

            <!-- Recomended Destination All-->
            <div class="mt-8">
                <!-- Destination List -->
                <div>
                    <div v-if="loading" class="w-full mx-auto font-montseratt">
                        .
                    </div>
                    <div v-else-if="recommendeds.length === 0">
                        No Recomendation destinations found.
                    </div>
                    <div v-else>
                        <div class="mx-auto p-6">
                            <div class="text-center">
                                <h1
                                    class="text-3xl text-vaga font-bold font-montseratt hover:text-pink-600 transition duration-300"
                                >
                                    Travel Recommendations
                                </h1>
                                <p class="text-bond font-montseratt">
                                    The best travel recommendations from around
                                    Indonesia for you.
                                </p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <DestinationCard
                                v-for="destination in recommendeds"
                                :key="destination.id"
                                :destination="destination"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recomended Destination User-->
            <div class="m-8">
                <!-- Destination List -->
                <div>
                    <div v-if="loading">.</div>
                    <div v-else-if="recomendationByUser.length === 0">
                        No destinations found.
                    </div>
                    <div v-else>
                        <div class="mx-auto p-6">
                            <div class="text-center">
                                <h1
                                    class="text-3xl text-vaga font-bold hover:text-pink-600 transition duration-300"
                                >
                                    Destination Recomendation by Your Interest
                                </h1>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <DestinationCard
                                v-for="destination in recomendationByUser"
                                :key="destination.id"
                                :destination="destination"
                            />
                        </div>
                    </div>
                </div>
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
    const cachedCategories = localStorage.getItem("categories");

    if (cachedCategories) {
        categories.value = JSON.parse(cachedCategories);
    } else {
        loading.value = true;
        try {
            const response = await axios.get("/api/categories");
            categories.value = response.data.data;
            localStorage.setItem(
                "categories",
                JSON.stringify(categories.value)
            );
        } catch (error) {
            console.error("Error fetching categories:", error);
        } finally {
            loading.value = false;
        }
    }
};

const fetchRegions = async () => {
    const cachedRegions = localStorage.getItem("regions");

    if (cachedRegions) {
        regions.value = JSON.parse(cachedRegions);
    } else {
        loading.value = true;
        try {
            const response = await axios.get("/api/regions");
            regions.value = response.data;
            localStorage.setItem("regions", JSON.stringify(regions.value));
        } catch (error) {
            console.error("Error fetching regions:", error);
        } finally {
            loading.value = false;
        }
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
const searchResult = ref([]);
const searchClicked = ref(false);

const submitSearch = async () => {
    loading.value = true;
    searchClicked.value = true; // Set to true when search is initiated
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
    searchClicked.value = false; // Reset searchClicked when clearing the search
};

watch([selectedCategory, selectedRegion], () => {
    fetchDestinations();
});

// onMounted(() => {
//     fetchCategories();
//     fetchRegions();
//     fetchDestinations();
//     fetchRecommendedDestinations();
//     fetchRecommendedByUser();
// });

onMounted(() => {
    loading.value = true;
    Promise.all([
        fetchCategories(),
        fetchRegions(),
        fetchDestinations(),
        fetchRecommendedDestinations(),
        fetchRecommendedByUser(),
    ])
        .then(() => {
            loading.value = false;
        })
        .catch((error) => {
            console.error("Error fetching data:", error);
            loading.value = false;
        });
});
</script>
