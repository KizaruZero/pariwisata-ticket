<script setup>
import Checkboxs from "@/Components/Checkbox.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import VueRecaptcha from "vue-recaptcha";
import { ref } from "vue";
import VueTurnstile from "vue-turnstile";
const TURNSTILE_SITE_KEY = "0x4AAAAAAA0scbXmzqIhwJw3"; // Ganti dengan site key Anda
// const token = ref(""); // untuk menyimpan token turnstile

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

    form.post(route("login"), {
        onError: (errors) => {
            console.log("Submit errors:", errors); // Untuk debug
            if (errors.token) {
                window.turnstile?.reset();
                form.token = "";
            }
        },
        onSuccess: () => {
            console.log("Submit success"); // Untuk debug
        },
    });
};
</script>

<template>
    <Head title="Log in" />

    <img src="../../assets/home.png" class="absolute w-screen h-screen z-10" />
    <div class="flex flex-row w-screen h-screen">
    <div class="flex w-1/2">
        <!-- Left content -->
    </div>
    <div class="flex w-1/2 justify-center items-center">
        <main class="flex shadow-2xl bg-white/20 backdrop-blur-3xl rounded-[30px] w-[700px] h-[650px] z-50">
            
                <section
                    class="flex flex-col px-16 mb-0 w-full text-2xl leading-none max-md:px-5 h-[100px] rounded-[50px]"
                >
                    <header
                        class="flex flex-row items-end -ml-10 mt-6 max-w-full text-2xl leading-none w-[89px]"
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
                        class="object-contain mx-auto -mt-1 max-w-full aspect-[1.63] w-[125px] max-md:mt-10"
                    />
                    <h1
                        class="mt-1 max-md:mr-2.5 mx-auto whitespace-nowrap text-white mb-6"
                    >
                        VAGABOND
                    </h1>


                    <form @submit.prevent="submit">
                        <div
                            v-if="status"
                            class="mb-4 font-medium text-sm text-green-600"
                        >
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

                        <div class="mb-8 relative">
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


                        <div
                            class="flex flex-wrap mb-4 w-full text-xl max-md:max-w-full justify-center items-center"
                        >
                            <div class="flex flex-1 gap-2 text-white mt-2">
                                <Checkboxs
                                    name="remember"
                                    v-model:checked="form.remember"
                                />
                                <span class="ml-2.5 -mt-1.5">Remember Me</span>
                            </div>

                            <Link
                                v-if="canResetPassword"
                                :href="route('password.request')"
                                class="text-right text-neutral-600 transform transition-transform hover:scale-105 hover:text-amber-300"
                            >
                                Forgot Password?
                            </Link>
                        </div>
                        <div class="flex justify-center items-center scale-90 mb-2">
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
                        

                        
                        <div class="flex mt-4">
                            <PrimaryButton
                            class="w-[300px] h-[70px] justify-center mx-auto rounded-xl shadow-md bg-vaga max-w-full text-center text-white whitespace-nowrap max-md:px-5 max-md:mt-10 transform transition-transform hover:scale-105"
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Log in
                        </PrimaryButton>
                        </div>

                    </form>
                    

                    <div
                        class="flex gap-2.5 justify-center items-center self-center p-2.5 mt-2 text-xl text-center text-white transform transition-transform hover:scale-105"
                    >
                        <p class="self-stretch my-auto">New to Vagabond?</p>
                        <div class="text-bond hover:text-amber-300">
                            <Link
                                :href="route('register')"
                                :active="route().current('register')"
                            >
                                Sign Up
                            </Link>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

</template>
