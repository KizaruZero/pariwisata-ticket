<template>
    <GuestLayout>
        <div class="">
            <!-- Header Section -->
            <section class="relative ">
                <!-- Main Image Section -->
                <img
                    :src="images[0].src"
                    alt="Scenic view of a coastline"
                    class="w-screen h-[680px] object-cover z-0"
                />
                
                <!-- Text and Button Section -->
                <div class="absolute -top-20 left-[120px] h-full flex flex-col justify-center text-white">
                    <h2 class="text-6xl font-bold">Plan Your</h2>
                    <h2 class="text-6xl font-bold">Perfect Trip</h2>
                    
                    <NavLink 
                        class="mt-4 w-max px-6 py-2 bg-teal-500 rounded-xl text-lg opacity-100 text-opacity-100 hover:opacity-50"
                        :href="route('destinations')"
                        :active="route().current('destinations')"
                    >
                        <div class="text-lg hover:text-opacity-10 z-40"> Go Explore > </div> 
                </NavLink>
                </div>

                <!-- Curved Section -->
                <section class="absolute bottom-0 w-full h-[150px] bg-vaga opacity-100 z-50 rounded-tl-[50%] rounded-tr-[50%]">
                    <div class="h-full flex items-center justify-center italic text-white text-2xl">
                        <h1>Elevate Your Travel</h1>
                    </div>
                </section>
            </section>
            <div class="bg-vaga text-center py-4" id="app">
                <!-- Features Section -->
                <div
                    class="flex flex-wrap justify-center gap-8 mb-16 animate-fadeIn"
                >
                    <div
                        class="glass-effect shadow-lg rounded-lg p-6 w-64 transform transition duration-300 hover:scale-105 hover:shadow-2xl"
                    >
                        <i class="fas fa-globe text-4xl text-black mb-4"></i>
                        <h2 class="text-xl font-semibold mb-2">
                            Lot Of Choices
                        </h2>
                        <p class="text-gray-500 mb-4">
                            500+ Destinations we work with
                        </p>
                        <a
                            class="text-red-500 font-medium hover:underline"
                            href="#"
                            >Read more</a
                        >
                    </div>

                    <div
                        class="glass-effect shadow-lg rounded-lg p-6 w-64 transform transition duration-300 hover:scale-105 hover:shadow-2xl"
                    >
                        <i class="fas fa-user-tie text-4xl text-black mb-4"></i>
                        <h2 class="text-xl font-semibold mb-2">
                            Best Tour Guide
                        </h2>
                        <p class="text-gray-500 mb-4">
                            Guides with 10+ years of experience
                        </p>
                        <a
                            class="text-red-500 font-medium hover:underline"
                            href="#"
                            >Read more</a
                        >
                    </div>

                    <div
                        class="glass-effect shadow-lg rounded-lg p-6 w-64 transform transition duration-300 hover:scale-105 hover:shadow-2xl"
                    >
                        <i
                            class="fas fa-calendar-check text-4xl text-black mb-4"
                        ></i>
                        <h2 class="text-xl font-semibold mb-2">Easy Booking</h2>
                        <p class="text-gray-500 mb-4">
                            Fast ticket purchase process
                        </p>
                        <a
                            class="text-red-500 font-medium hover:underline"
                            href="#"
                            >Read more</a
                        >
                    </div>
                </div>

                <!-- Image with Play Button -->
            </div>

            <div class="bg-[#34383D] text-center py-2 rounded-tl-[40%] rounded-tr-[40%]" id="app">
                <!--ji-->
                <div class="h-full flex items-center justify-center italic text-white my-12 text-2xl">
                        <h1>Find Interesting Articles</h1>
                    </div>
                <!-- Features Section -->
                <div
                    class="flex flex-wrap justify-center gap-8 mb-12 animate-fadeIn"
                >
                    <div
                        class="glass-effect shadow-lg rounded-lg p-6 w-64 transform transition duration-300 hover:scale-105 hover:shadow-2xl"
                    >
                        <i class="fas fa-globe text-4xl text-black mb-4"></i>
                        <h2 class="text-xl font-semibold mb-2">
                            Lot Of Choices
                        </h2>
                        <p class="text-gray-500 mb-4">
                            500+ Destinations we work with
                        </p>
                        <a
                            class="text-red-500 font-medium hover:underline"
                            href="#"
                            >Read more</a
                        >
                    </div>

                    <div
                        class="glass-effect shadow-lg rounded-lg p-6 w-64 transform transition duration-300 hover:scale-105 hover:shadow-2xl"
                    >
                        <i class="fas fa-user-tie text-4xl text-black mb-4"></i>
                        <h2 class="text-xl font-semibold mb-2">
                            Best Tour Guide
                        </h2>
                        <p class="text-gray-500 mb-4">
                            Guides with 10+ years of experience
                        </p>
                        <a
                            class="text-red-500 font-medium hover:underline"
                            href="#"
                            >Read more</a
                        >
                    </div>

                    <div
                        class="glass-effect shadow-lg rounded-lg p-6 w-64 transform transition duration-300 hover:scale-105 hover:shadow-2xl"
                    >
                        <i
                            class="fas fa-calendar-check text-4xl text-black mb-4"
                        ></i>
                        <h2 class="text-xl font-semibold mb-2">Easy Booking</h2>
                        <p class="text-gray-500 mb-4">
                            Fast ticket purchase process
                        </p>
                        <a
                            class="text-red-500 font-medium hover:underline"
                            href="#"
                            >Read more</a
                        >
                    </div>
                </div>

                <!-- Image with Play Button -->
            </div>
            <!-- Search and Journey Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div class="relative group">
                    <img
                        src="https://storage.googleapis.com/Asleep-Oz-mtbff.jpg"
                        alt="Person exploring a beach"
                        class="w-full h-full object-cover rounded-lg transition-all transform group-hover:scale-105"
                    />
                    <div
                        class="absolute bottom-4 left-4 text-white w-full px-4"
                    >
                        <div class="flex items-center space-x-4 mb-4">
                            <input
                                class="bg-gray-800 bg-opacity-50 text-white p-2 rounded-lg"
                                type="date"
                                placeholder="Travel Date"
                            />
                            <input
                                class="bg-gray-800 bg-opacity-50 text-white p-2 rounded-lg"
                                placeholder="Budget"
                                type="text"
                            />
                            <input
                                class="bg-gray-800 bg-opacity-50 text-white p-2 rounded-lg"
                                placeholder="Guest"
                                type="number"
                            />
                            <button
                                class="bg-blue-500 p-2 rounded-lg transition-all hover:bg-blue-600"
                            >
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <p>
                            Embark on a journey to find your dream destination,
                            creating unforgettable memories along the way.
                        </p>
                    </div>
                </div>

                <!-- How It Works Section -->
                <div>
                    <h2
                        class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6"
                    >
                        How it works
                    </h2>
                    <h3
                        class="text-4xl font-bold text-gray-900 dark:text-gray-100 mb-6"
                    >
                        One click for you
                    </h3>
                    <div class="space-y-6">
                        <div
                            v-for="(step, index) in steps"
                            :key="index"
                            class="flex items-start space-x-4"
                        >
                            <div class="bg-gray-200 p-3 rounded-lg">
                                <i :class="step.icon" class="text-blue-500"></i>
                            </div>
                            <div>
                                <h4
                                    class="text-xl font-bold text-gray-900 dark:text-gray-100"
                                >
                                    {{ step.title }}
                                </h4>
                                <p class="text-gray-500 dark:text-gray-400">
                                    {{ step.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-8">
                <section class="text-center mb-16">
                    <h2 class="text-blue-600 text-lg">Tour packages</h2>
                    <h1 class="text-4xl font-bold mb-2">
                        Our tourist destination
                    </h1>
                    <p class="text-gray-500">
                        Our tourist destinations offer an unrivaled blend of
                        natural beauty and cultural richness
                    </p>
                </section>
                <section class="flex justify-center space-x-6 mb-16">
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden w-80"
                    >
                        <img
                            alt="Image of Bali Tour Package"
                            class="w-full h-48 object-cover"
                            src="https://storage.googleapis.com/a1aa/image/V6RUvqW0PP6sAlRnCrOOmfBZBs7yAldEAKDinf5ylm944WjTA.jpg"
                        />
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span
                                    class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded"
                                    >7 Days</span
                                >
                                <span class="text-yellow-500">
                                    <i class="fas fa-star"></i> 4.9
                                </span>
                            </div>
                            <h3 class="text-lg font-bold mb-1">
                                Bali Tour Package
                            </h3>
                            <p class="text-gray-500 text-sm mb-2">
                                23 August - 29 August
                            </p>
                            <p class="text-xl font-bold">$285</p>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden w-80"
                    >
                        <img
                            alt="Image of Java Tour Package"
                            class="w-full h-48 object-cover"
                            src="https://storage.googleapis.com/a1aa/image/eih0gKhMBw2KOC6erYfb22NubyiDjnJh3HoXonzhbSkvxtGnA.jpg"
                        />
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span
                                    class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded"
                                    >5 Days</span
                                >
                                <span class="text-yellow-500">
                                    <i class="fas fa-star"></i> 4.9
                                </span>
                            </div>
                            <h3 class="text-lg font-bold mb-1">
                                Java Tour Package
                            </h3>
                            <p class="text-gray-500 text-sm mb-2">
                                23 August - 27 August
                            </p>
                            <p class="text-xl font-bold">$218</p>
                        </div>
                    </div>
                    <div
                        class="bg-white rounded-lg shadow-lg overflow-hidden w-80"
                    >
                        <img
                            alt="Image of Solo Tour Package"
                            class="w-full h-48 object-cover"
                            src="https://storage.googleapis.com/a1aa/image/5USQndGyrR4ZENQO5xtO0kePGl6PVXRIBgMMIrudesz24WjTA.jpg"
                        />
                        <div class="p-4">
                            <div class="flex justify-between items-center mb-2">
                                <span
                                    class="bg-gray-200 text-gray-700 text-xs px-2 py-1 rounded"
                                    >3 Days</span
                                >
                                <span class="text-yellow-500">
                                    <i class="fas fa-star"></i> 4.9
                                </span>
                            </div>
                            <h3 class="text-lg font-bold mb-1">
                                Solo Tour Package
                            </h3>
                            <p class="text-gray-500 text-sm mb-2">
                                23 August - 25 August
                            </p>
                            <p class="text-xl font-bold">$163</p>
                        </div>
                    </div>
                </section>
                <div class="text-center mb-16">
                    <button class="bg-black text-white px-6 py-2 rounded-full">
                        View more
                    </button>
                </div>
                <section class="flex justify-center items-center mb-16">
                    <div class="flex items-center space-x-4">
                        <img
                            alt="Image of Donald Sullivan"
                            class="w-16 h-16 rounded-full"
                            src="https://storage.googleapis.com/a1aa/image/Ot42zhBfjYxJPq6gjDQM8SnZUESZSASyfymrYKvqGxA04WjTA.jpg"
                        />
                        <div>
                            <h4 class="font-bold">Donald Sullivan</h4>
                            <p class="text-gray-500">Founder Fiko</p>
                        </div>
                    </div>
                    <div class="ml-8">
                        <p class="text-gray-700 italic">
                            "This travel website is very informative and easy to
                            use. I like how they present various destination
                            options and travel packages with clear details.
                            Offering pictures and destination descriptions helps
                            me decide where I want to visit. Additionally, the
                            ability to compare prices and reviews from other
                            users is very helpful in decision making."
                        </p>
                    </div>
                </section>
                <section class="text-center mb-16">
                    <h2 class="text-blue-600 text-lg">Our Blog</h2>
                    <h1 class="text-4xl font-bold mb-8">Our travel memories</h1>
                    <div class="flex justify-center space-x-6">
                        <div
                            class="bg-white rounded-lg shadow-lg overflow-hidden w-96"
                        >
                            <img
                                alt="Image of 2023 Travel Trends"
                                class="w-full h-48 object-cover"
                                src="https://storage.googleapis.com/a1aa/image/w5ndBZINfoTkeEJt9j8c4rBpplwbyeT7fse10gaOTxJMG3acC.jpg"
                            />
                            <div class="p-4">
                                <p class="text-gray-500 text-sm mb-2">
                                    Nov 14, 2022
                                </p>
                                <h3 class="text-lg font-bold mb-2">
                                    2023 Travel Trends – what you need to know
                                </h3>
                                <p class="text-gray-500 text-sm">
                                    2023 taught us valuable life lessons. Plans
                                    don't always work out, flexibility in life
                                    is key, and...
                                </p>
                            </div>
                        </div>
                        <div
                            class="bg-white rounded-lg shadow-lg overflow-hidden w-96"
                        >
                            <img
                                alt="Image of Jeep Adventure"
                                class="w-full h-48 object-cover"
                                src="https://storage.googleapis.com/a1aa/image/mzF5fYS4ITQ9NivOYRolrY87t8KfQYamnyNX1PHw5Fkz4WjTA.jpg"
                            />
                            <div class="p-4">
                                <p class="text-gray-500 text-sm mb-2">
                                    Nov 18, 2022
                                </p>
                                <h3 class="text-lg font-bold mb-2">
                                    Jeep Adventure is a new attraction for
                                    tourists visiting Garut
                                </h3>
                                <p class="text-gray-500 text-sm">
                                    Jeep Adventure is one of the tourist
                                    attractions that has been popular recently.
                                    The sensation...
                                </p>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="text-center">
                    <button class="bg-black text-white px-6 py-2 rounded-full">
                        View more
                    </button>
                </div>
            </div>
        </div>
    </GuestLayout>
    </template>

    <script>
    import GuestLayout from "@/Layouts/GuestLayout.vue";
    import NavLink from "@/Components/NavLink.vue";
    import { ref } from "vue";


    export default {
    name: "HomeView",
    components: {
        GuestLayout,
        NavLink,
    },
    
    setup() {
        const darkMode = ref(false);
        const images = ref([
            {
                src: "/images/home.png",
                alt: "Pantai, SCenery",
                title: "Bromo, East Java",
            },
            {
                src: "https://storage.googleapis.com/a1aa/image/o2scIMfFvKUmESJ9usC2B7cK42GcN7EemEaRIQG9uhc2wVjTA.jpg",
                alt: "Bromo, East Java",
                title: "Bromo, East Java",
                description: "Bromo Tengger Tour",
            },
            {
                src: "https://storage.googleapis.com/a1aa/image/MB7emEa209XELKKFU0MGkdQ7tZ73MgcFjve2AE8GN6lzwVjTA.jpg",
                alt: "Denpasar, Bali",
                title: "Denpasar, Bali",
                description: "Bali Beach Tourism",
            },
            {
                src: "https://storage.googleapis.com/a1aa/image/jve2as2MB7ema0193JK0MGkdQ2.jpg",
                alt: "Lampung, South Sumatra",
                title: "Lampung, South Sumatra",
                description: "Sumatra Tourism",
            },
            {
                src: "https://storage.googleapis.com/a1aa/image/1341DN7tB08.jpg",
                alt: "Jogjakarta, Central Java",
                title: "Jogjakarta, Central Java",
                description: "Borobudur Temple Tour",
            },
        ]);

        const steps = ref([
            {
                icon: "fas fa-search",
                title: "Find your destination",
                description:
                    "Embark on a journey to discover your dream destination.",
            },
            {
                icon: "fas fa-ticket-alt",
                title: "Book a ticket",
                description:
                    "Book tickets to your preferred destination easily.",
            },
            {
                icon: "fas fa-credit-card",
                title: "Make payment",
                description:
                    "Multiple payment options for hassle-free transactions.",
            },
            {
                icon: "fas fa-map-marker-alt",
                title: "Explore destination",
                description:
                    "Immerse yourself in captivating sights and sounds.",
            },
        ]);

        const toggleDarkMode = () => {
            darkMode.value = !darkMode.value;
            document.body.classList.toggle("dark", darkMode.value);
        };

        return {
            darkMode,
            images,
            steps,
            toggleDarkMode,
        };
    },
    };
    

    
    </script>

    <style>
    @keyframes fadeInDown {
    0% {
        opacity: 0;
        transform: translateY(-20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
    }

    @keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
    }

    .animate-fadeInDown {
    animation: fadeInDown 0.8s ease-out;
    }

    .animate-fadeIn {
    animation: fadeIn 1s ease-out;
    }

    /* Glass Effect */
    .glass-effect {
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    transition: background 0.3s, box-shadow 0.3s;
    }

    .glass-effect:hover {
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }
    </style>
