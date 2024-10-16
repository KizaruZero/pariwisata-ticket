<template>
    <GuestLayout>
        <div class="min-h-screen bg-white flex items-center justify-center">
            <div
                v-if="destination"
                class="w-full bg-blue-50 p-6 rounded-lg shadow-lg"
            >
                <img
                    :src="`/storage/${destination.image_url}`"
                    alt="Image"
                    class="w-full h-full object-cover rounded-lg"
                />
                <h1 class="text-3xl font-bold text-blue-900 mt-4">
                    {{ destination.name }}
                </h1>
                <p class="text-gray-700 mt-2">{{ destination.description }}</p>
                <p class="text-gray-500 mt-2">
                    Region: {{ destination.region.name }}
                </p>
                <p class="text-gray-500">
                    Category: {{ destination.category.name }}
                </p>

                <div v-if="destination.reviews.length > 0" class="mt-4">
                    <h2 class="text-xl font-semibold">Reviews</h2>
                    <div
                        v-for="review in destination.reviews"
                        :key="review.id"
                        class="mt-2 p-4 bg-gray-100 rounded-lg"
                    >
                        <p class="font-bold">{{ review.user.name }}</p>
                        <p class="text-yellow-500">
                            Rating: {{ review.rating }}/5
                        </p>
                        <p class="mt-2">{{ review.review_text }}</p>
                    </div>
                </div>

                <!-- Order form -->
                <form @submit.prevent="submitOrder">
                    <div class="mt-4">
                        <label for="quantity" class="block">Quantity</label>
                        <input
                            v-model.number="order.quantity"
                            type="number"
                            min="1"
                            class="mt-1 p-2 border rounded"
                            required
                        />
                    </div>

                    <div class="mt-4">
                        <label for="payment_method" class="block"
                            >Payment Method</label
                        >
                        <select
                            v-model="order.payment_method"
                            class="mt-1 p-2 border rounded"
                        >
                            <option value="credit_card">Credit Card</option>
                            <option value="bank_transfer">Bank Transfer</option>
                        </select>
                    </div>

                    <!-- Date -->
                    <div class="mt-4">
                        <label for="date" class="block" name="date">Date</label>
                        <input
                            v-model="order.booking_date"
                            type="date"
                            id="date"
                            class="mt-1 p-2 border rounded"
                            :min="minDate"
                            required
                        />
                    </div>

                    <button type="submit" class="mt-4 btn-primary">
                        Submit Order
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

                <ReviewComponent :destinationId="destinationId" />
                <div class="mt-8">
                    <ArticleCard
                        v-for="article in destination.articles"
                        :key="article.id"
                        :article="article"
                    />
                </div>

                <button
                    @click="toggleLike(destination)"
                    :class="[
                        'mt-4 p-2 rounded-lg',
                        destination.isLiked
                            ? 'bg-red-500 text-white'
                            : 'bg-blue-500 text-white',
                    ]"
                >
                    {{ destination.isLiked ? "Unlike" : "Like" }}
                </button>

                <button @click="goBack" class="mt-4 btn-primary">
                    Back to Destinations
                </button>
            </div>
            <div v-else>
                <p>Loading destination details...</p>
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

// Accept 'id' as a prop
const props = defineProps({
    id: {
        type: [Number, String],
        required: true,
    },
});

// Define reactive destination object
const destination = ref(null);
const destinationId = props.id;
const order = ref({
    destination_id: props.id,
    quantity: 1, // Default to 1
    payment_method: null,
    booking_date: null,
});

// Minimum date for booking
const minDate = computed(() => {
    const today = new Date();
    return today.toISOString().split("T")[0];
});

// Fetch destination data when mounted
onMounted(async () => {
    try {
        const response = await axios.get(`/api/destination/${props.id}`);
        destination.value = response.data;
    } catch (error) {
        console.error("Error fetching data:", error);
    }
});

const formErrors = ref([]);

const submitOrder = async () => {
    formErrors.value = [];

    try {
        if (new Date(order.value.booking_date) < new Date(minDate.value)) {
            formErrors.value.push("Booking date cannot be in the past");
            return;
        }

        // Submit order request
        const response = await axios.post("/api/orders", order.value);
        alert("Order submitted successfully");
        console.log(response.data);
    } catch (error) {
        if (error.response && error.response.status === 422) {
            formErrors.value = Object.values(error.response.data.errors).flat();
        } else if (error.response && error.response.status === 401) {
            window.location.href = "/login";
        } else {
            formErrors.value.push("An unexpected error occurred.");
        }
    }
};

// Method to go back
const goBack = () => {
    window.history.back();
};

// Method to toggle like
const toggleLike = async (destination) => {
    try {
        const response = await axios.post(`/api/destination/${props.id}/like`);
        destination.isLiked = response.data.isLiked;
        if (destination.isLiked) {
            destination.total_likes++;
            alert("Destination liked!");
        } else {
            destination.total_likes--;
            alert("Destination unliked!");
        }
    } catch (error) {
        if (error.response && error.response.status === 401) {
            window.location.href = "/login";
        } else {
            console.error("Error toggling like:", error);
        }
    }
};
</script>

<style scoped>
/* Styling for layout */
</style>
