<template>
    <app-layout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Products
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table-data :products="products"></table-data>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    
    import AppLayout from '@/Layouts/AppLayout.vue'
    import tableData from './TableData.vue'

    export default {
        components: {
            AppLayout,
            tableData
        },
        props: {
            products: Object,
        }
    }
</script>
