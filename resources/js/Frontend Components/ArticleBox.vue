<template>
  <NavLink
  :href="`/article/${article.id}`"
  
  >
    <div class="relative flex flex-row flex-1 shrink gap-5 justify-center object-cover h-full min-h-[450px]  
    rounded-xl basis-0 w-full shadow-[0px_5px_20px_rgba(17,34,17,0.05)] 
    transition-transform transform hover:scale-105 hover:shadow-xl mx-auto ">
        
          <!-- #IMAGE FROM DATABASE
          <img
              :alt="article.alt"
              class="w-full h-64 object-cover transition-transform transform hover:scale-105"
              :src="`/storage/${article.image_url}`"
          />
          -->
          <img loading="lazy" 
          
          :src="`/storage/${article.image_url}`" 
          alt="Article thumbnail" 
          class="absolute object-cover rounded-xl aspect-square w-full h-full z-0" />
        <div class="absolute bg-black opacity-25 w-full h-full rounded-xl">

        </div>
        <div class=" absolute flex flex-col font-montseratt flex-1 left-6 right-3 bottom-5 shrink self-stretch my-auto min-w-[240px]  text-white max-md:max-w-full justify-start items-start z-50">
          
          <div class="justify-start items-start">
            <h2 class="text-lg line-clamp-2 font-normal self-stretch opacity-100 max-md:max-w-full text-left "
            
            >            
            {{
                article.title
            }}
            
            </h2>
          </div>
          
          <div class="justify-start items-start">
            <p
              class="gap-2.5 line-clamp-2 mt-2.5 mb-1  w-full text-base font-medium max-md:max-w-full text-left"
              
            >
              {{ article.slug }}
            </p>

          </div>
          <div class="text-sm bottom-3 text-white">
            {{ formatDate(article.created_at) }}
          </div>
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

function formatDate(dateString) {
  const options = { year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit' };
  return new Date(dateString).toLocaleDateString('en-US', options);
}
</script>