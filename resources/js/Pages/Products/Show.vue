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
                    <table-data :products="products.data" @showDetails="showDetails"></table-data>
                    <div class="p-3">
                        <pagination class="mt-6" :links="products.links" />
                    </div>
                </div>
            </div>
        </div>
        <details-modal :product="productSelected" @closeModal="closeModal"/>
    </app-layout>
</template>

<script>
    
    import AppLayout from '@/Layouts/AppLayout'
    import TableData from './TableData'
    import Pagination from '@/Components/Pagination'
    import DetailsModal from './DetailsModal'

    export default {
        data() {
            return {
                productSelected: {},
                showModal: false
            }
        },
        components: {
            AppLayout,
            TableData,
            Pagination,
            DetailsModal
        },
        props: {
            products: Object,
        },
        methods: {
            showDetails(product){
                this.showModal = true
                this.productSelected = product
            },
            closeModal(){
                this.productSelected = {}
            }
        }
    }
</script>
