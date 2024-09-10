<template>
    <div class="min-h-screen bg-white flex items-center justify-center">
        <div
            v-if="destination"
            class="max-w-4xl w-full bg-blue-50 p-6 rounded-lg shadow-lg"
        >
            <img
                :src="destination.image_url"
                alt="Image"
                class="w-full h-64 object-cover rounded-lg"
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
                    <p class="text-yellow-500">Rating: {{ review.rating }}/5</p>
                    <p class="mt-2">{{ review.review_text }}</p>
                </div>
            </div>

            <div v-if="canReview" class="mt-4">
                <h2 class="text-xl font-semibold">Leave a Review</h2>
                <form @submit.prevent="submitReview">
                    <label for="rating" class="block mt-2">Rating (1-5)</label>
                    <input
                        v-model="newReview.rating"
                        type="number"
                        id="rating"
                        min="1"
                        max="5"
                        class="mt-1 p-2 border border-gray-300 rounded"
                        required
                    />

                    <label for="review_text" class="block mt-2">Review</label>
                    <textarea
                        v-model="newReview.review_text"
                        id="review_text"
                        rows="4"
                        class="mt-1 p-2 border border-gray-300 rounded"
                        required
                    ></textarea>

                    <button type="submit" class="mt-4 btn-primary">
                        Submit Review
                    </button>
                </form>
            </div>

            <button @click="goBack" class="mt-4 btn-primary">
                Back to Destinations
            </button>
        </div>
        <div v-else>
            <!-- Placeholder or loading state while fetching data -->
            <p>Loading destination details...</p>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

// Accept 'id' as a prop
const props = defineProps({
    id: {
        type: [Number, String], // Accept both Number and String
        required: true,
    },
});

// Define reactive destination object
const destination = ref(null);
const canReview = ref(false);
const newReview = ref({
    rating: 1,
    review_text: "",
});

// Fetch destination data from API when mounted
onMounted(async () => {
    try {
        // Fetch destination data
        const response = await axios.get(`/api/destination/${props.id}`);
        destination.value = response.data;

        // Check if user can review
        const reviewResponse = await axios.get(`/user/can-review/${props.id}`);
        canReview.value = reviewResponse.data.canReview;
    } catch (error) {
        console.error("Error fetching data:", error);
    }
});

// Method to submit a review
const submitReview = async () => {
    try {
        await axios.post(`/api/review`, {
            destination_id: props.id,
            rating: newReview.value.rating,
            review_text: newReview.value.review_text,
        });
        // Optionally, refresh reviews or handle success
        alert("Review submitted successfully!");
    } catch (error) {
        console.error("Error submitting review:", error);
    }
};

// Method to go back (using native history for simplicity)
const goBack = () => {
    window.history.back();
};
</script>

<style scoped>
/* Styling for better layout */
</style>
