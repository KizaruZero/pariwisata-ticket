<template>
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
</template>
<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

// Accept 'id' as a prop
const props = defineProps({
    destinationId: {
        type: [Number, String], // Accept both Number and String
        required: true,
    },
});

// Define reactive destination object

const canReview = ref(false);
const newReview = ref({
    rating: 1,
    review_text: "",
});

// Fetch destination data from API when mounted
onMounted(async () => {
    try {
        // Check if user can review
        const reviewResponse = await axios.get(
            `/user/can-review/${props.destinationId}`
        );
        canReview.value = reviewResponse.data.canReview;
        // Optionally, fetch other data like packagePricing, etc.
    } catch (error) {
        console.error(";", error);
    }
});

// Method to submit a review
const submitReview = async () => {
    try {
        await axios.post(`/api/review`, {
            destination_id: props.destinationId,
            rating: newReview.value.rating,
            review_text: newReview.value.review_text,
        });
        // Optionally, refresh reviews or handle success
        alert("Review submitted successfully!");
    } catch (error) {
        console.error("Error submitting review:", error);
    }
};
</script>

<style scoped>
/* Styling for better layout */
</style>
