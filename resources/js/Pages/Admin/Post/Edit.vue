<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { Link } from '@inertiajs/vue3';
import { useForm } from "@inertiajs/vue3";
import PostForm from '@/Pages/Admin/Post/Form.vue';

defineProps({
    post: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <AppLayout title="Edit Post">
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Edit Post
            </h2>
        </template>

        <PostForm :post="post"></PostForm>
    </AppLayout>
</template>