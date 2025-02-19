<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Blogs" />

    <AuthenticatedLayout>
        <div
            class="relative flex flex-col justify-center min-h-screen py-6 overflow-hidden bg-slate-100 sm:py-12"
        >
            <div class="min-h-28">
                <div class="max-w-screen-lg py-4 mx-auto">
                    <h2
                        class="text-6xl font-bold text-center text-slate-700 font-display"
                    >
                        Our Blog Post
                    </h2>
                    <p class="mt-4 font-medium text-center text-slate-500">
                        OUR NEWS FEED
                    </p>
                    <div class="flex gap-6 mt-20">
                        <div
                            class="w-1/3 overflow-hidden bg-white rounded-lg shadow"
                        >
                            <img
                                src="https://loremflickr.com/320/240?random=1"
                                class="object-cover w-full h-52"
                                alt=""
                            />
                            <div class="p-6">
                                <span
                                    class="block text-sm font-semibold text-slate-400"
                                    >16 Juillet 2016</span
                                >
                                <h3
                                    class="pb-4 mt-3 text-lg font-bold border-b border-slate-300"
                                >
                                    <a
                                        href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal"
                                    >
                                        Finding best places to visit in
                                        California</a
                                    >
                                </h3>
                                <div class="flex items-center gap-4 mt-4">
                                    <span
                                        class="flex items-center gap-1 text-sm"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-4 h-4"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                            />
                                        </svg>
                                        35
                                    </span>
                                    <span
                                        class="flex items-center gap-1 text-sm"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-4 h-4 text-sky-400"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                                            />
                                        </svg>

                                        20
                                    </span>
                                    <span
                                        class="flex items-center gap-1 text-sm"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-4 h-4 text-lime-500"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"
                                            />
                                        </svg>

                                        15
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="w-1/3 overflow-hidden bg-white rounded-lg shadow"
                        >
                            <img
                                src="https://loremflickr.com/320/240?random=1"
                                class="object-cover w-full h-52"
                                alt=""
                            />
                            <div class="p-6">
                                <span
                                    class="block text-sm font-semibold text-slate-400"
                                    >16 Juillet 2016</span
                                >
                                <h3
                                    class="pb-4 mt-3 text-lg font-bold border-b border-slate-300"
                                >
                                    <a
                                        href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal"
                                    >
                                        Finding best places to visit in
                                        California</a
                                    >
                                </h3>
                                <div class="flex items-center gap-4 mt-4">
                                    <span
                                        class="flex items-center gap-1 text-sm"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-4 h-4"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                            />
                                        </svg>
                                        35
                                    </span>
                                    <span
                                        class="flex items-center gap-1 text-sm"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-4 h-4 text-sky-400"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                                            />
                                        </svg>

                                        20
                                    </span>
                                    <span
                                        class="flex items-center gap-1 text-sm"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-4 h-4 text-lime-500"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"
                                            />
                                        </svg>

                                        15
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div
                            class="w-1/3 overflow-hidden bg-white rounded-lg shadow"
                        >
                            <img
                                src="https://loremflickr.com/320/240?random=1"
                                class="object-cover w-full h-52"
                                alt=""
                            />
                            <div class="p-6">
                                <span
                                    class="block text-sm font-semibold text-slate-400"
                                    >16 Juillet 2016</span
                                >
                                <h3
                                    class="pb-4 mt-3 text-lg font-bold border-b border-slate-300"
                                >
                                    <a
                                        href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal"
                                    >
                                        Finding best places to visit in
                                        California</a
                                    >
                                </h3>
                                <div class="flex items-center gap-4 mt-4">
                                    <span
                                        class="flex items-center gap-1 text-sm"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-4 h-4"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                            />
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                            />
                                        </svg>
                                        35
                                    </span>
                                    <span
                                        class="flex items-center gap-1 text-sm"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-4 h-4 text-sky-400"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z"
                                            />
                                        </svg>

                                        20
                                    </span>
                                    <span
                                        class="flex items-center gap-1 text-sm"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="w-4 h-4 text-lime-500"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 0 1 .865-.501 48.172 48.172 0 0 0 3.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0 0 12 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018Z"
                                            />
                                        </svg>

                                        15
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<style lang="css"></style>
