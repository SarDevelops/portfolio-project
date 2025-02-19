<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => {
            form.reset("password", "password_confirmation");
        },
    });
};
</script>

<template>
    <div>
        <Head title="Register" />
        <div
            class="relative bg-center bg-no-repeat bg-cover"
            style="
                background-image: url(https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1951&amp;q=80);
            "
        >
            <div
                class="absolute inset-0 z-0 opacity-75 bg-gradient-to-b from-green-500 to-green-400"
            ></div>
            <div class="justify-center min-h-screen mx-0 sm:flex sm:flex-row">
                <div
                    class="z-10 flex flex-col self-center p-10 sm:max-w-5xl xl:max-w-2xl"
                >
                    <div class="flex-col self-start hidden text-white lg:flex">
                        <img src="" class="mb-3" />
                        <h1 class="mb-3 text-5xl font-bold">
                            Hi ? Welcome Back Admin
                        </h1>
                        <p class="pr-3">
                            Lorem ipsum is placeholder text commonly used in the
                            graphic, print, and publishing industries for
                            previewing layouts and visual mockups
                        </p>
                    </div>
                </div>
                <div class="z-10 flex self-center justify-center">
                    <div class="p-12 mx-auto bg-white rounded-2xl w-100">
                        <div class="mb-4">
                            <h3 class="text-2xl font-semibold text-gray-800">
                                Sign In
                            </h3>
                            <p class="text-gray-500">
                                Please sign in to your account.
                            </p>
                        </div>
                        <form @submit.prevent="submit">
                            <div class="space-y-5">
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-medium tracking-wide text-gray-700"
                                        >Name</label
                                    >
                                    <input
                                        class="w-full px-4 py-2 text-base border border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                        id="name"
                                        type="name"
                                        v-model="form.name"
                                        required
                                        autofocus
                                        autocomplete="name"
                                        placeholder="Enter You Name"
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.name"
                                    />
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="text-sm font-medium tracking-wide text-gray-700"
                                        >Email</label
                                    >
                                    <input
                                        class="w-full px-4 py-2 text-base border border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                        type="email"
                                        v-model="form.email"
                                        required
                                        autofocus
                                        autocomplete="username"
                                        placeholder="mail@gmail.com"
                                    />
                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.email"
                                    />
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="mb-5 text-sm font-medium tracking-wide text-gray-700"
                                    >
                                        Password
                                    </label>
                                    <input
                                        class="content-center w-full px-4 py-2 text-base border border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                        type="password"
                                        placeholder="Enter your password"
                                        v-model="form.password"
                                        required
                                        autocomplete="current-password"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="form.errors.password"
                                    />
                                </div>
                                <div class="space-y-2">
                                    <label
                                        class="mb-5 text-sm font-medium tracking-wide text-gray-700"
                                    >
                                        Confirm Password
                                    </label>
                                    <input
                                        class="content-center w-full px-4 py-2 text-base border border-gray-300 rounded-lg focus:outline-none focus:border-green-400"
                                        type="password"
                                        placeholder="Enter your password"
                                        v-model="form.password_confirmation"
                                        required
                                        autocomplete="new-password"
                                    />

                                    <InputError
                                        class="mt-2"
                                        :message="
                                            form.errors.password_confirmation
                                        "
                                    />
                                </div>
                                <div>
                                    <button
                                        type="submit"
                                        class="flex justify-center w-full p-3 font-semibold tracking-wide text-gray-100 transition duration-500 ease-in bg-green-400 rounded-full shadow-lg cursor-pointer hover:bg-green-500"
                                        :class="{
                                            'opacity-25': form.processing,
                                        }"
                                        :disabled="form.processing"
                                    >
                                        Sign in
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="flex items-center justify-between pt-2">
                            <div class="flex items-center">
                                <Link
                                    :href="route('login')"
                                    class="text-sm text-green-400 underline rounded-md hover:text-green-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                                >
                                    Already have a account?
                                </Link>
                            </div>
                        </div>

                        <div class="pt-5 text-xs text-center text-gray-400">
                            <span>
                                Copyright © 2025-2026
                                <a
                                    href="https://codepen.io/uidesignhub"
                                    rel=""
                                    target="_blank"
                                    title="Ajimon"
                                    class="text-green hover:text-green-500"
                                    >AJI</a
                                ></span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
