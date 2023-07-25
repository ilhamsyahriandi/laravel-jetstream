<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import TextArea from '@/Components/TextArea.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import { computed } from 'vue';

const props = defineProps({
    post: {
        type: Object,
        default: () => ({}),
    },

    readonly: {
        type: Boolean,
        default: false,
    }

});

const form = useForm("createPost", {
    id: props.post.id ?? 0,
    title: props.post.title ?? '',
    slug: props.post.slug ?? '',
    content: props.post.content ?? '',
});

const submit = () => {
    if (form.id === 0) {
        delete form.id
        form.post(route("posts.store"), {
            onSuccess: () => form.reset(),
        });
    }
    else {
        form.put(route("posts.update", props.post.id));
    }
};

const buttonLabel = computed(() => {
    return form.id === 0 ? 'create' : 'update'
})


</script>

<template>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <form @submit.prevent="submit">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-6">
                                <InputLabel for="title" value="Title" />
                                <TextInput id="title" v-model="form.title" type="text" class="mt-1 block w-full" required
                                    autofocus autocomplete="title" placeholder="Add the title" :disabled="readonly" />
                                <InputError class="mt-2" :message="form.errors.title" />
                            </div>
                            <div class="mb-6">
                                <InputLabel for="slug" value="Slug" />
                                <TextInput id="slug" v-model="form.slug" type="text" class="mt-1 block w-full"
                                    autocomplete="slug" placeholder="Add the slug" :disabled="readonly" />
                                <InputError class="mt-2" :message="form.errors.slug" />
                            </div>
                        </div>

                        <div class="mb-6 col-span-2">
                            <InputLabel for="content" value="Content" />
                            <TextArea type="text" v-model="form.content" name="content" id="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                                 focus:border-blue-500 block w-full p-2.5" placeholder="Add the content.."
                                :disabled="readonly">
                            </TextArea>
                            <InputError class="mt-2" :message="form.errors.content" />
                        </div>


                        <PrimaryButton class="mt-6" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                            {{ buttonLabel }}
                        </PrimaryButton>


                    </form>
                </div>
            </div>
        </div>
    </div>
</template>