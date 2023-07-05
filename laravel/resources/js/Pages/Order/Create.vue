<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    orders: {
        type: Object,
        default: () => ({}),
    },

    clientes:{
        type: Object,
        default: () => ({}),
    }
});


const form = useForm({
    order_number: '',
    status_id: '',
    clients_id: '',
});

const submit = () => {
    form.post(route("orders.store"));
};
</script>

<template>
    <Head title="Crear Order" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Crear Order
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="order_number"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">order_number</label>
                                <input type="text" v-model="form.order_number" name="order_number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.order_number" class="text-sm text-red-600">
                                    {{ form.errors.order_number }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="status_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">status_id</label>
                                <input type="text" v-model="form.status_id" name="status_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.status_id" class="text-sm text-red-600">
                                    {{ form.errors.status_id }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="clients_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">clients_id</label>

                                <select id="clients_id" name="clients_id" v-model="form.clients_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option selected>Escoja un cliente</option>
                                    <option v-for="cliente in clientes" :value="cliente.id" :key="cliente.id">
                                        {{ cliente.name }}
                                    </option>
                                </select>

                                <div v-if="form.errors.clients_id" class="text-sm text-red-600">
                                    {{ form.errors.clients_id }}
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                Guardar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
