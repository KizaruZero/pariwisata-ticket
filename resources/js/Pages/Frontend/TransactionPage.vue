<template>
  <main class="flex overflow-hidden flex-col justify-center items-center px-20 py-20 bg-teal-500 max-md:px-5">
    <div class="flex flex-col w-full max-w-[1454px] max-md:max-w-full">
      <h1 class="self-start ml-8 text-3xl font-semibold leading-none text-black max-md:ml-2.5">
        TRANSAKSI
      </h1>
      <section class="flex overflow-hidden flex-col items-center py-16 mt-12 bg-stone-200 rounded-[30px] max-md:mt-10 max-md:max-w-full">
        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/0e67fc3994fbf8afd00365a5969671e02c70704ccbde629bf9c41c050a1f5fc5?apiKey=ed89e008b7de47e5a3187e8a4c1c72f3&" alt="Vagabond logo" class="object-contain max-w-full aspect-[1.62] w-[193px]" />
        <h2 class="mt-1 text-3xl font-semibold leading-none text-teal-600">VAGABOND</h2>
        <div class="flex flex-col self-stretch px-20 mt-7 w-full max-md:px-5 max-md:max-w-full">
          <article class="flex flex-wrap gap-10 pr-14 max-w-full bg-zinc-300 rounded-[30px] w-[1285px] max-md:pr-5">
            <div class="flex-auto max-md:max-w-full">
              <div class="flex gap-5 max-md:flex-col">
                <div class="flex flex-col w-6/12 max-md:ml-0 max-md:w-full">
                  <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/c8a49e6895e77b9e9c3bc0f8f2e8bd87c6ee77721010b7b75e2197f1a98df1c8?apiKey=ed89e008b7de47e5a3187e8a4c1c72f3&" alt="Pura Tanah Lot" class="object-contain grow w-full aspect-[1.4] rounded-[30px_0px_0px_30px] max-md:mt-3" />
                </div>
                <div class="flex flex-col ml-5 w-6/12 max-md:ml-0 max-md:w-full">
                  <div class="flex flex-col mt-9 leading-snug text-stone-900 max-md:mt-10">
                    <h3 class="text-4xl font-bold">PURA TANAH LOT</h3>
                    <p class="self-start mt-2 text-2xl font-semibold">IDR 60.000/Orang</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="flex gap-5 my-auto">
              <div class="flex shrink-0 bg-white h-[54px] w-[66px]" role="button" tabindex="0" aria-label="Decrease quantity"></div>
              <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/93863e22ab9a2bf3206eb18cac61de1f6f5eb6a91c78a2311a75c8f2d246ebfb?apiKey=ed89e008b7de47e5a3187e8a4c1c72f3&" alt="" class="object-contain shrink-0 my-auto w-12 aspect-square" />
            </div>
          </article>
          <div class="flex flex-wrap gap-5 justify-between mt-80 ml-4 w-full text-2xl font-bold leading-none text-center text-white whitespace-nowrap max-w-[1208px] max-md:mt-10 max-md:max-w-full">
            <button class="gap-2.5 self-stretch p-2.5 bg-teal-600 rounded-xl">Cancel</button>
            <button class="gap-2.5 self-stretch p-2.5 bg-teal-600 rounded-xl">Submit</button>
          </div>
        </div>
      </section>
    </div>
  </main>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'TransactionPage',
  // Add any necessary component logic here
});
</script>