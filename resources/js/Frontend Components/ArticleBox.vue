<template>
  <article class="flex flex-wrap flex-1 shrink gap-5 items-center p-5 bg-white rounded-3xl basis-0 min-w-[240px] shadow-[0px_5px_20px_rgba(17,34,17,0.05)] transition-transform transform hover:scale-105 hover:shadow-xl max-md:max-w-full">
    <figure class="flex flex-col self-stretch my-auto min-h-[114px] w-[114px]">
      <img loading="lazy" src="../assets/Explore.png" alt="Article thumbnail" class="object-cover rounded-xl aspect-square w-[114px]" />
    </figure>
    <div class="flex flex-col flex-1 shrink self-stretch my-auto basis-0 min-w-[240px] text-neutral-900 max-md:max-w-full">
      <h2 class="text-xl font-semibold opacity-70 max-md:max-w-full">Article 1</h2>
      <p class="gap-2.5 mt-2.5 w-full text-lg font-medium max-md:max-w-full">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
      </p>
    </div>
  </article>
</template>

<script>
export default {
  name: 'ArticleBox'
}
</script>