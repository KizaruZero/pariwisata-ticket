<template>
    <GuestLayout>
        <div
            class="flex flex-col items-center justify-center min-h-screen bg-blue-100"
        >
            <div class="text-center mb-4">
                <h1 class="text-4xl font-bold text-blue-900">
                    Filter Destinations by Category
                </h1>
                <p class="mt-4 text-lg text-blue-600">
                    Select a category to view filtered destinations.
                </p>
            </div>

            <!-- Dropdown for categories -->
            <div class="mb-8">
                <select v-model="selectedCategory" @change="fetchDestinations">
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

            <!-- Filter by Region -->

            <!-- Destination List -->
            <DestinationCard :categoryId="selectedCategory" />
        </div>
    </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import DestinationCard from "@/Frontend Components/DestinationCard.vue";
import { ref, onMounted } from "vue";
import axios from "axios";

export default {
    name: "DestinationView",
    components: {
        GuestLayout,
        DestinationCard,
    },
    setup() {
        const categories = ref([]);
        const selectedCategory = ref("");

        // Fetch categories for the filter dropdown
        onMounted(() => {
            axios
                .get("/api/categories")
                .then((response) => {
                    categories.value = response.data.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        });

        const fetchDestinations = () => {
            // This method will be triggered when the category is changed
        };

        return {
            categories,
            selectedCategory,
            fetchDestinations,
        };
    },
};
</script>
