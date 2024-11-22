<template>
    <GuestLayout>
        <div class="flex flex-col items-center justify-center min-h-screen bg-cream">
            <div class="">
                <transition name="fade-up" appear>
                    <img
                    src="../../assets/logo/LogoGeneral.png"
                    class="my-32 "
                    >
                </transition>
                
            </div>
                <div class="text-center ">
                
                <h1 class="text-4xl font-bold text-gray-900">
                    Hello There
                </h1>
                <p class="mt-4 text-lg text-gray-600 px-32">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusamus doloribus excepturi temporibus, repellat veritatis non tempora deleniti dolorem, 
                    ea ullam modi dignissimos aliquam nisi, ex fugit hic. Ea alias, consectetur deleniti aspernatur quo veritatis corrupti aperiam excepturi natus vero, tenetur 
                    dicta ab itaque qui minima debitis dolor velit sequi iusto. Deleniti fuga architecto porro eaque! Enim nemo laborum sequi, voluptatum facere autem. Temporibus magnam, tempore animi fugit, assumenda optio in voluptas tenetur, qui nihil ipsum voluptatibus earum explicabo et omnis recusandae delectus eum illum impedit quam exercitationem quae ratione error eaque? Voluptatibus sit quasi dolorum expedita aut qui similique, ea ducimus est quis ad corporis id reiciendis nihil facilis consequuntur laborum excepturi numquam animi aliquid fugit illo tempore ullam labore! Rem, iste perferendis quaerat aspernatur optio quo possimus ipsum non quidem neque, voluptas delectus. Consequatur totam blanditiis tempora perspiciatis optio aspernatur nihil maiores autem qui? At, quam? Ea dignissimos harum molestiae delectus expedita libero reiciendis reprehenderit tenetur eum quod, deserunt rerum neque sunt recusandae amet, aut possimus magni ut atque. Sed, maxime? Deserunt, odit necessitatibus. Temporibus eveniet quidem autem asperiores doloribus unde inventore exercitationem, dignissimos rerum quas officiis reiciendis. Culpa, ipsum. Delectus dolores fugit sed laudantium quasi dignissimos voluptate.
                </p>
            </div>
        </div>
    </GuestLayout>
</template>

<script>
import GuestLayout from "@/Layouts/GuestLayout.vue";
export default {
    name: "AboutView",
    components: {
        GuestLayout,
    },
};
</script>

<style scoped>
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(30px); /* Adjust for the slide distance */
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
    }

    /* Transition classes for Vue */
    .fade-up-enter-active,
    .fade-up-appear-active {
    animation: fadeUp 0.8s ease-out; /* Duration and easing */
    }

    .fade-up-enter-from,
    .fade-up-appear-from {
    opacity: 0;
    transform: translateY(30px);
    }

    .fade-up-enter-to,
    .fade-up-appear-to {
    opacity: 1;
    transform: translateY(0);
    }
</style>
