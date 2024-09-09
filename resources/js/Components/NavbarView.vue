<!-- Navbar.vue -->
<template>
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <Link :href="route('home')" class="text-white text-2xl font-bold">
                EventTickets
            </Link>

            <!-- Navigation Links -->
            <div class="hidden md:flex space-x-4">
                <NavLink
                    :href="route('destinations')"
                    :active="route().current('destinations')"
                >
                    Destination
                </NavLink>
                <NavLink
                    :href="route('about')"
                    :active="route().current('about')"
                >
                    About
                </NavLink>
            </div>
        </div>
    </nav>
</template>

<script>
import { ref } from "vue";
import { Link } from "@inertiajs/inertia-vue3";
import NavLink from "./NavLink.vue";

export default {
    components: {
        Link,
        NavLink,
    },
    setup() {
        const mobileMenuOpen = ref(false);

        const toggleMobileMenu = () => {
            mobileMenuOpen.value = !mobileMenuOpen.value;
        };

        return {
            mobileMenuOpen,
            toggleMobileMenu,
        };
    },
};
</script>
