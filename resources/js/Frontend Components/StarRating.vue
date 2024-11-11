<!-- StarRating.vue -->
<template>
  <span 
    class="w-10 h-10 flex items-center justify-center rounded-full bg-bond cursor-pointer border"
    :class="clicked ? 'border-yellow-400' : 'border-black'"
    @click="toggleStar"
  >
    <svg 
      xmlns="http://www.w3.org/2000/svg" 
      viewBox="0 0 24 24" 
      class="w-5 h-5"
      :fill="clicked ? 'yellow' : 'transparent'"
      :stroke="clicked ? 'yellow' : 'white'"
      stroke-width="2"
    >
      <path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z"/>
    </svg>
  </span>
</template>

<script setup>
import { ref } from 'vue';

const clicked = ref(false); // Use ref for reactive state

const toggleStar = () => {
  clicked.value = !clicked.value; // Toggle the clicked state
};
</script>

<style scoped>
/* Optional: add custom styles if needed */
</style>