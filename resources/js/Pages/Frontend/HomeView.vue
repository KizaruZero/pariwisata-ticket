<template>
    <GuestLayout>
        <div class="font-thin tracking-wide">
            <!-- Hero Section -->
            <section class="relative">
                <!-- Main Image Section -->
                <img
                    :src="heroImage"
                    alt="Scenic view of a coastline"
                    class="w-screen h-screen object-cover z-0 my-auto"
                    @load="imageLoaded = true"
                />

                <!-- Text and Button Section -->
                <div
                    v-if="imageLoaded"
                    class="absolute -top-20 left-[120px] h-full flex flex-col justify-center text-white leading-[115.49px]"
                >
                    <transition name="fade-up" appear>
                        <h2 class="text-8xl italic font-semibold font-plex">
                            Plan Your
                        </h2>
                    </transition>
                    <transition name="fade-up" appear>
                        <h2 class="text-8xl italic font-semibold font-plex">
                            Perfect Trip
                        </h2>
                    </transition>
                    <NavLink
                        class="mt-8 w-max flex items-center px-6 py-4 bg-teal-500 rounded-xl text-lg opacity-100 text-opacity-100 hover:opacity-80"
                        :href="route('destinations')"
                        :active="route().current('destinations')"
                    >
                        <span class="text-xl">Explore Now</span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 ml-2"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </NavLink>
                </div>

                <!-- Curved Section -->
                <section class="absolute bottom-0 w-full h-[130px] bg-vaga">
                    <img
                        src="../../assets/Vector 5.png"
                        class="-mt-[95px] w-full"
                    />
                    <div
                        class="h-full flex items-center -mt-[55px] justify-center font-montseratt text-white text-3xl"
                    >
                        <h1
                            class="font-semibold text-3xl tracking-wider font-plex hover:text-opacity-50"
                        >
                            DISCOVER YOUR DREAM DESTINATION
                        </h1>
                    </div>
                </section>
            </section>

            <!-- Features Section -->
            <!--
            <div class="bg-vaga text-center pb-4" id="app">
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
            </div>
            -->

            <!-- Recomended Destination -->
            <section class="bg-vaga pb-10 relative -mt-10" id="app">
                <div v-if="loading">
                    <div
                        class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900 mx-auto"
                    ></div>
                </div>
                <div v-else-if="errorMessage">{{ errorMessage }}</div>
                <div v-else-if="recommendeds.length === 0">
                    No recommended destinations found.
                </div>
                <Carousel v-bind="config" v-if="recommendeds.length > 0">
                    <Slide
                        v-for="destination in recommendeds"
                        :key="destination.id"
                    >
                        <DestinationCard :destination="destination" />
                    </Slide>
                    <template #addons>
                        <Navigation />
                    </template>
                </Carousel>
                <!-- See More Section -->
                <NavLink
                    :href="route('destinations')"
                    :active="route().current('destinations')"
                    class="flex flex-row w-full justify-center items-center pt-10 text-cream text-[18px] hover:text-white hover:opacity-90 transition-transform transform hover:scale-105 mb-4"
                >
                    <h3 class="mr-2">SEE MORE</h3>
                    <img src="../../assets/logo/SearchLogo.png" />
                </NavLink>
                <div class="h-[150px]"></div>
                <section class="absolute bottom-0 w-full h-[150px] bg-bond">
                    <img
                        loading="lazy"
                        src="../../assets/Vector 6.png"
                        alt="Decorative background image"
                        class="object-contain z-10 self-stretch w-full max-md:max-w-full"
                    />
                </section>
            </section>

            <!-- Article Section -->
            <div
                class="h-full px-36 pt-20 pb-10 flex gap-x-48 bg-bond justify-center text-white text-3xl z-50 -mt-9"
            >
                <div class="judul w-1/2">
                    <h1
                        class="text-4xl font-medium tracking-wider decoration-wav font-montseratt max-w-md"
                    >
                        Blog About Our Travel Destinations
                    </h1>
                </div>
                <div class="deskripsi w-1/2">
                    <p class="text-base font-extralight">
                        Discover the breathtaking charm of Indonesia, the
                        largest archipelago in the world. From the pristine
                        beaches of Bali and the rich cultural heritage of
                        Yogyakarta to the majestic Komodo Island and the
                        stunning underwater paradise of Raja Ampat, our blog
                        takes you on a journey through Indonesia's most iconic
                        and hidden gems.
                    </p>
                    <!-- button -->
                    <NavLink
                        class="mt-8 w-max flex items-center px-6 py-3 bg-teal-500 rounded-xl text-lg opacity-100 text-opacity-100 hover:opacity-80"
                        :href="route('article')"
                        :active="route().current('article')"
                    >
                        <span class="text-xl">Read Now</span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 ml-2"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </NavLink>
                </div>
            </div>
            <div class="bg-bond text-center py-2 px-32" id="app">
                <div v-if="loading">
                    <div
                        class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900 mx-auto my-auto"
                    ></div>
                </div>
                <div
                    class="grid grid-cols-1 md:grid-cols-3 items-center justify-center"
                >
                    <ArticleBox
                        v-for="article in articles(0, 3)"
                        :key="article.id"
                        :article="article"
                        class="ml-5 mr-5 md:my-4"
                    ></ArticleBox>
                </div>
            </div>

            <!-- Features Section/Why Should Choose Us -->
            <div class="" id="app">
                <section
                    class="flex overflow-hidden flex-col items-center mx-auto bg-bond font-montseratt"
                >
                    <div class="bg-bond">
                        <div class="flex flex-col mx-32">
                            <div class="flex flex-row pt-12 pb-28">
                                <div class="relative flex w-2/5 max-w-fit mr-4">
                                    <!-- Image -->
                                    <img
                                        src="../../assets/jeremy-bishop-QUwLZNchflk-unsplash.jpg"
                                        alt="Tangkuban Perahu"
                                        class="rounded-tr-2xl rounded-br-2xl object-cover"
                                    />

                                    <!-- Black Overlay -->
                                    <div
                                        class="absolute inset-0 w-full bg-black bg-opacity-30 rounded-tr-2xl rounded-br-2xl"
                                    ></div>
                                </div>
                                <div
                                    class="flex flex-col w-3/5 text-4xl font-serif font-bold leading-tight px-6 pr-20 mt-2"
                                >
                                    <div
                                        class="flex text-lg text-gray-200 pb-1 -ml-0.5"
                                    >
                                        Greetings
                                    </div>
                                    <div class="pb-4">
                                        <span class="text-vaga"
                                            >Vagabond invites you to explore the
                                            world</span
                                        >
                                        <span class="text-cream">
                                            while preserving its culture and
                                            natural beauty for future
                                            generations</span
                                        >
                                    </div>
                                    <div
                                        class="flex text-lg text-white pb-2 text-justify font"
                                    >
                                        Vagabond memperkenalkan perjalanan yang
                                        mendalam dan bermakna. Melalui inovasi,
                                        kami berkomitmen untuk melestarikan
                                        keindahan budaya dan alam di destinasi
                                        yang kami tawarkan, sekaligus
                                        meningkatkan kualitas pengalaman
                                        perjalanan Anda.
                                    </div>
                                    <Link
                                        :href="route('about')"
                                        class="flex p-1 bg-transparent justify-center border-vaga mt-6 border-2 w-1/4 text-lg hover:opacity-40 text-white rounded-full transition duration-200 transform hover:scale-105"
                                    >
                                        <p class="flex">More About us</p>
                                    </Link>
                                </div>
                            </div>
                        </div>
                        <section class="bottom-0 w-full h-[150px] bg-bond">
                            <img
                                loading="lazy"
                                src="../../assets/Vector 5.png"
                                alt="Decorative background image"
                                class="object-contain translate-y-8 xl:translate-y-14 lg :translate-y-16 md:translate-y-24 z-10 self-stretch w-full max-md:max-w-full"
                            />
                        </section>
                    </div>
                </section>
            </div>

            <!-- Another Call Section -->
            <div class="bg-vaga pt-20">
                <div class="mx-32">
                    <WhyUsSection />
                </div>
            </div>

            <!-- Enjoy -->
            <div class="bg-vaga pt-20">
                <div class="mx-32">
                    <EnjoyTravel />
                </div>
            </div>
            <div class="bg-vaga">
                <div class="mx-32 pt-8">
                    <GallerySection />
                </div>
            </div>
            <div class="bg-vaga">
                <div class="mx-32">
                    <HowItWorks />
                </div>
            </div>
            <div class="bg-vaga">
                <div class="mx-32 py-20">
                    <ClosingSection />
                </div>
            </div>
        </div>
    </GuestLayout>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import NavLink from "@/Components/NavLink.vue";
import DestinationCard from "@/Frontend Components/DestinationCard.vue";
import "vue3-carousel/dist/carousel.css";
import { Carousel, Slide, Navigation } from "vue3-carousel";
import ArticleBox from "@/Frontend Components/ArticleBox.vue";
import heroImage from "@/assets/home.png";
import { Link } from "@inertiajs/inertia-vue3";
import HowItWorks from "@/Frontend Components/HowItWorks.vue";
import WhyUsSection from "@/Frontend Components/WhyUsSection.vue";
import ClosingSection from "@/Frontend Components/ClosingSection.vue";
import EnjoyTravel from "@/Frontend Components/EnjoyTravel.vue";
import GallerySection from "@/Frontend Components/GallerySection.vue";

const config = {
    itemsToShow: 3.5,
    wrapAround: true,
    transition: 500,
};
// Reactive references
const recommendeds = ref([]);
const loading = ref(false);
const errorMessage = ref(null);
const articles = ref([]);
const imageLoaded = ref(false);

const fetchArticles = async () => {
    try {
        const response = await axios.get("/api/articles/latest");
        articles.value = response.data;
    } catch (error) {
        console.error("Error fetching articles:", error);
    }
};

// Fetch recommended destinations
const fetchRecommendedDestinations = async () => {
    loading.value = true;
    errorMessage.value = null; // Reset error message before request
    try {
        const response = await axios.get("/api/destination/recomendation");
        recommendeds.value = response.data || []; // Ensure recommendeds is always an array
    } catch (error) {
        console.error("Error fetching recommended destinations:", error);
        errorMessage.value = `Failed to fetch data: ${error.response?.status} ${
            error.response?.statusText || error.message
        }`;
        recommendeds.value = []; // Default to empty array on error
    } finally {
        loading.value = false;
    }
};

// Fetch data on mounted
onMounted(() => {
    fetchRecommendedDestinations();
    fetchArticles();
});

// Sample data for other sections (if relevant)
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
        description: "Embark on a journey to discover your dream destination.",
    },
    {
        icon: "fas fa-ticket-alt",
        title: "Book a ticket",
        description: "Book tickets to your preferred destination easily.",
    },
    {
        icon: "fas fa-credit-card",
        title: "Make payment",
        description: "Multiple payment options for hassle-free transactions.",
    },
    {
        icon: "fas fa-map-marker-alt",
        title: "Explore destination",
        description: "Immerse yourself in captivating sights and sounds.",
    },
]);

const toggleDarkMode = () => {
    darkMode.value = !darkMode.value;
    document.body.classList.toggle("dark", darkMode.value);
};
</script>

<style>
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(40px); /* Adjust for the slide distance */
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Transition classes for Vue */
.fade-up-enter-active,
.fade-up-appear-active {
    animation: fadeUp 1.2s ease-out; /* Duration and easing */
}

.fade-up-enter-from,
.fade-up-appear-from {
    opacity: 0;
    transform: translateY(40px);
}

.fade-up-enter-to,
.fade-up-appear-to {
    opacity: 1;
    transform: translateY(0);
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

.carousel__slide {
    padding: 8px; /* Adjust padding as needed */
}

.carousel__viewport {
    perspective: 1920px;
}

.carousel__track {
    transform-style: preserve-3d;
}

.carousel__slide--sliding {
    transition: 1s;
}

.carousel__slide {
    opacity: 0.8;
    transform: rotateY(-10deg) scale(0.8);
}

.carousel__slide--active ~ .carousel__slide {
    opacity: 0.8;
    transform: rotateY(10deg) scale(0.8);
}

.carousel__slide--prev {
    opacity: 0.9;
    transform: rotateY(-5deg) scale(0.95);
}

.carousel__slide.carousel__slide--next {
    opacity: 0.9;
    transform: rotateY(5deg) scale(0.95);
}

.carousel__slide--active {
    opacity: 1;
    transform: rotateY(0) scale(1);
}
</style>
