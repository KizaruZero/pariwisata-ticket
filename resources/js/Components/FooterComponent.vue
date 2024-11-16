<template>
  <footer data-layername="footer" class="flex flex-wrap gap-10 items-start px-40 py-24  leading-none bg-bond max-md:px-5 max-md:pb-24">
    <div data-layername="logoFooter" class="flex flex-col grow shrink text-3xl text-white whitespace-nowrap w-[134px]">
      <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/d21763be61fd1653a3cad4b2ad1c423de359f92b34cab0ff53aba97f7dcdfc39?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="Vagabond logo" class="object-contain w-[168px]" />
      <h2 data-layername="vagabond" class="max-md:ml-3 -ml-0.5 font-bodoni font-thin ">VAGABOND</h2>
    </div>
    <nav data-layername="columnGroup" class="flex flex-wrap grow shrink items-start text-2xl text-cream min-h-[146px] min-w-[240px] w-[400px] max-md:max-w-full">
      <ul data-layername="linkColumn1" class="flex flex-col grow shrink min-w-[240px] w-[413px] max-md:max-w-full py-2 gap-2 font-montseratt ">
        <li><a href="/" data-layername="linkColumnItem11">Home</a></li>
        <li><a href="/explore" data-layername="linkColumnTitle1">Explore</a></li>
        <li><a href="/article" data-layername="linkColumnItem11">Article</a></li>
        <li><a href="/about" data-layername="linkColumnItem12" >About Us</a></li>
      </ul>
      <div class="flex gap-4">
        <a href="#" aria-label="Facebook">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/395bca3c13de8a82f5eedb506a10e85bb4bc30351ad3f136104cc4d4fe43e1be?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="" class="object-contain shrink-0 w-12 aspect-[1.07]" />
        </a>
        <a href="#" aria-label="Twitter">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/9f71a93f9ff113b48b0e8c68e1b6b3d233af0c195236e590c59b8a66d895f9c0?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="" class="object-contain shrink-0 aspect-square w-[45px]" />
        </a>
        <a href="#" aria-label="Instagram">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f136f496227d6be828431ea9cda134a5a6f57fa8d9e0bb7e6f9a58d5cbe45cda?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="" class="object-contain shrink-0 aspect-[1.22] w-[55px]" />
        </a>
        <a href="#" aria-label="LinkedIn">
          <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/b251a6c99a13b6b33c16cc564abfb4f8e9c64bd6e279c5cc162c3fc597f1b802?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="" class="object-contain shrink-0 aspect-[0.91] w-[41px]" />
        </a>
      </div>
    </nav>
  </footer>
</template>

<script>
export default {
  name: 'FooterComponent'
}
</script>