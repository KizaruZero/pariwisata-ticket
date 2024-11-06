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

                    <!-- Payment Proof -->
                    <!-- Payment Proof -->
                    <div>
                        <label
                            for="payment_proof"
                            class="block text-sm font-medium text-gray-700 mb-2"
                        >
                            Payment Proof
                        </label>
                        <div class="relative">
                            <input
                                type="file"
                                id="payment_proof"
                                accept="image/*"
                                @change="handleFileUpload"
                                ref="fileInput"
                                class="hidden"
                                :class="{
                                    'border-red-500': errors.payment_proof,
                                }"
                            />
                            <button
                                @click="$refs.fileInput.click()"
                                class="w-full px-4 py-2.5 rounded-xl border-2 border-dashed border-orange-200 hover:border-orange-400 focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-300 bg-white/50 backdrop-blur-sm text-gray-500 hover:text-orange-600"
                            >
                                Click to upload payment proof
                            </button>
                        </div>

                        <!-- Image Preview -->
                        <div v-if="imagePreview" class="mt-4">
                            <div class="relative w-32 h-32">
                                <img
                                    :src="imagePreview"
                                    alt="Preview"
                                    class="w-full h-full object-cover rounded-xl"
                                />
                                <button
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

                        <p
                            v-if="errors.payment_proof"
                            class="mt-2 text-sm text-red-500"
                        >
                            {{ errors.payment_proof }}
                        </p>
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

const props = defineProps({
    id: {
        type: [Number, String],
        required: true,
    },
});

// Define reactive refs
const destination = ref(null);
const destinationId = props.id;
const fileInput = ref(null);
const imagePreview = ref(null);
const errors = ref({
    payment_proof: null,
});
const formErrors = ref([]);

const order = ref({
    destination_id: props.id,
    quantity: 1,
    payment_method: null,
    payment_proof: null,
    booking_date: null,
});

// Minimum date for booking
const minDate = computed(() => {
    const today = new Date();
    return today.toISOString().split("T")[0];
});

// Fetch destination data
onMounted(async () => {
    try {
        const response = await axios.get(`/api/destination/${props.id}`);
        destination.value = response.data;
    } catch (error) {
        console.error("Error fetching data:", error);
    }
});

const handleFileUpload = (event) => {
    const file = event.target.files[0];
    if (!file) return;

    // Validate file type
    if (!file.type.includes("image/")) {
        errors.value.payment_proof = "File must be an image";
        if (fileInput.value) {
            fileInput.value.value = "";
        }
        return;
    }

    // Validate file size (2MB)
    if (file.size > 2 * 1024 * 1024) {
        errors.value.payment_proof = "File size must be less than 2MB";
        if (fileInput.value) {
            fileInput.value.value = "";
        }
        return;
    }

    // Clear any previous errors
    errors.value.payment_proof = null;

    // Store file in order data
    order.value.payment_proof = file;

    // Create preview
    imagePreview.value = URL.createObjectURL(file);
};

const removeImage = () => {
    order.value.payment_proof = null;
    imagePreview.value = null;
    if (fileInput.value) {
        fileInput.value.value = "";
    }
    errors.value.payment_proof = null;
};

const submitOrder = async () => {
    formErrors.value = [];

    try {
        if (new Date(order.value.booking_date) < new Date(minDate.value)) {
            formErrors.value.push("Booking date cannot be in the past");
            return;
        }

        // Create FormData for file upload
        const formData = new FormData();
        formData.append("destination_id", order.value.destination_id);
        formData.append("quantity", order.value.quantity);
        formData.append("payment_method", order.value.payment_method);
        formData.append("booking_date", order.value.booking_date);
        if (order.value.payment_proof) {
            formData.append("payment_proof", order.value.payment_proof);
        }

        // Submit order request
        const response = await axios.post("/api/orders", formData, {
            headers: {
                "Content-Type": "multipart/form-data",
            },
        });
        alert("Order submitted successfully");
        console.log(response.data);
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

const goBack = () => {
    window.history.back();
};

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
        if (error.response?.status === 401) {
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
