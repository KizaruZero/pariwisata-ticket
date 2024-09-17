<template>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div
            v-for="destination in destinations"
            :key="destination.id"
            class="card"
        >
            <img
                :src="destination.image_url"
                alt="Image"
                class="w-full h-48 object-cover"
            />
            <div class="p-4">
                <h3 class="text-lg font-bold">{{ destination.name }}</h3>
                <p>{{ destination.location }}</p>
                <p>Rating: {{ destination.rating }} / 5</p>
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
