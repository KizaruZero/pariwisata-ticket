<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

import VueTurnstile from "vue-turnstile";
const TURNSTILE_SITE_KEY = "0x4AAAAAAA0scbXmzqIhwJw3"; // Ganti dengan site key Anda

const form = useForm({
    name: "",
    email: "",
    role: "user",
    password: "",
    password_confirmation: "",
    token: "", // tambahkan ini
});

const onTurnstileSuccess = (turnstileToken) => {
    console.log("Turnstile success:", turnstileToken); // Untuk debug
    form.token = turnstileToken;
};

const onTurnstileExpired = () => {
    console.log("Turnstile expired"); // Untuk debug
    form.token = "";
};

const onTurnstileError = () => {
    console.log("Turnstile error"); // Untuk debug
    form.token = "";
};

const submit = () => {
    if (!form.token) {
        console.log("No token found"); // Untuk debug
        form.errors.token = "Captcha harus diisi."; // Menambahkan pesan error untuk token
        return;
    }

    form.post(route("register"), {
        onError: (errors) => {
            console.log("Submit errors:", errors); // Untuk debug
            if (errors.token) {
                window.turnstile?.reset();
                form.token = "";
            }
        },
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="Register" />
    <img src="../../assets/home.png" class="absolute w-screen h-screen z-10" />
    <main
        class="flex shadow-lg absolute inset-0 bg-white/20 backdrop-blur-3xl ml-[750px] mt-screen rounded-[30px] w-[700px] h-[700px] m-auto z-50"
    >
        <section
            class="flex flex-col px-16 mb-0 w-full text-2xl leading-none max-md:px-5 h-[100px] rounded-[50px]"
        >
            <header
                class="flex flex-row items-end -ml-10 mt-4 max-w-full text-2xl leading-none w-[89px]"
            >
                <Link :href="route('home')" :active="route().current('home')">
                    <img
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/2cd9ddf8843928bbd676bc009af63527de529dc32fabc9853b551aff413055c9?placeholderIfAbsent=true&apiKey=ed89e008b7de47e5a3187e8a4c1c72f3"
                        alt=""
                        class="object-contain self-start w-12 aspect-[0.94]"
                    />
                </Link>
            </header>

            <img
                src="../../assets/logo/vagabond.svg"
                alt="Vagabond logo"
                class="object-contain mx-auto mt-10 max-w-full aspect-[1.63] w-[125px] max-md:mt-10"
            />
            <h1
                class="mt-1 max-md:mr-2.5 mx-auto whitespace-nowrap text-stone-200 mb-6"
            >
                VAGABOND
            </h1>

            <form @submit.prevent="submit" class="space-y-6">
                <div>
                    <InputLabel for="name" />
                    <TextInput
                        id="name"
                        type="text"
                        class="px-7 py-4 w-full whitespace-nowrap bg-stone-200 rounded-[50px] text-neutral-600 max-md:px-5 max-md:max-w-full"
                        v-model="form.name"
                        required
                        autofocus
                        autocomplete="name"
                        placeholder="Name"
                    />
                    <InputError class="mt-2" :message="form.errors.name" />
                </div>

                <div>
                    <InputLabel for="email" />
                    <TextInput
                        id="email"
                        type="email"
                        class="px-7 py-4 w-full whitespace-nowrap bg-stone-200 rounded-[50px] text-neutral-600 max-md:px-5 max-md:max-w-full"
                        v-model="form.email"
                        required
                        autocomplete="username"
                        placeholder="Email"
                    />
                    <InputError class="mt-2" :message="form.errors.email" />
                </div>

                <div>
                    <InputLabel for="password" />
                    <TextInput
                        id="password"
                        type="password"
                        class="px-7 py-4 w-full whitespace-nowrap bg-stone-200 rounded-[50px] text-neutral-600 max-md:px-5 max-md:max-w-full"
                        v-model="form.password"
                        required
                        autocomplete="new-password"
                        placeholder="Password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div>
                    <InputLabel for="password_confirmation" />
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="px-7 py-4 w-full whitespace-nowrap bg-stone-200 rounded-[50px] text-neutral-600 max-md:px-5 max-md:max-w-full"
                        v-model="form.password_confirmation"
                        required
                        autocomplete="new-password"
                        placeholder="Confirm Password"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
                </div>

                <div class="mb-4">
                    <vue-turnstile
                        :site-key="TURNSTILE_SITE_KEY"
                        @success="onTurnstileSuccess"
                        @expired="onTurnstileExpired"
                        @error="onTurnstileError"
                        required
                        v-model="form.token"
                    />
                    <div
                        v-if="form.errors.token || !form.token"
                        class="text-red-500 text-sm mt-1"
                    >
                        {{ form.errors.token }}
                    </div>
                </div>

                <div class="flex flex-col items-center justify-end">
                    <PrimaryButton
                        class="w-[50%] h-[70px] justify-center bg-vaga max-w-full text-center text-white whitespace-nowrap max-md:px-5 max-md:mt-10"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        Register
                    </PrimaryButton>
                    <Link
                        :href="route('login')"
                        class="underline text-[18px] mt-5 text-bond hover:text-amber-400 rounded-md"
                    >
                        Already have a Vagabond Account?
                    </Link>
                </div>
            </form>
        </section>
    </main>
</template>
