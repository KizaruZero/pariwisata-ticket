<template>
    <div class="flex gap-x-36 bg-blue-500 rounded-3xl">
        <div class="text w-1/2 py-12 px-20 mx-auto">
            <h1 class="text-5xl font-semibold text-white">
                Masih bingung cari tempat yang cocok?
            </h1>
            <p class="mt-8 text-white font-light">
                Tenang, kami mempunyai fitur rekomendasi yang membantu kamu
                mencari tempat berlibur yang tepat dengan menjawab pertanyaan
                yang kami berikan.
            </p>
            <div class="button mt-8">
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
        </div>
        <div class="image w-1/2 flex justify-end rounded-3xl">
            <img
                src="@/assets/closing.png"
                alt="traveling"
                class="rounded-3xl"
            />
        </div>
    </div>
</template>

<script setup>
import NavLink from "@/Components/NavLink.vue";
</script>
