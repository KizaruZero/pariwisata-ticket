<template>
    <GuestLayout>
        <div class="min-h-screen bg-white flex items-center justify-center">
            <div
                v-if="destination"
                class="relative w-full h-full bg-cream rounded-lg shadow-lg"
            >
                <!--
            <img
                    :src="`/storage/${destination.image_url}`"
                    alt="Image"
                    class="w-full h-full object-cover rounded-lg"
                />
            -->
                <div class="relative">
                    <img
                        src="../../assets/home.png"
                        alt="Image"
                        class="w-full h-[400px] object-cover"
                    />
                    <section
                        class="absolute bottom-0 w-full h-[50px] bg-cream rounded-t-[91px]"
                    >
                        <div
                            class="h-full flex items-center -mt-8 justify-center italic text-white text-3xl"
                        >
                            <!--Star Component-->
                            <span
                                class="absolute w-16 h-16 mt-2 right-[150px] flex items-center justify-center rounded-full bg-bond cursor-pointer border"
                                :class="
                                    destination.isLiked
                                        ? 'border-yellow-400'
                                        : 'border-black'
                                "
                                @click="handleStar"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    class="w-5 h-5"
                                    :fill="
                                        destination.isLiked
                                            ? 'yellow'
                                            : 'transparent'
                                    "
                                    :stroke="
                                        destination.isLiked ? 'yellow' : 'white'
                                    "
                                    stroke-width="2"
                                >
                                    <path
                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"
                                    />
                                </svg>
                            </span>
                            <!--
                        <StarRating
                            @click="toggleLike(destination)"
                            :class="[
                            'absolute w-16 h-16 mt-2 right-[150px]',
                            destination.isLiked
                                ? 'border-yellow-400 text-white'
                                : 'bg-blue-500 text-white',
                        ]"  :fill="clicked ? 'yellow' : 'transparent'"
                        :stroke="clicked ? 'yellow' : 'white'"
                                class="a"
                            ></StarRating>
                        
                        --></div>
                    </section>
                </div>

                <div class="px-20 w-full">
                    <div class="relative flex">
                        <h1 class="text-6xl font-bold text-[#1d8a89]">
                            {{ destination.name }}
                        </h1>
                        <span
                            class="absolute right-4 m-4 px-2 text-gray-700 text-3xl bg-white/55 rounded-2xl backdrop-blur-md"
                        >
                            {{ formatRating(destination.rating) }} / 5
                            <i class="fas fa-star text-yellow-500"></i>
                        </span>
                    </div>
                    <div>
                        <p class="text-3xl font-bold pt-4">
                            {{ formatCurrency(destination.price) }} / Orang
                        </p>
                    </div>

                    <div class="flex flex-row space-x-2 my-4">
                        <p class="flex text-gray-500">
                            Region: {{ destination.region.name }}
                        </p>
                        <p class="flex text-gray-500">
                            Category: {{ destination.category.name }}
                        </p>
                    </div>

                    <p class="text-gray-700 text-[32px] mt-2">
                        {{ destination.description }}
                    </p>

                    <h2 class="text-xl font-semibold mt-8">LATEST REVIEW</h2>
                    <div
                        v-if="destination.reviews.length > 0"
                        class="flex flex-grow h-[200px]"
                    >
                        <div
                            v-for="review in destination.reviews
                                .slice(-4)
                                .reverse()"
                            :key="review.id"
                            class="my-2 mx-2 p-2 shadow-lg border-gray-900/5 border-2 bg-cream rounded-lg flex-grow"
                        >
                            <div class="flex items-center">
                                <!-- Loop to display 5 stars -->
                                <span
                                    v-for="n in 5"
                                    :key="n"
                                    class="text-yellow-500"
                                >
                                    <i
                                        :class="
                                            n <= review.rating
                                                ? 'fas fa-star text-yellow-500'
                                                : 'fas fa-star text-gray-300 opacity-50'
                                        "
                                    ></i>
                                </span>
                                <span class="ml-2 text-gray-700"
                                    >{{ review.rating }}/5</span
                                >
                            </div>
                            <p class="font-bold">{{ review.user.name }}</p>
                            <p class="mt-2">{{ review.review_text }}</p>
                        </div>
                    </div>
                    
                    <div>
                        
                        <section class="flex overflow-hidden flex-col items-center py-16 mt-12 bg-stone-200 rounded-[30px]">
                            <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/0e67fc3994fbf8afd00365a5969671e02c70704ccbde629bf9c41c050a1f5fc5?apiKey=ed89e008b7de47e5a3187e8a4c1c72f3&" alt="Vagabond logo" class="object-contain max-w-full aspect-[1.62] w-[193px]" />
                            <h2 class="mt-1 text-3xl font-semibold leading-none text-teal-600">VAGABOND</h2>
                            <div class="flex flex-col self-stretch mx-auto mt-7 w-full max-w-screen-2xl">
                            
                            <form @submit.prevent="submitOrder" class="mt-8 mx-auto">
                            <article class="flex flex-wrap gap-10 max-w-7xl bg-zinc-300 rounded-[30px]  ">
                                <div class="flex-auto">
                                    <div class="flex gap-5 max-md:flex-col">
                                        <div class="flex flex-col max-w-md">
                                            <img 
                                            loading="lazy" 
                                            src="../../assets/home.png" 
                                            alt="Pura Tanah Lot" 
                                            class="object-cover grow w-full h-52 aspect-[1.4] rounded-[30px_0px_0px_30px] " />
                                        </div>
                                        <div class="flex flex-grow ml-5 mr-48 ">
                                            <div class="flex flex-col mt-9 leading-snug text-stone-900 ">
                                                <h3 class="text-xl font-bold">
                                                    {{ destination.name }}
                                                </h3>
                                                <p class="self-start mt-2 text-xl font-semibold">{{ formatCurrency(destination.price) }} / Orang</p>
                                            </div>
                                        </div>
                                        <div class="flex flex-grow items-center -mt-2 mr-8">
                                            <div class="flex flex-col">
                                                <label for="quantity" class="block">Quantity</label>
                                                <input
                                                    v-model.number="order.quantity"
                                                    type="number"
                                                    min="1"
                                                    class="mt-1 p-2 border rounded"
                                                    required
                                                />
                                                
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                                
                                    <div class="flex flex-col">
                                        <div class="mt-4">
                                            <label for="payment_method" class="block"
                                                >Payment Method</label
                                            >
                                            <select
                                                v-model="order.payment_method"
                                                class="mt-1 p-2 border rounded"
                                                required
                                            >
                                                <option value="">Select Payment Method</option>
                                                <option value="credit_card">Credit Card</option>
                                                <option value="bank_transfer">
                                                    Bank Transfer
                                                </option>
                                            </select>
                                        </div>
                                    
                                    

                                    <div class="mt-4">
                                        <label for="date" class="block">Date</label>
                                        <input
                                            v-model="order.booking_date"
                                            type="date"
                                            id="date"
                                            class="mt-1 p-2 border rounded"
                                            :min="minDate"
                                            required
                                        />
                                    </div>

                                    <!-- Payment Proof -->
                                    <div class="mt-6">
                                        <label
                                        for="payment_proof"
                                        class="block text-sm font-medium text-gray-900 mb-2"
                                        >
                                        Payment Proof
                                        </label>
                                        <div class="relative">
                                        <input
                                            type="file"
                                            id="payment_proof"
                                            accept="image/*"
                                            @change="handleFilePreview"
                                            ref="fileInput"
                                            class="hidden"
                                        />
                                        <button
                                            type="button"
                                            @click="$refs.fileInput.click()"
                                            class="px-4 py-2.5 rounded-xl border-2 border-dashed border-orange-200 hover:border-orange-400 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-500 hover:text-orange-600"
                                        >
                                            <span v-if="!imagePreview">Upload payment proof</span>
                                            <div v-if="imagePreview" class="mt-4">
                                            <div class="relative w-32 h-32">
                                                <img
                                                :src="imagePreview"
                                                alt="Preview"
                                                class="w-full h-full object-cover rounded-xl"
                                                />
                                                <button
                                                type="button"
                                                @click="removeImage"
                                                class="absolute -top-2 -right-2 bg-red-500 text-white p-1 rounded-full hover:bg-red-600 transition-colors"
                                                >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 w-4"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                    fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"
                                                    />
                                                </svg>
                                                </button>
                                            </div>
                                            </div>
                                        </button>
                                        </div>

                                        <!-- Error Message -->
                                        <p
                                        v-if="errors.payment_proof"
                                        class="mt-2 text-sm text-red-500"
                                        >
                                        {{ errors.payment_proof }}
                                        </p>
                                    </div>

                                </div>
                                

                                <button
                                    type="submit"
                                    class="mt-4 bg-lime-600 text-white p-4 rounded-full disabled:bg-gray-400 disabled:cursor-not-allowed"
                                    :disabled="isSubmitting || !isFormValid"
                                >
                                    {{
                                        isSubmitting ? "Processing..." : "Submit Order"
                                    }}
                                </button>

                                <div
                                    v-if="formErrors.length"
                                    class="mt-4 bg-red-100 p-4 rounded"
                                >
                                    <ul>
                                        <li
                                            v-for="error in formErrors"
                                            :key="error"
                                            class="text-red-600"
                                        >
                                            {{ error }}
                                        </li>
                                    </ul>
                                </div>
                            </form>                            
                            </div>
                        </section>
                        

                    </div>

                    <!-- Order form -->
                    

                    <!--Review-->
                    <ReviewComponent :destinationId="destinationId" />
                    <div class="mt-8">
                        <ArticleCard
                            v-for="article in destination.articles"
                            :key="article.id"
                            :article="article"
                        />
                    </div>

                    <!-- <button @click="goBack" class="mt-4 btn-primary">
                        Back to Destinations
                    </button> -->
                </div>
            </div>
        </div>
        
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted, computed } from "vue";
import axios from "axios";
import { defineProps } from "vue";
import ReviewComponent from "../../Frontend Components/ReviewComponent.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import ArticleCard from "@/Frontend Components/ArticleCard.vue";
import StarRating from "@/Frontend Components/StarRating.vue";

const props = defineProps({
    id: {
        type: [Number, String],
        required: true,
    },
});

function disableButton() {
    // Disable the button to prevent further clicks
    const button = document.getElementById("submitOrderButton");
    button.disabled = true;
    // Optional: change button style to indicate it's disabled
    button.classList.add("bg-gray-400", "cursor-not-allowed");
    button.classList.remove("bg-lime-600");
}

const destination = ref(null);
const favoriteDestination = ref([]);
const destinationId = props.id;
const fileInput = ref(null);

const order = ref({
    destination_id: props.id,
    quantity: 1,
    payment_method: null,
    payment_proof: null,
    booking_date: null,
});

const imagePreview = ref(null);
const formErrors = ref([]);
const isSubmitting = ref(false);
const errors = ref({
    payment_proof: null,
});

// Computed property to check if form is valid
const isFormValid = computed(() => {
    return (
        order.value.quantity > 0 &&
        order.value.payment_method &&
        order.value.booking_date &&
        order.value.payment_proof &&
        !errors.value.payment_proof
    );
});

// Currency formatter
const formatCurrency = (value) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(value);
};

// Rating formatter
const formatRating = (rating) => {
    return parseFloat(rating).toFixed(1); // Formats rating to one decimal
};

// Minimum date for booking
const minDate = computed(() => {
    const today = new Date();
    return today.toISOString().split("T")[0];
});

// Fetch favorite destinations and destination data on mount
onMounted(async () => {
    try {
        const favoriteResponse = await axios.get(`/api/profile/favorite`);
        favoriteDestination.value = favoriteResponse.data.data;

        const response = await axios.get(`/api/destination/${props.id}`);
        destination.value = response.data;

        destination.value.isLiked = favoriteDestination.value.some(
            (fav) => fav.id === destination.value.id
        );
    } catch (error) {
        console.error("Error fetching data:", error);
    }
});

// Handle file upload
const handleFilePreview = (event) => {
    const file = event.target.files[0];
    if (file) {
        if (file.size > 5 * 1024 * 1024) {
            // 5MB limit
            errors.value.payment_proof = "File size should not exceed 5MB";
            return;
        }

        if (!file.type.startsWith("image/")) {
            errors.value.payment_proof = "Please upload an image file";
            return;
        }

        errors.value.payment_proof = null;
        order.value.payment_proof = file;

        // Create preview
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.value = e.target.result;
        };
        reader.readAsDataURL(file);
    }
};

// Remove image
const removeImage = () => {
    order.value.payment_proof = null;
    imagePreview.value = null;
    if (fileInput.value) {
        fileInput.value.value = "";
    }
};

// Submit order
const submitOrder = async () => {
    formErrors.value = [];
    isSubmitting.value = true;

    try {
        if (new Date(order.value.booking_date) < new Date(minDate.value)) {
            formErrors.value.push("Booking date cannot be in the past");
            return;
        }

        const formData = new FormData();
        formData.append("destination_id", order.value.destination_id);
        formData.append("quantity", order.value.quantity);
        formData.append("payment_method", order.value.payment_method);
        formData.append("booking_date", order.value.booking_date);
        if (order.value.payment_proof) {
            formData.append("payment_proof", order.value.payment_proof);
        }

        const response = await axios.post("/api/order", formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });
        alert("Order submitted successfully");

        order.value = {
            destination_id: props.id,
            quantity: 1,
            payment_method: null,
            payment_proof: null,
            booking_date: null,
        };
        imagePreview.value = null;
    } catch (error) {
        if (error.response?.status === 422) {
            formErrors.value = Object.values(error.response.data.errors).flat();
        } else if (error.response?.status === 401) {
            window.location.href = "/login";
        } else {
            formErrors.value.push("An unexpected error occurred.");
        }
    }
};

const clicked = ref(); // Use ref for reactive state

const handleStar = () => {
    toggleStar();
    toggleLike(destination);
};

const toggleStar = () => {
    clicked.value = !clicked.value; // Toggle the clicked state
};

// Toggle like
const toggleLike = async () => {
    try {
        const response = await axios.post(`/api/destination/${props.id}/like`);
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
</script>

<style scoped>
/* Add any custom styles if needed */
</style>

<style scoped>
/* Styling for layout */
</style>
