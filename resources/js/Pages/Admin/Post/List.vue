<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import DangerButton from '@/Components/DangerButton.vue';
import { useForm, usePage, Link } from "@inertiajs/vue3";
import { computed } from 'vue';


const props = defineProps({
    posts: {
        type: Object,
        default: () => ({}),
    },
    users: {
        type: Object,
        default: () => ({}),
    },

});

const permissions = computed(() => {
    return usePage().props.permissions
})

const form = useForm({});


function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('posts.destroy', id));
    }
}
</script>


<template>
    <AppLayout title="Post">
        <template #header>

            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Post </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert">
                        <div class="flex">
                            <div>
                                <p class="text-sm">Hai</p>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 flex justify-end mr-4">
                        <Link :href="route('posts.create')" v-if="permissions.post.create">
                        <PrimaryButton class="mt-6 bg-emerald-500">
                            New Post
                        </PrimaryButton>
                        </Link>
                    </div>
                    <table class=" table-fixed w-full">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-4 py-2 w-20">No.</th>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Content</th>
                                <th class="px-4 py-2">Slug</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(post, index) in  posts " :key="post.id" class="bg-gray-200 text-center">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ index + 1 }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ post.title }}
                                </th>
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ post.content }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ post.slug }}
                                </td>
                                <td class="flex justify-center gap-2">
                                    <Link :href="route(
                                        'posts.edit',
                                        post.id)" v-if="permissions.post.edit">
                                    <SecondaryButton type="submit" class="text-white bg-blue-600 rounded-lg">
                                        Edit
                                    </SecondaryButton>
                                    </Link>

                                    <DangerButton class="bg-red-700" @click="destroy(post.id)">
                                        Delete
                                    </DangerButton>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>