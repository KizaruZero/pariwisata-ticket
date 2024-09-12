<!-- resources/js/Components/DestinationList.vue -->
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
import { ref, onMounted } from "vue";
import axios from "axios";
import NavLink from "../Components/NavLink.vue"; // Import NavLink component

// Define state using ref
const destinations = ref([]);

// Fetch data when the component is mounted
onMounted(() => {
    axios
        .get("/api/destinations")
        .then((response) => {
            destinations.value = response.data.data;
        })
        .catch((error) => {
            console.log(error);
        });
});

// Method to handle navigation with Inertia
</script>

<style scoped>
.card {
    border: 1px solid #e5e7eb;
    border-radius: 8px;
    overflow: hidden;
    transition: box-shadow 0.3s;
}

.card:hover {
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
}
</style>
