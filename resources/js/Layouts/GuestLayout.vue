<script setup>
import Navbar from "@/Components/NavbarView.vue";
import { Link } from "@inertiajs/inertia-vue3";
import FooterComponent from "@/Components/FooterComponent.vue";
</script>

<template>
    <div class="min-h-screen bg-cream">
        <!-- Navbar -->
        <Navbar />
        <!-- Content Section -->
        <div class="">
            <div class="mx-auto">
                <slot></slot>
            </div>
        </div>
        <!-- Footer -->
        <FooterComponent />
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
