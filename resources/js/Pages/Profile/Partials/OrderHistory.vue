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
                        'bg-red-500': order.status === 'cancelled'
                    }"
                >
                    <h2 class="text-white text-lg font-semibold">
                        Order #{{ order.id }}
                    </h2>
                    <div class="">
                        <p class="text-lg font-semibold text-white">Date:
                            {{
                                formatDate(order.booking_date)
                            }}
                        </p>
                    </div>
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
                    class="p-4"
                    :class="{
                        'bg-green-500': order.status === 'approved',
                        'bg-yellow-500': order.status === 'pending',
                        'bg-red-500': order.status === 'cancelled'
                    }"
                >
                    <button
                        class="w-full text-white py-2 rounded-lg hover:opacity-75 transition"
                    >
                        <p class="text-white text-lg">
                            Status:
                            <span class="font-bold">{{ order.status }}</span>
                        </p>
                    </button>
                </div>
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
import { ref, onMounted } from "vue";
import axios from "axios";

// State management
const orders = ref([]);
const loading = ref(true);

// Fetch order data on component mount
onMounted(async () => {
    try {
        const response = await axios.get("api/orders/history");
        orders.value = response.data.orders;
    } catch (error) {
        console.error("Error fetching order history:", error);
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
</script>

<style>
/* Optional custom styling */
</style>
