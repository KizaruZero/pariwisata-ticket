<template>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div
            v-for="destination in destinations"
            :key="destination.id"
            class="card bg-white rounded-lg shadow-lg overflow-hidden w-80"
        >
            <img
                alt="Image of Bali Tour Package"
                class="w-full h-48 object-cover"
                :src="`/storage/${destination.image_url}`"
            />
            <div class="p-4">
                <div class="flex justify-between items-center mb-2">
                    <span
                        class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded"
                        >{{ destination.location }}</span
                    >
                    <span class="text-yellow-500">
                        <i class="fas fa-star"></i> {{ destination.rating }} / 5
                    </span>
                </div>
                <h3 class="text-lg font-bold mb-1">{{ destination.name }}</h3>
                <p class="text-gray-500 text-sm mb-2">23 August - 29 August</p>
                <p class="text-xl font-bold">$285</p>
                <NavLink
                    :href="`/destination/${destination.id}`"
                    class="mt-2 btn-primary"
                >
                    View Details
                </NavLink>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch } from "vue";
import axios from "axios";
import NavLink from "../Components/NavLink.vue";

// Define props
const props = defineProps({
    categoryId: {
        type: [Number, String],
        default: "", // Default to show all categories
    },
});

// Define state using ref
const destinations = ref([]);

// Watch for changes in categoryId and fetch data accordingly
watch(
    () => props.categoryId,
    (newCategoryId) => {
        fetchDestinations(newCategoryId);
    }
);

// Method to fetch destinations based on category filter
const fetchDestinations = (categoryId) => {
    let url = "/api/destinations/{categoryId}";
    if (categoryId) {
        url += `?category_id=${categoryId}`;
    }
    axios
        .get(url)
        .then((response) => {
            destinations.value = response.data;
        })
        .catch((error) => {
            console.log(error);
        });
};

// Initial fetch when the component is mounted
fetchDestinations(props.categoryId);
</script>
