<template>
    <div class="bg-gray-100 min-h-screen p-6">
        <h1 class="text-3xl font-bold text-green-600 mb-6 text-center">
            Order History
        </h1>

        <!-- Loading State -->
        <div
            v-if="loading"
            class="text-center text-lg font-semibold text-gray-700"
        >
            Loading...
        </div>

        <!-- Order List -->
        <div
            v-if="!loading && orders.length > 0"
            class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6"
        >
            <div
                v-for="order in orders"
                :key="order.id"
                class="bg-white shadow-lg rounded-lg overflow-hidden"
            >
                <!-- Card Header -->
                <div
                    class="p-4"
                    :class="{
                        'bg-green-500': order.status === 'approved',
                        'bg-yellow-500': order.status === 'pending',
                        'bg-red-500': order.status === 'rejected'
                    }"
                >
                    
                    <div class="">
                        <p class="text-lg font-semibold text-white">Date:
                            {{
                                formatDate(order.booking_date)
                            }}
                        </p>
                    </div>
                    <h2 class="text-white text-lg font-semibold">
                        Order Code #{{ order.id }}
                    </h2>
                </div>

                <!-- Card Body -->
                <div class="p-4">
                    <div class="mb-4">
                        <p class="text-gray-700 text-sm">Destination:</p>
                        <p class="text-lg font-semibold text-gray-900">
                            {{ order.destination.name }}
                        </p>
                    </div>

                    

                    <div class="mb-4">
                        <p class="text-gray-700 text-sm">Package Price:</p>
                        <p class="text-lg font-semibold text-gray-900">
                            {{ formatCurrency(order.total_price) }}
                        </p>
                    </div>

                    <div class="mb-4">
                        <p class="text-gray-700 text-sm">Payment Method:</p>
                        <p
                            class="text-lg font-semibold text-gray-900 capitalize"
                        >
                            {{ order.payment_method.replace("_", " ") }}
                        </p>
                    </div>

                    
                </div>

                <!-- Card Footer with CTA button -->
                <div
                    class="p-4 h-full "
                    :class="{
                        'bg-green-500': order.status === 'approved',
                        'bg-yellow-500': order.status === 'pending',
                        'bg-red-500': order.status === 'rejected'
                    }"
                >
                <div class="flex justify-between">
                    <button
                        class="flex justify-center items-center  text-white  rounded-lg hover:opacity-75 transition"
                    >
                        <p class="text-white text-lg">
                            Status:
                            <span class="font-bold capitalize">{{ order.status }}</span>
                        </p>
                    </button>

                    <!-- Add Review Button for Approved Status -->
                    <ReviewComponent
                    v-if="showReviewPopup"
                    :destinationId="destinationId"
                    @close="toggleReview"
                />
                    <button
                        v-if="order.status === 'approved'"
                        @click="toggleReview(order.destination.id)" 
                        class="flex bg-cyan-600 shadow-sm p-2 rounded-md font-medium text-white hover:bg-gray-600"
                    >
                        Add a review
                    </button>
                    
                
                </div>
                </div>

                <!-- Review Popup -->
                

            </div>
        </div>

        <!-- No orders found message -->
        <div
            v-if="!loading && orders.length === 0"
            class="text-center text-lg font-semibold text-gray-700"
        >
            No orders found.
        </div>
    </div>
</template>

<script setup>
import { ref, onMounted, watch } from "vue";
import ReviewComponent from "@/Frontend Components/ReviewComponent.vue";
import axios from "axios";

// State management
const orders = ref([]);
const loading = ref(true);

defineProps({
    destinationId: {
        type: [Number, String], // Adjust the type to match your data
        required: true,
    },
    
});

// Fetch order data on component mount
onMounted(async () => {
    try {
        const response = await axios.get("api/orders/history");
        orders.value = response.data.orders;

        if (props.destinationId) {
            const reviewResponse = await axios.get(
                `/user/can-review/${props.destinationId}`
            );
            canReview.value = reviewResponse.data.canReview; // Ensure `canReview` is a boolean
        }
    } catch (error) {
        console.error("Error fetching data:", error);
    } finally {
        loading.value = false;
    }
});

const formatCurrency = (value) => {
    return new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
    }).format(value);
};

const formatDate = (dateString) => {
    const date = new Date(dateString);
    return date.toLocaleDateString("id-ID", {
        day: "numeric",
        month: "long",
        year: "numeric",
    });
};

// Reactive state for the review popup
const showReviewPopup = ref(false);


const destinationId = ref(null); // Track the current destinationId

const reviewedDestinations = ref(new Set());

const toggleReview = async (id = null) => {
    destinationId.value = id;
    showReviewPopup.value = !showReviewPopup.value;

    if (id && !reviewedDestinations.value.has(id)) {
        try {
            const response = await axios.get(`/user/can-review/${id}`);
            canReview.value = response.data.canReview; // Ensure `canReview` is a boolean
            reviewedDestinations.value.add(id); // Mark as fetched
        } catch (error) {
            console.error("Error fetching can-review:", error);
        }
    }
};
</script>

<style>
/* Optional custom styling */
</style>
