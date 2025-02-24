<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
import {
  FwbTextarea,
  FwbSpinner,
  FwbButton,
  FwbModal,
  FwbInput,
  FwbFileInput,
} from "flowbite-vue";
import { useFlowbiteThemable } from "flowbite-vue/components/utils/FlowbiteThemable/composables/useFlowbiteThemable.js";
import { ref, onMounted } from "vue";
import Drawer from "@/Components/Drawer.vue";
import { useForm } from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";
import axios from "axios";

const props = defineProps<{
  blogs: Array<{
    id: number;
    title: string;
    content: string;
    image: string | null;
    author: string;
    tags: string;
  }>;
}>();

const form = useForm({
  title: "",
  sub_title: "",
  slug: "",
  content: "",
  image: null,
  author: "",
  tags: "",
});

const edit_form = useForm({
  title: "",
  sub_title: "",
  slug: "",
  content: "",
  image: null,
  author: "",
  tags: "",
});

// const handleFileChange = (event) => {
//     form.image = event.target.files[0];
// };

const isSubmit = ref<boolean>(false);
const file = ref(null);
const createForm = () => {
  console.log("====================================");
  console.log(form);
  console.log("====================================");
  form.post(route("blogs.store"), {
    isSubmit: true,
    preserveScroll: true,
    onSuccess: () => {
      isSubmit.value = false;
      isDrawerOpen.value = false;
      form.reset();
    },
    onError: (errors) => {
      isSubmit.value = false;
      console.log(errors);
    },
  });
};
const isDrawerOpen = ref<boolean>(false);

const toggleDrawer = () => {
  isDrawerOpen.value = !isDrawerOpen.value;
};

const closeDrawer = () => {
  isDrawerOpen.value = false;
};
const isShowModal = ref(false);

const imageData = ref<string>("");
const selectedBlog = ref(null);
const previewImage = (event: Event) => {
  const input = event.target as HTMLInputElement;
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = (e: ProgressEvent<FileReader>) => {
      if (e.target?.result) {
        imageData.value = e.target.result as string;
      }
    };
    form.image = input.files[0];
    reader.readAsDataURL(input.files[0]);
  }
};

// Edit
function closeModal() {
  isShowModal.value = false;
}
async function showModal(blogId) {
  // isShowModal.value = true;
  try {
    const response = await axios.get(route("blogs.show", blogId));
    selectedBlog.value = response.data;
    console.log("blog", "----", selectedBlog.value.id);
    if (selectedBlog) {
      edit_form.title = selectedBlog.value.title;
      edit_form.sub_title = selectedBlog.value.sub_title;
      edit_form.slug = selectedBlog.value.slug;
      edit_form.content = selectedBlog.value.content;
      editImageData.value = `${protocol}//${currentIP}/${selectedBlog.value.image}`;
      edit_form.image = selectedBlog.value.image;
      edit_form.author = selectedBlog.value.author;
      edit_form.tags = selectedBlog.value.tags;
    }

    isShowModal.value = true;
  } catch (error) {
    console.error("Error fetching blog data:", error);
  }
}
const edit_file = ref(null);
const editImageData = ref<string>("");
const editPreviewImage = (event: Event) => {
  const editInput = event.target as HTMLInputElement;
  if (editInput.files && editInput.files[0]) {
    const reader = new FileReader();
    reader.onload = (e: ProgressEvent<FileReader>) => {
      if (e.target?.result) {
        editImageData.value = e.target.result as string;
      }
    };
    edit_form.image = editInput.files[0];
    reader.readAsDataURL(editInput.files[0]);
  }
};
const editForm = () => {
  console.log("====================================");
  console.log(edit_form);
  console.log("====================================");
  edit_form.put(route("blogs.update", 1), {
    preserveScroll: true,
    onSuccess: () => {
      alert("Article Created Successfully!");
      edit_form.reset();
    },
    onError: (errors) => {
      console.log(errors);
    },
  });
};

const convertDate = (dateString: string): string => {
  const date = new Date(dateString);
  return date.toLocaleDateString("en-GB", {
    day: "2-digit",
    month: "long",
    year: "numeric",
  });
};

const error = ref(null);
const protocol = window.location.protocol;
const currentIP = window.location.host;
</script>

<template>
  <Head title="Blogs" />

  <AuthenticatedLayout>
    <fwb-modal v-if="isSubmit"> <fwb-spinner color="purple" size="12" /> </fwb-modal>
    <div
      class="relative flex flex-col justify-center min-h-screen py-6 overflow-hidden bg-slate-100 sm:py-12"
    >
      <div class="min-h-28">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 text-end">
          <fwb-button size="md" color="green" @click="toggleDrawer"
            >Medium - md</fwb-button
          >
          <div class="text-start">
            <Drawer :is-open="isDrawerOpen" :speed="500" @close="closeDrawer">
              <div class="px-1 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <h3 class="text-xl">Create blog</h3>
              </div>
              <div class="px-1 py-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
                <form @submit.prevent="createForm">
                  <!-- Title -->
                  <div class="pb-3">
                    <fwb-input
                      v-model="form.title"
                      placeholder="Enter title"
                      label="Title"
                    />
                    <InputError class="mt-2" :message="form.errors.title" />
                  </div>

                  <!-- Sub Title -->
                  <div class="pb-3">
                    <fwb-input
                      v-model="form.sub_title"
                      placeholder="Enter sub title"
                      label="Sub Title"
                    />
                    <InputError class="mt-2" :message="form.errors.sub_title" />
                  </div>
                  <!-- Slug -->
                  <div class="pb-3">
                    <fwb-input
                      v-model="form.slug"
                      placeholder="Enter slug"
                      label="Slug"
                    />
                    <InputError class="mt-2" :message="form.errors.slug" />
                  </div>

                  <!-- Content -->
                  <div class="pb-3">
                    <fwb-textarea
                      v-model="form.content"
                      :rows="4"
                      label="Your content"
                      placeholder="Write your content..."
                    />
                    <InputError class="mt-2" :message="form.errors.content" />
                  </div>

                  <!-- Image Upload -->
                  <!-- <input
                                 type="file"
                                 @change="handleFileChange"
                                 class="flowbite-input"
                             /> -->
                  <div class="pb-3">
                    <fwb-file-input
                      v-model="file"
                      label="Upload file"
                      @change="previewImage"
                    >
                      <p class="!mt-1 text-sm text-gray-500 dark:text-gray-300">
                        SVG, PNG, JPG or GIF (MAX. 800x400px).
                      </p>
                    </fwb-file-input>
                    <InputError class="mt-2" :message="form.errors.image" />
                    <div class="image-preview" v-if="imageData.length > 0">
                      <img class="preview" :src="imageData" />
                    </div>
                  </div>

                  <!-- Author -->
                  <div class="pb-3">
                    <fwb-input
                      v-model="form.author"
                      placeholder="Enter Author"
                      label="Author"
                    />
                    <InputError class="mt-2" :message="form.errors.author" />
                  </div>
                  <!-- Tags -->
                  <div class="pb-3">
                    <fwb-input
                      v-model="form.tags"
                      placeholder="Enter slug"
                      label="Tags"
                    />
                    <InputError class="mt-2" :message="form.errors.tags" />
                  </div>
                  <!-- Submit Button -->
                  <fwb-button color="purple">Submit</fwb-button>
                </form>
              </div>
            </Drawer>
          </div>
        </div>
        <div class="max-w-screen-lg mx-auto">
          <h2 class="text-6xl font-bold text-center text-slate-700 font-display">
            Our Blog Post
          </h2>
          <p class="mt-4 font-medium text-center text-slate-500">OUR NEWS FEED</p>

          <div class="flex flex-wrap gap-3 mt-20">
            <template v-for="blog in props.blogs" :key="blog.id">
              <div class="w-1/3 overflow-hidden bg-white rounded-lg shadow">
                <img
                  :src="`${protocol}${'//'}${currentIP}${'/'}${blog.image}`"
                  class="object-cover w-full h-52"
                  alt=""
                />
                <div class="p-6">
                  <span class="block text-sm font-semibold text-slate-400">{{
                    convertDate(blog.created_at)
                  }}</span>
                  <h3 class="pb-4 mt-3 text-lg font-bold border-b border-slate-300">
                    <a href="https://play.tailwindcss.com/TGny89rOkl?layout=horizontal">
                      {{ blog.title }}</a
                    >
                  </h3>
                  <div class="flex items-center gap-4 mt-4">
                    <span class="flex items-center gap-1 text-sm">
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
                    <span class="flex items-center gap-1 text-sm">
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
                    <span class="flex items-center gap-1 text-sm">
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
                    <span
                      class="flex items-center gap-1 text-sm cursor-pointer"
                      @click="showModal(blog.id)"
                    >
                      <svg
                        class="w-6 h-6 text-gray-800 dark:text-white"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        width="24"
                        height="24"
                        fill="currentColor"
                        viewBox="0 0 24 24"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M11.32 6.176H5c-1.105 0-2 .949-2 2.118v10.588C3 20.052 3.895 21 5 21h11c1.105 0 2-.948 2-2.118v-7.75l-3.914 4.144A2.46 2.46 0 0 1 12.81 16l-2.681.568c-1.75.37-3.292-1.263-2.942-3.115l.536-2.839c.097-.512.335-.983.684-1.352l2.914-3.086Z"
                          clip-rule="evenodd"
                        />
                        <path
                          fill-rule="evenodd"
                          d="M19.846 4.318a2.148 2.148 0 0 0-.437-.692 2.014 2.014 0 0 0-.654-.463 1.92 1.92 0 0 0-1.544 0 2.014 2.014 0 0 0-.654.463l-.546.578 2.852 3.02.546-.579a2.14 2.14 0 0 0 .437-.692 2.244 2.244 0 0 0 0-1.635ZM17.45 8.721 14.597 5.7 9.82 10.76a.54.54 0 0 0-.137.27l-.536 2.84c-.07.37.239.696.588.622l2.682-.567a.492.492 0 0 0 .255-.145l4.778-5.06Z"
                          clip-rule="evenodd"
                        />
                      </svg>
                    </span>
                  </div>
                </div>
              </div>
            </template>
          </div>
        </div>
      </div>
      <fwb-modal size="3xl" v-if="isShowModal" @close="closeModal">
        <template #header>
          <div class="flex items-center text-lg">Terms of Service</div>
        </template>
        <template #body>
          <div class="text-start">
            <form @submit.prevent="editForm">
              <div class="flex flex-row flex-wrap">
                <!-- Title -->
                <div class="px-3 pb-3">
                  <fwb-input
                    v-model="edit_form.title"
                    placeholder="Enter title"
                    label="Title"
                  />
                  <InputError class="mt-2" :message="edit_form.errors.title" />
                </div>

                <!-- Sub Title -->
                <div class="px-3 pb-3">
                  <fwb-input
                    v-model="edit_form.sub_title"
                    placeholder="Enter sub title"
                    label="Sub Title"
                  />
                  <InputError class="mt-2" :message="edit_form.errors.sub_title" />
                </div>
                <!-- Slug -->
                <div class="px-3 pb-3">
                  <fwb-input
                    v-model="edit_form.slug"
                    placeholder="Enter slug"
                    label="Slug"
                  />
                  <InputError class="mt-2" :message="edit_form.errors.slug" />
                </div>
                <!-- Author -->
                <div class="px-3 pb-3">
                  <fwb-input
                    v-model="edit_form.author"
                    placeholder="Enter Author"
                    label="Author"
                  />
                  <InputError class="mt-2" :message="edit_form.errors.author" />
                </div>

                <!-- Tags -->
                <div class="pb-3">
                  <fwb-input
                    v-model="edit_form.tags"
                    placeholder="Enter slug"
                    label="Tags"
                  />
                  <InputError class="mt-2" :message="edit_form.errors.tags" />
                </div>
              </div>

              <!-- Content -->
              <div class="pb-3">
                <fwb-textarea
                  v-model="edit_form.content"
                  :rows="4"
                  label="Your content"
                  placeholder="Write your content..."
                />
                <InputError class="mt-2" :message="edit_form.errors.content" />
              </div>

              <!-- Image Upload -->
              <!-- <input
                              type="file"
                              @change="handleFileChange"
                              class="flowbite-input"
                          /> -->
              <div class="pb-3">
                <fwb-file-input
                  v-model="edit_file"
                  label="Upload file"
                  @change="editPreviewImage"
                >
                  <p class="!mt-1 text-sm text-gray-500 dark:text-gray-300">
                    SVG, PNG, JPG or GIF (MAX. 800x400px).
                  </p>
                </fwb-file-input>
                <InputError class="mt-2" :message="edit_form.errors.image" />
                <div class="image-preview" v-if="editImageData.length > 0">
                  <img class="preview" :src="editImageData" />
                </div>
              </div>

              <!-- Submit Button -->
              <div class="text-end">
                <fwb-button color="purple">Save</fwb-button>
              </div>
            </form>
          </div>
        </template>
        <!-- <template #footer>
              <div class="flex justify-between">
                <fwb-button @click="closeModal" color="alternative"> Decline </fwb-button>
                <fwb-button @click="closeModal" color="green"> I accept </fwb-button>
              </div>
            </template> -->
      </fwb-modal>
    </div>
  </AuthenticatedLayout>
</template>
<style lang="css"></style>
