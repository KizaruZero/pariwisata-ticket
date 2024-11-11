<script setup>
import Checkbox from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

defineProps({
    canResetPassword: {
        type: Boolean,
    },
    status: {
        type: String,
    },
});

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>

        <Head title="Log in" />
        <img src="../../assets/home.png" class="absolute w-screen h-screen z-10">
        <main class="flex absolute inset-0 shadow-2xl bg-white/20 backdrop-blur-3xl ml-[750px] mt-screen rounded-[30px] w-[700px] h-[600px] m-auto z-50">
            <section class="flex flex-col px-16 mb-0 w-full text-2xl leading-none max-md:px-5 h-[100px] rounded-[50px]">
                <header class="flex flex-row items-end -ml-10 mt-4 max-w-full text-2xl leading-none w-[89px]">
                    <Link :href="route('home')" :active="route().current('home')">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/2cd9ddf8843928bbd676bc009af63527de529dc32fabc9853b551aff413055c9?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3" alt="" class="object-contain self-start w-12 aspect-[0.94]" />
                    </Link>
                </header>

                <img src="../../assets/logo/vagabond.svg" alt="Vagabond logo" class="object-contain mx-auto mt-10 max-w-full aspect-[1.63] w-[125px] max-md:mt-10" />
                <h1 class="mt-1 max-md:mr-2.5 mx-auto whitespace-nowrap text-stone-200 mb-6">VAGABOND</h1>

                <form @submit.prevent="submit">
                    <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
                        {{ status }}
                    </div>

                    <div class="mb-6">
                        <InputLabel for="email" />
                        <TextInput
                            id="email"
                            type="email"
                            class="px-7 py-4 w-full whitespace-nowrap rounded-[50px] bg-stone-200 text-neutral-600 max-md:px-5 max-md:max-w-full"
                            v-model="form.email"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="Email"
                        />
                        <InputError class="mt-2" :message="form.errors.email" />
                    </div>

                    <div class="mb-6 relative">
                        <InputLabel for="password" />
                        <TextInput
                            id="password"
                            type="password"
                            class="px-7 py-4 w-full whitespace-nowrap bg-stone-200 rounded-[50px] text-neutral-600 max-md:px-5 max-md:max-w-full"
                            v-model="form.password"
                            required
                            autocomplete="current-password"
                            placeholder="Password"
                        />
                        <InputError class="mt-2" :message="form.errors.password" />
                    </div>

                    <div class="flex flex-wrap gap-10 w-full text-xl max-md:max-w-full">
                        <div class="flex flex-1 gap-2.5 text-white">
                            <Checkbox name="remember" v-model:checked="form.remember" />
                            <span class="ml-2.5 -mt-1">Remember Me</span>
                        </div>
                        <Link
                            v-if="canResetPassword"
                            :href="route('password.request')"
                            class="text-right text-neutral-600"
                        >
                            Forgot Password?
                        </Link>
                    </div>

                    <PrimaryButton
                        class="w-[487px] h-[70px] justify-center rounded-[50px] bg-vaga mt-8 ml-8 max-w-full text-center text-white whitespace-nowrap max-md:px-5 max-md:mt-10"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Log in
                    </PrimaryButton>
                </form>

                <div class="flex gap-2.5 justify-center items-center self-center p-2.5 mt-2 text-xl text-center text-white">
                    <p class="self-stretch my-auto">New to Vagabond?</p>
                    <div class="text-bond hover:text-amber-500">
                    <Link :href="route('register')" :active="route().current('register')">
                        Sign Up
                    </Link>

                    </div>
                    
                </div>
            </section>
        </main>

</template>
