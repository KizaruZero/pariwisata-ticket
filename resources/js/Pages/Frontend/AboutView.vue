<template>
    <GuestLayout>
        <div class="flex items-center justify-center min-h-screen bg-gray-100">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-900">
                    Welcome to About
                </h1>
                <p class="mt-4 text-lg text-gray-600">
                    This is a simple Vue component styled with Tailwind CSS.
                </p>
            </div>
        </div>
    </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
export default {
    name: "AboutView",
    components: {
        GuestLayout,
    },
};
</script>

<style scoped>
/* Add any additional scoped styles here */
</style>
