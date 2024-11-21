<template>
    <GuestLayout>
        <div class=" font-thin tracking-wide">
            <!-- Hero Section -->
            <section class="relative ">
                <!-- Main Image Section -->
                <img
                    :src="images[0].src"
                    alt="Scenic view of a coastline"
                    class="w-screen h-screen object-cover z-0 my-auto"
                />
                
                <!-- Text and Button Section -->
                <div class="absolute -top-20 left-[120px] h-full flex flex-col justify-center  text-white leading-[115.49px]">
                    <h2 class="text-8xl italic font-semibold font-plex">Plan Your</h2>
                    <h2 class="text-8xl italic font-semibold font-plex">Perfect Trip</h2>
                    
                    <NavLink 
                        class="mt-6 w-max px-6 py-2 bg-teal-500 rounded-xl text-lg opacity-100 text-opacity-100 hover:opacity-50"
                        :href="route('destinations')"
                        :active="route().current('destinations')"
                    >
                        <div class="text-lg hover:text-opacity-10 z-40"> Go Explore > </div> 
                    </NavLink>
                </div>

                <!-- Curved Section -->
                 <section class="absolute bottom-0 w-full h-[130px] bg-vaga">
                    <img 
                    src="../../assets/Vector 5.png"
                    class="-mt-[95px] w-full"
                    >
                    <div class="h-full flex items-center -mt-[57px] justify-center  font-montseratt italic text-white text-3xl">
                        <h1>Elevate Your Travel</h1>
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
                <div v-else-if="recommendeds.length === 0">No recommended destinations found.</div>
                    <Carousel v-bind="config" v-if="recommendeds.length > 0"  >
                        <Slide v-for="destination in recommendeds" :key="destination.id " >
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
                        <h3 class="mr-2 ">SEE MORE</h3>
                        <img src="../../assets/logo/SearchLogo.png">
                    </NavLink>
                    <div class="h-[150px]"></div>
                    <section class="absolute bottom-0 w-full h-[150px] bg-bond rounded-tl-[70%] rounded-tr-[70%]">
                    <div class="h-full flex items-center  justify-center italic text-white text-3xl">
                        <h1>Find Interesting Articles</h1>
                    </div>
                </section>  
            </section>

            <!-- Article Section -->
             
            <div class="bg-bond text-center py-2 " id="app">
                <div v-if="loading">
                    <div
                    class="animate-spin rounded-full h-32 w-32 border-t-2 border-b-2 border-gray-900 mx-auto my-auto"
                    ></div>
                </div>
                <div class="grid grid-cols-3 items-center justify-center">
                    <ArticleBox 
                    v-for="article in articles.slice(0, 3)" 
                    :key="article.id" 
                    :article="article"
                    class="ml-5 mr-5"></ArticleBox>
                </div>
                <NavLink 
                :href="route('destinations')"
                :active="route().current('destinations')"
                class="flex flex-row w-full justify-center items-center pb-10 pt-5 text-cream text-[18px] hover:text-white hover:opacity-90 transition-transform transform hover:scale-105"
                    >
                    <h3 class="mr-2">READ MORE</h3>
                    <img src="../../assets/logo/SearchLogo.png">
                </NavLink>          
            </div>

            <!-- Features Section -->
            <div class="bg-vaga text-center" id="app">
            <section data-layername="whyShould" class="flex overflow-hidden flex-col items-center pb-20 bg-vaga">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/0a392959f908f38db0ecebb27d8bd58ced788c72dda83dc640bbae3f426b39e8?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="Decorative background image" class="object-contain z-10 self-stretch w-full aspect-[15.15] max-md:max-w-full" />
                <h2 data-layername="whyShouldChooseUs" class="-mt-4 text-4xl font-semibold leading-tight text-center text-stone-50 max-md:max-w-full">
                Why Should Choose Us?
                </h2>
                <div class="flex flex-wrap gap-12 items-center pr-5 pl-2.5 mt-12 w-full text-black max-w-[1317px] max-md:mt-10 max-md:max-w-full">
                    <article data-layername="userFriendlyInterface" class="flex flex-wrap grow shrink gap-4 items-start self-stretch my-auto min-w-[240px] w-[444px] max-md:max-w-full">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/2ea07a98de67556211deb19c7c72c4d7535502c2fb65fa9e435279bd6edeb6ef?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="User-friendly interface icon" class="object-contain shrink-0 aspect-[0.91] w-[93px]" />
                        <div class="flex flex-col grow shrink justify-center min-w-[240px] w-[439px] max-md:max-w-full">
                        <h3 data-layername="userFriendlyInterface" class="text-3xl font-semibold leading-tight max-md:max-w-full">
                            User-Friendly Interface
                        </h3>
                        <p data-layername="ourPlatformIsDesignedWithSimplicityAndUsabilityInMindMakingItEasyForAnyoneToSearchBookAndManageTheirTravelTickets" class="text-xl font-medium leading-6 max-md:max-w-full">
                            Our platform is designed with simplicity and usability in mind, making it easy for anyone to search, book, and manage their travel tickets.
                        </p>
                        </div>
                    </article>
                    <article data-layername="trustworthyReputable" class="flex grow shrink gap-4 items-start self-stretch my-auto min-w-[240px] w-[444px] max-md:max-w-full">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/d9c3e9059d44bf8037141ebcdbadd520317e02707769bebc212e52f5bd60c656?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="Trustworthy and reputable icon" class="object-contain shrink-0 aspect-square w-[97px]" />
                        <div class="flex flex-col justify-center min-w-[240px] w-[456px] max-md:max-w-full">
                        <h3 data-layername="trustworthyReputable" class="text-3xl font-semibold leading-tight max-md:max-w-full">
                            Trustworthy & Reputable
                        </h3>
                        <p data-layername="weHaveEstablishedAStrongReputationInTheIndustryForProvidingReliableAndHighQualityServiceToTravelersAcrossTheCountry" class="text-xl font-medium leading-6 max-md:max-w-full">
                            We have established a strong reputation in the industry for providing reliable and high-quality service to travelers across the country.
                        </p>
                        </div>
                    </article>
                    <article data-layername="securePaymentSystem" class="flex grow shrink gap-4 items-start self-stretch my-auto min-w-[240px] w-[444px] max-md:max-w-full">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/b0932222950a0ed7b6345aedf4ef29309a0eda7b46f04395de30d2ffd16eca2a?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="Secure payment system icon" class="object-contain shrink-0 aspect-square w-[97px]" />
                        <div class="flex flex-col justify-center min-w-[240px] w-[456px] max-md:max-w-full">
                        <h3 data-layername="securePaymentSystem" class="text-3xl font-semibold leading-tight max-md:max-w-full">
                            Secure Payment System
                        </h3>
                        <p data-layername="ourPlatformUtilizesAdvancedSecurityMeasuresToEnsureThatYourTransactionsAreSafeAndYourPersonalDataIsProtected" class="text-xl font-medium leading-6 max-md:max-w-full">
                            Our platform utilizes advanced security measures to ensure that your transactions are safe and your personal data is protected.
                        </p>
                        </div>
                    </article>
                    <article data-layername="247CustomerSupport" class="flex flex-wrap grow shrink gap-4 items-start self-stretch my-auto min-w-[240px] w-[500px] max-md:max-w-full">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/e27632703d67b99218a6f90694aa18dce8b3b2a6ce468a2e7a48e0cba4cc6528?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="24/7 Customer support icon" class="object-contain shrink-0 aspect-square w-[102px]" />
                        <div class="flex flex-col justify-center min-w-[240px] w-[456px] max-md:max-w-full">
                        <h3 data-layername="247CustomerSupport" class="text-3xl font-semibold leading-tight max-md:max-w-full">
                            24/7 Customer Support
                        </h3>
                        <p data-layername="ourDedicatedCustomerSupportTeamIsAvailableAroundTheClockToAssistYouWithAnyIssuesOrInquiriesEnsuringASmoothTravelExperience" class="text-xl font-medium leading-6 max-md:max-w-full">
                            Our dedicated customer support team is available around the clock to assist you with any issues or inquiries, ensuring a smooth travel experience.
                        </p>
                        </div>
                    </article>
                </div>
            </section>
            </div>
            
        </div>
    </GuestLayout>
    </template>


<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import NavLink from '@/Components/NavLink.vue';
import DestinationCard from '@/Frontend Components/DestinationCard.vue';
import 'vue3-carousel/dist/carousel.css';
import { Carousel, Slide, Navigation } from 'vue3-carousel';
import ArticleBox from '@/Frontend Components/ArticleBox.vue';

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
    const response = await axios.get('/api/destination/recomendation');
    recommendeds.value = response.data || []; // Ensure recommendeds is always an array
  } catch (error) {
    console.error('Error fetching recommended destinations:', error);
    errorMessage.value = `Failed to fetch data: ${error.response?.status} ${error.response?.statusText || error.message}`;
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

    .carousel__slide {
   padding: 8px;/* Adjust padding as needed */
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
  transform:rotateY(-10deg) scale(0.8);
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
