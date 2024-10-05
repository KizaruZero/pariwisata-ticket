<template>
    <div
        class="card bg-opacity-70 rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl relative w-80"
    >
        <img
            alt="Image of Bali Tour Package"
            class="w-full h-48 object-cover transition-transform transform hover:scale-105"
            :src="`/storage/${destination.image_url}`"
        />
        <div class="p-4 content">
            <div class="flex justify-between items-center mb-2">
                <span
                    class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded"
                    >{{ destination.location }}</span
                >
                <span class="text-yellow-500">
                    <i class="fas fa-star text-yellow-500"></i>
                    {{ formatRating(destination.rating) }} / 5
                </span>
            </div>
            <h3 class="text-lg font-bold mb-1">{{ destination.name }}</h3>
            <p class="text-gray-500 text-sm mb-2">
                {{
                    destination.description.length > 25
                        ? destination.description.slice(0, 100) + "..."
                        : destination.description
                }}
            </p>
            <div class="flex justify-between items-center mt-4">
                <span
                    v-if="
                        destination.package_pricings.length &&
                        destination.package_pricings[0].lowest_price
                    "
                    class="text-lg font-bold"
                >
                    {{
                        formatCurrency(
                            destination.package_pricings[0].lowest_price
                        )
                    }}
                </span>
                <p v-else class="text-xl font-bold text-gray-400">
                    Price not available
                </p>
                <NavLink
                    :href="`/destination/${destination.id}`"
                    class="px-4 py-2 bg-green-600 hover:bg-green-800 text-white rounded-full transition duration-300 transform hover:scale-110"
                >
                    Book Now
                </NavLink>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import NavLink from "../Components/NavLink.vue";

const props = defineProps({
    destination: {
        type: Object,
        required: true,
    },
});

const formatCurrency = (value) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(value);
};

// Method to format rating with one decimal
const formatRating = (rating) => {
    return parseFloat(rating).toFixed(1);
};
</script>
