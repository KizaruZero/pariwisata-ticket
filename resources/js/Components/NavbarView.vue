<template>
    <nav class="bg-blue-600 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo -->
            <Link :href="route('home')" class="text-white text-2xl font-bold">
                EventTickets
            </Link>

            <!-- Desktop Navigation Links -->
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

            <!-- Auth Links for Desktop -->
            <div class="hidden md:flex space-x-4">
                <div v-if="!user">
                    <!-- Guest links: Login / Register -->
                    <Link
                        :href="route('login')"
                        class="text-white px-4 py-2 hover:bg-blue-500 rounded"
                    >
                        Login
                    </Link>
                    <Link
                        :href="route('register')"
                        class="text-white px-4 py-2 hover:bg-blue-500 rounded"
                    >
                        Register
                    </Link>
                </div>
                <div v-else>
                    <!-- Authenticated user links: Profile / Logout -->
                    <Link
                        :href="route('profile.edit')"
                        class="text-white px-4 py-2 hover:bg-blue-500 rounded"
                    >
                        Profile
                    </Link>
                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="text-white px-4 py-2 hover:bg-blue-500 rounded"
                    >
                        Log Out
                    </Link>
                </div>
            </div>

            <!-- Hamburger Menu for Mobile -->
            <div class="md:hidden relative">
                <button @click="toggleMobileMenu" class="text-white">
                    <!-- Hamburger Icon -->
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7"
                        />
                    </svg>
                </button>

                <!-- Mobile Dropdown Menu -->
                <div
                    v-if="mobileMenuOpen"
                    class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg"
                >
                    <NavLink
                        :href="route('destinations')"
                        :active="route().current('destinations')"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                    >
                        Destination
                    </NavLink>
                    <NavLink
                        :href="route('about')"
                        :active="route().current('about')"
                        class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                    >
                        About
                    </NavLink>
                    <div v-if="!user">
                        <!-- Guest links: Login / Register -->
                        <Link
                            :href="route('login')"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                        >
                            Login
                        </Link>
                        <Link
                            :href="route('register')"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                        >
                            Register
                        </Link>
                    </div>
                    <div v-else>
                        <!-- Authenticated user links: Profile / Logout -->
                        <Link
                            :href="route('profile.edit')"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                        >
                            Profile
                        </Link>
                        <Link
                            :href="route('logout')"
                            method="post"
                            as="button"
                            class="block px-4 py-2 text-gray-800 hover:bg-gray-100"
                        >
                            Log Out
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</template>

<script>
import { ref } from "vue";
import { Link, usePage } from "@inertiajs/vue3";
import NavLink from "./NavLink.vue";

export default {
    components: {
        Link,
        NavLink,
    },
    setup() {
        const mobileMenuOpen = ref(false);
        const { props } = usePage();
        const user = props.auth.user;

        const toggleMobileMenu = () => {
            mobileMenuOpen.value = !mobileMenuOpen.value;
        };

        return {
            mobileMenuOpen,
            toggleMobileMenu,
            user,
        };
    },
};
</script>
