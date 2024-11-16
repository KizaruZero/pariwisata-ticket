<template>
    <div
        class="card bg-opacity-70 w-[400px] h-[280px] rounded-lg shadow-lg overflow-hidden transition-transform transform hover:scale-105 hover:shadow-2xl relative"
    >
        <!-- Background image as the bottom layer -->
        <div class="absolute inset-0 z-0">
            <img
                alt="Image of the destination"
                class="w-full h-full object-cover"
                src="../assets/home.png"
            />
        </div>

        <!-- Rating Display -->
        <div class="relative top-4">
            <div
                class="absolute left-4 mt-1 px-2 text-gray-700 bg-white/55 rounded-2xl backdrop-blur-md"
            >
                <i class="fas fa-star text-yellow-500"></i>
                {{ formatRating(destination?.rating || 0) }} / 5
        </div>
            <!--Star Component-->
            <div 
                class="absolute right-4 w-10 h-10  z-50 flex  items-center justify-center rounded-full bg-bond cursor-pointer border"
                :class="destination.isLiked ? 'border-yellow-400' : 'border-black'"
                @click="handleStar"
            >
                <svg 
                
                xmlns="http://www.w3.org/2000/svg" 
                viewBox="0 0 24 24" 
                class="w-5 h-5"
                :fill="destination.isLiked ? 'yellow' : 'transparent'"
                :stroke="destination.isLiked ? 'yellow' : 'white'"
                stroke-width="2"
                >
                <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
                </svg>
            </div>
        </div>   

        <!-- Content overlaying the image -->
        <div
            class="absolute bottom-3 left-3 right-3 z-10 px-2 py-1 rounded-xl content bg-white/40 backdrop-blur-md"
        >
            <div class="flex flex-row justify-between items-start">
                <h3 class="text-lg font-bold mb-1 text-gray-100">
                    {{
                        destination.name.length > 20
                        ? destination.name.slice(0, 20) + "..."
                        : destination?.name || 'Unknown Destination' 
                    }}
                </h3>
                <span
                    class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded"
                >
                    
                    {{
                        destination.location.length > 25
                        ? destination.location.slice(0, 25) + "..."
                        : destination.location || 'Unknown Location' 
                    }}
                </span>
            </div>

            <!-- Price and Booking Button -->
            <div class="flex justify-between items-center">
                <span class="text-sm font-bold">
                    {{ formatCurrency(destination?.price || 0) }} / Orang
                </span>
                <NavLink
                    :href="`/destination/${destination?.id || ''}`"
                    class="flex flex-row-reverse p-1 bg-green-500 w-32/5 space-x-3 hover:opacity-40 text-white rounded-full transition duration-300 transform hover:scale-110"
                >
                    <img
                        src="../assets/BookLogo.png"
                        class="w-[30px] h-[30px] flex mx-3"
                    />
                    <p class="flex mt-0.5">Book Now</p>
                </NavLink>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import NavLink from '../Components/NavLink.vue';
import StarRating from '../Frontend Components/StarRating.vue';

const props = defineProps({
    destination: {
        type: Object,
        default: () => ({}), // Default to an empty object to avoid null reference errors
    },

});

const destination = ref(props.destination);
const favoriteDestination = ref([]);



// Format currency for display
const formatCurrency = (value) => {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    }).format(value);
};

// Format rating with one decimal
const formatRating = (rating) => {
    return parseFloat(rating).toFixed(1);
};

const clicked = ref(); // Use ref for reactive state

const handleStar = () => {
    toggleStar();
    toggleLike(destination);
};

const toggleStar = () => {
  clicked.value = !clicked.value; // Toggle the clicked state
};


onMounted(async () => {
    try {
        // Fetch user's favorite destinations
        const favoriteResponse = await axios.get(`/api/profile/favorite`);
        favoriteDestination.value = favoriteResponse.data.data;

        // Fetch the latest data for the destination
        const response = await axios.get(`/api/destination/${destination.value.id}`);
        destination.value = response.data;

        // Set isLiked based on user's favorite destinations
        destination.value.isLiked = favoriteDestination.value.some(
            (fav) => fav.id === destination.value.id
        );
    } catch (error) {
        console.error("Error fetching data:", error);
    }
});
// Toggle like
const toggleLike = async () => {
    try {
        const response = await axios.post(`/api/destination/${props.destination.id}/like`);
        destination.value.isLiked = response.data.isLiked;

        if (destination.value.isLiked) {
            destination.value.total_likes++;
            alert("Destination liked!");
        } else {
            destination.value.total_likes--;
            alert("Destination unliked!");
        }
    } catch (error) {
        if (error.response?.status === 401) {
            window.location.href = "/login";
        } else {
            console.error("Error toggling like:", error);
        }
    }
};

console.log("props.id:", props.id);

</script>
