<template>
    <div>
        <div v-if="favoriteDestination.length" class="my-4">
            <h2 class="text-xl font-semibold my-4">Favorite Destination</h2>
            <!-- <div
                v-for="destination in favoriteDestination"
                :key="destination.id"
            >
            
                <h3 class="text-lg font-bold">{{ destination.name }}</h3>
                <p>{{ destination.location }}</p>
                <p>Rating: {{ destination.rating }} / 5</p>
                <NavLink
                    :href="`/destination/${destination.id}`"
                    class="mt-2 btn-primary"
                >
                    View Details
                </NavLink>
            </div> -->
            <div class="grid grid-cols-3">
                <DestinationCard
                        v-for="destination in favoriteDestination"
                        :key="destination.id"
                        :destination="destination"
                        class=" mx-auto m-2 scale-90 "
                    />

            </div>
            
        </div>
    </div>
</template>

<script setup>
import axios from "axios";
import { ref, onMounted } from "vue";
import NavLink from "../Components/NavLink.vue"
import DestinationCard from "./DestinationCard.vue";

const favoriteDestination = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get(`/api/profile/favorite`);
        favoriteDestination.value = response.data.data;
    } catch (error) {
        console.error("Error fetching favorite destinations:", error);
    }
});
</script>
