<template>
    <div
        class="card bg-opacity-70 w-[400px] h-[280px] rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl relative"
    >
        <!-- Background image as the bottom layer -->
        <div class="absolute inset-0 z-0">
            <img
                alt="Image of Bali Tour Package"
                class="w-full h-full object-cover"
                src="../assets/home.png"
            />
        </div>
        
        <!-- Rating Display -->
        <div>
            <span class="absolute m-4 px-2 text-gray-700 bg-white/55 rounded-2xl backdrop-blur-md">
                <i class="fas fa-star text-yellow-500"></i>
                {{ formatRating(destination.rating) }} / 5
            </span>
        </div>
        
        <!-- StarRating component replacing the previous span -->
        <div class="absolute top-4 right-4">
            <StarRating />
        </div>

        <!-- Content overlaying the image -->
        <div class="absolute bottom-3 left-3 right-3 z-10 px-2 py-1 rounded-xl content bg-white/40 backdrop-blur-md">
            <div class="flex flex-row justify-between items-start ">
                <h3 class="text-lg font-bold mb-1 text-gray-100">{{ destination.name }}</h3>
                <span class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded">
                    {{ destination.location }}
                </span>
            </div>
            
            <!-- Price and Booking Button -->
            <div class="flex justify-between items-center">
                <span class="text-sm font-bold">
                    {{ formatCurrency(destination.price) }} / Orang
                </span>
                <NavLink
                    :href="`/destination/${destination.id}`"
                    class="flex flex-row-reverse p-1 bg-green-500 w-32/5 space-x-3 hover:opacity-40 text-white rounded-full transition duration-300 transform hover:scale-110"
                >
                    <img
                    src="../assets/BookLogo.png"
                    class="w-[30px] h-[30px] flex mx-3"
                    >
                    <p class="flex mt-0.5">
                        Book Now
                    </p>
                </NavLink>
            </div>
        </div>
    </div>
</template>

<script setup>
import NavLink from "../Components/NavLink.vue";
import StarRating from "../Frontend Components/StarRating.vue";

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
