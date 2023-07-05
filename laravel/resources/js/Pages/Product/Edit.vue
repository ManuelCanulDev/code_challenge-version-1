<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    product: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.product.id,
    name: props.product.name,
    description: props.product.description,
    price: props.product.price,
    quantity: props.product.quantity,
});


const submit = () => {
    form.put(route("products.update", props.product.id));
};
</script>

<template>
    <Head title="Editar Producto" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Editar Producto
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.name"
                                    name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >description</label
                                >
                                <input
                                    type="text"
                                    v-model="form.description"
                                    name="description"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.description"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.description }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >price</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.price"
                                    name="price"
                                    id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.price"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.price }}
                                </div>
                            </div>

                            <div class="mb-6">
                                <label
                                    for="quantity"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >quantity</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.quantity"
                                    name="quantity"
                                    id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.quantity"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.quantity }}
                                </div>
                            </div>

                            <button
                                type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing"
                                :class="{ 'opacity-25': form.processing }"
                            >
                                Editar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
