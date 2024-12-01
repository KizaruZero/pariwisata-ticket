<script setup>
import Navbar from "@/Components/NavbarView.vue";
import { Link } from "@inertiajs/inertia-vue3";
import FooterComponent from "@/Components/FooterComponent.vue";
defineProps({
  transparentNavbar: {
    type: Boolean,
    default: false,
  },
});
</script>

<template>
    <div class="min-h-screen bg-cream">
        <!-- Navbar -->
        <Navbar :transparent="transparentNavbar"/>

        <!-- Hero Section -->
        <!-- <div class="relative bg-cover bg-center h-screen">
            <div
                class="flex items-center justify-center h-full bg-black bg-opacity-50"
            >
                <div class="text-center text-white">
                    <h1 class="text-5xl font-bold">
                        Explore The Beauty of Nature
                    </h1>
                    <p class="mt-4 text-lg">
                        Discover the most amazing places in the world.
                    </p>
                    <Link
                        href="/destinations"
                        class="mt-6 inline-block bg-green-500 text-white px-6 py-3 rounded-full hover:bg-green-600"
                    >
                        Start Your Journey
                    </Link>
                </div>
            </div>
        </div> -->

        <!-- Content Section -->
        <div class="">
            <div class=" mx-auto">
                <slot></slot>
            </div>
        </div>

        <!-- Footer -->
        <FooterComponent/>
    </div>
</template>

<script>
import Navbar from "@/Components/NavbarView.vue";
import FooterComponent from "@/Components/FooterComponent.vue";

export default {
    components: {
        Navbar,
        Link,
        FooterComponent,
    },
};

</script>
