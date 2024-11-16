<template>
  <NavLink
  :href="`/article/${article.id}`"
  >
    <div class="flex flex-row flex-1 shrink gap-5 justify-start object-cover p-5 
    bg-white rounded-3xl basis-0 w-full h-full shadow-[0px_5px_20px_rgba(17,34,17,0.05)] 
    transition-transform transform hover:scale-105 hover:shadow-xl mx-6">
        <figure class="flex  self-stretch my-auto  w-[114px]">
          <!-- #IMAGE FROM DATABASE
          <img
              :alt="article.alt"
              class="w-full h-64 object-cover transition-transform transform hover:scale-105"
              :src="`/storage/${article.image_url}`"
          />
          -->
          <img loading="lazy" src="../assets/Explore.png" alt="Article thumbnail" class="object-cover rounded-xl aspect-square w-[114px]" />
        </figure>
        <div class="flex flex-col flex-1 shrink self-stretch my-auto min-w-[240px]  text-neutral-900 max-md:max-w-full justify-start items-start">
          <h2 class="text-xl font-semibold  self-stretch opacity-70 max-md:max-w-full ">
            
            {{
                article.title.length > 25
                    ? article.title.slice(0, 25) + "..."
                    : article.title
            }}
            
          </h2>
          <p class="gap-2.5 mt-2.5 w-full text-lg font-medium max-md:max-w-full">
            
            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
          </p>
      </div>
    </div>

  </NavLink>

  
</template>

<script setup>
import { defineProps } from "vue";
import NavLink from "../Components/NavLink.vue";

const props = defineProps({
    article: {
        type: Object,
        required: true,
    },
});


</script>