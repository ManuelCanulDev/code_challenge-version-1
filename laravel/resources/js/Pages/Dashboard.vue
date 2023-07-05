<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="container mx-auto">
            <div class="flex flex-wrap mx-10 my-10">
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-4">
                    <a href="/clientes" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-5 px-6 rounded">
                        Ir a Clientes
                    </a>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-4">
                    <!-- Contenido de tu columna aquí -->
                    <a href="/orders" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-5 px-6 rounded">
                        Ir a Orders
                    </a>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-4">
                    <a href="/products" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-5 px-6 rounded">
                        Ir a Products
                    </a>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-4">
                    <a href="/orderDetails" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-5 px-6 rounded">
                        Ir a Order Details
                    </a>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-4">
                    <a href="/suppliers" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-5 px-6 rounded">
                        Ir a Suppliers
                    </a>
                </div>
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/6 px-4">
                    <a href="/supplierProducts" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-5 px-6 rounded">
                        Ir a Supplier Products
                    </a>
                </div>

            </div>
        </div>

    </AuthenticatedLayout>
</template>
