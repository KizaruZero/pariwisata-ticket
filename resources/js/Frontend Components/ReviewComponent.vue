<template>
    <div v-if="canReview" class="mt-4">
        <div class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="flex flex-col mx-auto bg-white p-6 rounded-lg w-96 relative">
                <button @click="$emit('close')" class="absolute top-2 right-2 text-xl font-bold">
                    &times;
                </button>
                <h2 class="text-xl font-semibold mb-4">Leave a Review</h2>
                <form @submit.prevent="submitReview">
                    <!-- Star Rating Input -->
                    <label class="block mt-2">Rating</label>
                    <div class="flex space-x-2 mt-4">
                        <span
                            v-for="n in 5"
                            :key="n"
                            class="cursor-pointer w-full flex"
                            @click="setRating(n)"
                        >
                            <i
                                :class="
                                    n <= newReview.rating
                                        ? 'fas fa-star mx-auto text-yellow-500 text-2xl'
                                        : 'fas fa-star mx-auto text-gray-300 opacity-70 text-2xl'
                                "
                            ></i>
                        </span>
                    </div>

                    <label for="review_text" class="block mt-4">Review Detail</label>
                    <textarea
                        v-model="newReview.review_text"
                        id="review_text"
                        rows="4"
                        class="mt-4 p-2 border border-gray-300 rounded w-full"
                        required
                    ></textarea>

                    <button
                        type="submit"
                        class="flex mx-auto mt-4 bg-vaga text-white font-semibold p-2 px-4 rounded-lg"
                        :disabled="isSubmitting"
                    >
                        <span v-if="isSubmitting">Submitting...</span>
                        <span v-else>Submit Review</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

// Define emits for the close event
const emit = defineEmits(["close"]);

// Accept 'id' as a prop
const props = defineProps({
    destinationId: {
        type: [Number, String],
        required: true,
    },
});

// Define reactive states
const canReview = ref(false);
const isSubmitting = ref(false); // Tracks form submission state
const newReview = ref({
    rating: 1, // Initial rating
    review_text: "",
});

// Fetch destination data from API when mounted
onMounted(async () => {
    try {
        const reviewResponse = await axios.get(
            `/user/can-review/${props.destinationId}`
        );
        canReview.value = reviewResponse.data.canReview;
    } catch (error) {
        console.error("Error fetching review status:", error);
    }
});

// Method to set the rating
const setRating = (rating) => {
    newReview.value.rating = rating;
};

// Method to submit a review
const submitReview = async () => {
    if (isSubmitting.value) return; // Prevent multiple submissions
    isSubmitting.value = true;

    try {
        await axios.post(`/api/review`, {
            destination_id: props.destinationId,
            rating: newReview.value.rating,
            review_text: newReview.value.review_text,
        });
        alert("Review submitted successfully!");
        emit("close"); // Close the popup
    } catch (error) {
        console.error("Error submitting review:", error);
    } finally {
        isSubmitting.value = false; // Re-enable the button
    }
};
</script>

<style scoped>
/* Styling for better layout */
</style>
