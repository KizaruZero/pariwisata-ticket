<template>
  <div id="app">
    <header class="bg-teal-500 text-white p-4 flex justify-between items-center">
      <div class="flex items-center">
        <img
          src="https://storage.googleapis.com/a1aa/image/oBH0sFVeo6TzFy1lxATgnqhkEEBQEC38b7wy2xeS2hYy8SkTA.jpg"
          alt="Vagabond Logo"
          class="h-10 mr-2"
          width="50"
          height="50"
        />
        <h1 class="text-2xl font-bold">VAGABOND</h1>
      </div>
      <nav>
        <ul class="flex space-x-4">
          <li><a href="#" class="hover:underline">Home</a></li>
          <li><a href="#" class="hover:underline">Explore</a></li>
          <li><a href="#" class="hover:underline">Articles</a></li>
          <li><a href="#" class="hover:underline">About Us</a></li>
        </ul>
      </nav>
      <img
        src="https://storage.googleapis.com/a1aa/image/Game1GzyXHQ8FKCzHLYRhAKfc09fwPmaSMiWy97yr1Eh5lInA.jpg"
        alt="User Avatar"
        class="h-10 rounded-full"
        width="50"
        height="50"
      />
    </header>

    <section class="relative">
      <img
        src="https://storage.googleapis.com/a1aa/image/CIb779Cp4gojKNcByffQ0ixPsajdRWoOP61DrBdqgNA28SkTA.jpg"
        alt="Scenic view of a coastline"
        class="w-full h-96 object-cover"
      />
      <div class="absolute top-0 left-0 w-full h-full flex flex-col justify-center items-center text-white">
        <h2 class="text-5xl font-bold">Plan Your Perfect Trip</h2>
        <button class="mt-4 px-6 py-2 bg-teal-500 rounded-full text-lg">Go Explore</button>
      </div>
    </section>

    <section class="bg-teal-500 text-white py-12">
      <h2 class="text-center text-3xl font-bold mb-8">Elevate Your Travel</h2>
      <div class="flex justify-center space-x-4">
        <div class="bg-white text-black rounded-lg overflow-hidden shadow-lg w-64" v-for="item in travelDestinations" :key="item.id">
          <img :src="item.img" alt="Image of {{ item.title }}" class="w-full h-36 object-cover" />
          <div class="p-4">
            <h3 class="font-bold text-xl">{{ item.title }}</h3>
            <p class="text-gray-600">{{ item.price }} / person</p>
          </div>
        </div>
      </div>
      <div class="text-center mt-8">
        <button class="px-6 py-2 bg-white text-teal-500 rounded-full">SEE MORE</button>
      </div>
    </section>

    <section class="bg-gray-800 text-white py-12">
      <h2 class="text-center text-3xl font-bold mb-8">Find Interesting Articles</h2>
      <div class="flex justify-center space-x-4">
        <div
          v-for="article in articles"
          :key="article.id"
          class="bg-gray-200 text-black rounded-lg p-4 w-64"
        >
          <img :src="article.img" :alt="'Image related to ' + article.title" class="w-full h-36 object-cover mb-4" />
          <h3 class="font-bold text-xl">{{ article.title }}</h3>
          <p class="text-gray-600">{{ article.description }}</p>
        </div>
      </div>
      <div class="text-center mt-8">
        <button class="px-6 py-2 bg-teal-500 rounded-full">READ MORE</button>
      </div>
    </section>

    <section class="bg-teal-500 text-white py-12">
      <h2 class="text-center text-3xl font-bold mb-8">Why Should Choose Us?</h2>
      <div class="flex justify-center space-x-8">
        <div v-for="benefit in benefits" :key="benefit.id" class="flex items-center space-x-4">
          <i :class="benefit.icon" class="text-4xl"></i>
          <div>
            <h3 class="font-bold text-xl">{{ benefit.title }}</h3>
            <p class="text-gray-200">{{ benefit.description }}</p>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-gray-900 text-white py-8">
      <div class="flex justify-center mb-4">
        <img
          src="https://storage.googleapis.com/a1aa/image/oBH0sFVeo6TzFy1lxATgnqhkEEBQEC38b7wy2xeS2hYy8SkTA.jpg"
          alt="Vagabond Logo"
          class="h-12"
        />
      </div>
      <nav class="text-center mb-4">
        <ul class="flex justify-center space-x-4">
          <li><a href="#" class="hover:underline">Home</a></li>
          <li><a href="#" class="hover:underline">Explore</a></li>
          <li><a href="#" class="hover:underline">Articles</a></li>
          <li><a href="#" class="hover:underline">About Us</a></li>
        </ul>
      </nav>
      <div class="flex justify-center space-x-4">
        <a href="#" class="hover:text-teal-500"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="hover:text-teal-500"><i class="fab fa-twitter"></i></a>
        <a href="#" class="hover:text-teal-500"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-teal-500"><i class="fab fa-youtube"></i></a>
      </div>
    </footer>
  </div>
</template>

<script>
export default {
  data() {
    return {
      travelDestinations: [
        {
          id: 1,
          title: "Kuil Batu Boko",
          price: "IDR 5.000.000",
          img: "https://storage.googleapis.com/a1aa/image/ZN9VcRyFlT7nPVLQMpdtQWDeGzVqkZfAarqfzRVS68pO5lInA.jpg",
        },
        {
          id: 2,
          title: "Kuil Batu Boko",
          price: "IDR 5.000.000",
          img: "https://storage.googleapis.com/a1aa/image/ZN9VcRyFlT7nPVLQMpdtQWDeGzVqkZfAarqfzRVS68pO5lInA.jpg",
        },
        {
          id: 3,
          title: "Kuil Batu Boko",
          price: "IDR 5.000.000",
          img: "https://storage.googleapis.com/a1aa/image/ZN9VcRyFlT7nPVLQMpdtQWDeGzVqkZfAarqfzRVS68pO5lInA.jpg",
        },
      ],
      articles: [
        {
          id: 1,
          title: "Article 1",
          img: "https://storage.googleapis.com/a1aa/image/4FKkW0KweIXOTqRAuP46RkzNXIMJ69csfzWM4pHE7Vrq8SkTA.jpg",
          description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        },
        {
          id: 2,
          title: "Article 2",
          img: "https://storage.googleapis.com/a1aa/image/DbVdr7DJ6rIGDhRv1CfeEPhmsbqEVq3gDOm3kPHGF4Lt8SkTA.jpg",
          description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        },
        {
          id: 3,
          title: "Article 3",
          img: "https://storage.googleapis.com/a1aa/image/ENiHPW9lcv6uNhe3R05NodBwIlLg7UD21rHfiQtSfd415lInA.jpg",
          description: "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        },
      ],
      benefits: [
        {
          id: 1,
          title: "User-Friendly Interface",
          description: "Our platform is easy to use, with simple and intuitive navigation.",
          icon: "fas fa-laptop",
        },
        {
          id: 2,
          title: "Affordable Packages",
          description: "Enjoy affordable travel packages without compromising quality.",
          icon: "fas fa-wallet",
        },
        {
          id: 3,
          title: "24/7 Support",
          description: "We are here to assist you at any time, day or night.",
          icon: "fas fa-headset",
        },
      ],
    };
  },
};
</script>

<style scoped>
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css');
</style>
