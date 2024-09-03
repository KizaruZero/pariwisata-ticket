<template>
    <div class="container mx-auto p-4 pt-6 mt-10">
        <h1 class="text-3xl font-bold mb-4">Filter Destinations</h1>
        <form
            @submit.prevent="applyFilters"
            class="flex flex-wrap justify-between mb-4"
        >
            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <label for="category" class="block mb-2 text-gray-600"
                    >Category:</label
                >
                <select
                    v-model="filters.category"
                    class="block w-full p-2 pl-10 text-sm text-gray-700"
                >
                    <option value="">All</option>
                    <option
                        v-for="category in categories"
                        :key="category.id"
                        :value="category.id"
                    >
                        {{ category.name }}
                    </option>
                </select>
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <label for="region" class="block mb-2 text-gray-600"
                    >Region:</label
                >
                <select
                    v-model="filters.region"
                    class="block w-full p-2 pl-10 text-sm text-gray-700"
                >
                    <option value="">All</option>
                    <option
                        v-for="region in regions"
                        :key="region.id"
                        :value="region.id"
                    >
                        {{ region.name }}
                    </option>
                </select>
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <label for="minRating" class="block mb-2 text-gray-600"
                    >Min Rating:</label
                >
                <input
                    type="number"
                    v-model="filters.minRating"
                    min="1"
                    max="5"
                    class="block w-full p-2 pl-10 text-sm text-gray-700"
                />
            </div>

            <div class="w-full md:w-1/2 xl:w-1/3 p-4">
                <label for="maxRating" class="block mb-2 text-gray-600"
                    >Max Rating:</label
                >
                <input
                    type="number"
                    v-model="filters.maxRating"
                    min="1"
                    max="5"
                    class="block w-full p-2 pl-10 text-sm text-gray-700"
                />
            </div>

            <button
                type="submit"
                class="bg-orange-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded"
            >
                Apply Filters
            </button>
        </form>

        <h1 class="text-3xl font-bold mb-4">Filtered Destinations</h1>
        <ul
            v-if="data.length"
            class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3"
        >
            <li
                v-for="(destination, index) in data"
                :key="index"
                class="bg-white rounded-lg shadow-md p-4"
            >
                <h2 class="text-2xl font-bold mb-2">{{ destination.name }}</h2>
                <p class="text-gray-600 mb-4">{{ destination.description }}</p>
                <p class="text-gray-600 mb-2">
                    Location: {{ destination.location }}
                </p>
                <p class="text-gray-600 mb-2">
                    Region: {{ destination.region.name }}
                </p>
                <p class="text-gray-600 mb-2">
                    Category: {{ destination.category.name }}
                </p>
                <p class="text-gray-600 mb-2">
                    Rating: {{ destination.rating }}
                </p>
                <p class="text-gray-600 mb-2">
                    Popularity: {{ destination.popularity }}
                </p>
                <!-- Display reviews if needed -->
                <ul class="mb-4">
                    <li
                        v-for="review in destination.reviews"
                        :key="review.id"
                        class="bg-gray-100 rounded-lg shadow-md p-4 mb-4"
                    >
                        <strong>{{ review.user.name }}:</strong>
                        {{ review.review_text }} (Rating: {{ review.rating }})
                    </li>
                </ul>
            </li>
        </ul>
        <div v-else class="text-center">
            <p class="text-gray-600">No destinations found.</p>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

const props = defineProps({
    data: {
        type: Array,
        required: true,
    },
    filters: {
        type: Object,
        required: true,
    },
    categories: {
        type: Array,
        required: true,
    },
    regions: {
        type: Array,
        required: true,
    },
});

// Initialize the filters with the current filter values
const filters = ref({ ...props.filters });

// Apply filters by sending a request with the selected filter criteria
const applyFilters = () => {
    Inertia.get(route("destination"), filters.value, {
        preserveState: true,
    });
};
</script>
