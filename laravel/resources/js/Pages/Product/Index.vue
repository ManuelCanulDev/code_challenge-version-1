<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from '@inertiajs/vue3';
import BreezeButton from "@/Components/PrimaryButton.vue";
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    products: {
        type: Object,
        default: () => ({}),
    },
});

const form = useForm({});

function destroy(id) {


    if (confirm("Esta seguro que quiere eliminar esta entrada?")) {
        form.delete(route('products.destroy', id));
    }
}
</script>

<template>
    <Head title="Productos" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Productos
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="mb-2">
                            <Link :href="route('products.create')">
                            <BreezeButton>Agregar Producto</BreezeButton>
                            </Link>
                        </div>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">#</th>
                                        <th scope="col" class="px-6 py-3">
                                            name
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            description
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            price
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            quantity
                                        </th>
                                        <th scope="col" colspan="2" class="px-6 py-3">
                                            Opciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="product in products" :key="product.id"
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ product.id }}
                                        </th>
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ product.name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ product.description }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ product.price }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ product.quantity }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <Link :href="route(
                                                'products.edit',
                                                product.id
                                            )
                                                " class="px-4 py-2 text-white bg-blue-600 rounded-lg">Editar</Link>
                                        </td>
                                        <td class="px-6 py-4">
                                            <BreezeButton class="bg-red-700" @click="destroy(product.id)">
                                                Eliminar
                                            </BreezeButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </BreezeAuthenticatedLayout>
</template>
