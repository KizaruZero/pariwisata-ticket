<template>
    <GuestLayout>
        <div class="flex items-center justify-center min-h-screen bg-blue-100">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-blue-900">
                    Welcome to DestinationView
                </h1>
                <p class="mt-4 text-lg text-blue-600">
                    This is a simple Vue component for the destination page.
                </p>
                <DestinationCard />
            </div>
        </div>
    </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import DestinationCard from "@/Frontend Components/DestinationCard.vue";

export default {
    name: "DestinationView",
    components: {
        GuestLayout,
        DestinationCard,
    },
};
</script>

<style scoped>
/* Add any additional scoped styles here */
</style>
