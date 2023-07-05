<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    orderDetail: {
        type: Object,
        default: () => ({}),
    },

    orders: {
        type: Object,
        default: () => ({}),
    },

    products: {
        type: Object,
        default: () => ({}),
    }
});

const form = useForm({
    id: props.orderDetail.id,
    order_id: props.orderDetail.order_id,
    product_id: props.orderDetail.product_id,
    price: props.orderDetail.price,
});


const submit = () => {
    form.put(route("orderDetails.update", props.orderDetail.id));
};
</script>

<template>
    <Head title="Editar orderDetails" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Editar orderDetails
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">price</label>
                                <input type="text" v-model="form.price" name="price"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="" />
                                <div v-if="form.errors.price" class="text-sm text-red-600">
                                    {{ form.errors.price }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="order_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">order_id</label>
                                <select id="order_id" name="order_id" v-model="form.order_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option selected>Escoja un cliente</option>
                                    <option v-for="order in orders" :value="order.id" :key="order.id">
                                        {{ order.order_number }}
                                    </option>
                                </select>

                                <div v-if="form.errors.order_id" class="text-sm text-red-600">
                                    {{ form.errors.order_id }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label for="product_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">product_id</label>
                                <select id="product_id" name="product_id" v-model="form.product_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option selected>Escoja un cliente</option>
                                    <option v-for="product in products" :value="product.id" :key="product.id">
                                        {{ product.name }}
                                    </option>
                                </select>

                                <div v-if="form.errors.product_id" class="text-sm text-red-600">
                                    {{ form.errors.product_id }}
                                </div>
                            </div>
                            <button type="submit"
                                class="text-white bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "
                                :disabled="form.processing" :class="{ 'opacity-25': form.processing }">
                                Editar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
