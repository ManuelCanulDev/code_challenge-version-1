<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    cliente: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({
    id: props.cliente.id,
    name: props.cliente.name,
    lastname: props.cliente.lastname,
    email: props.cliente.email,
});


const submit = () => {
    form.put(route("clientes.update", props.cliente.id));
};
</script>

<template>
    <Head title="Editar Cliente" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Editar Cliente
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
                                    for="Lastname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Lastname</label
                                >
                                <input
                                    type="text"
                                    v-model="form.lastname"
                                    name="lastname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder=""
                                />
                                <div
                                    v-if="form.errors.lastname"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.lastname }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="Email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Email</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.email"
                                    name="email"
                                    id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.email"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.email }}
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
