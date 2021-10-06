<template>
    <div>
        <!-- Email Update Modal -->
        <jet-dialog-modal :show="showModal" @close="closeModal()" >
            <template #title> 
                Product Details
            </template>

            <template #content>
                <div class="bg-white mb-5 border-b-2 border-fuchsia-600">
                    <nav class="flex flex-col sm:flex-row">
                        <button v-on:click="clickTab('description')" v-bind:class="[tabs.description ? 'text-blue-500 border-b-2 font-medium border-blue-500' : '', 'text-gray-600 py-2 px-4 block hover:text-blue-500 focus:outline-none']">
                            Description
                        </button>
                        <button v-on:click="clickTab('variants')" v-bind:class="[tabs.variants ? 'text-blue-500 border-b-2 font-medium border-blue-500' : '', 'text-gray-600 py-2 px-4 block hover:text-blue-500 focus:outline-none']">
                            Variants
                        </button>
                    </nav>
                </div>
                <section class="text-gray-600 body-font overflow-hidden" v-show="tabs.description">
                    <div class="container mx-auto">
                        <div class="lg:w-5/5 mx-auto flex flex-wrap">
                            <img alt="ecommerce" class="lg:w-2/5 w-full lg:h-auto h-64 object-cover object-center rounded" :src="product.image">
                            <div class="lg:w-3/5 w-full lg:pl-10 lg:mt-0">
                                <h2 class="text-sm title-font text-gray-500 tracking-widest">Name</h2>
                                <h1 class="text-gray-900 text-2xl title-font font-medium mb-1">{{product.name}}</h1>
                                <div class="flex mb-4">
                                    <span class="flex items-center">
                                        <svg v-for="star in product.stars" :key="star" fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 text-indigo-500" viewBox="0 0 24 24">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"></path>
                                        </svg>
                                        <span class="text-gray-600 ml-3">{{product.reviews}} Reviews</span>
                                    </span>
                                </div>
                                <div class="leading-relaxed">{{product.description}}</div>
                                <div class="mt-5" v-if="product.provider">
                                    <div class="text-sm title-font text-gray-500 tracking-widest">PROVIDER </div>
                                    {{product.provider.name}}
                                </div>
                            </div>
                        </div>
                        <div class="flex mt-6 items-center pb-5 border-b-2 border-gray-100 mb-5">
                            <div class="flex">
                                <span class="mr-3">Color</span>
                                <button class="border-2 border-gray-300 rounded-full w-6 h-6 focus:outline-none"></button>
                                <button class="border-2 border-gray-300 ml-1 bg-gray-700 rounded-full w-6 h-6 focus:outline-none"></button>
                                <button class="border-2 border-gray-300 ml-1 bg-indigo-500 rounded-full w-6 h-6 focus:outline-none"></button>
                            </div>
                            <div class="flex ml-6 items-center">
                                <span class="mr-3">Size</span>
                                <span class="mr-3">L</span>
                                <span class="mr-3">G</span>
                                <span class="mr-3">M</span>
                            </div>
                        </div>
                        <div class="flex">
                            <div>
                                <div>Net price</div>
                                <div class="title-font font-medium text-2xl text-gray-900">${{product.price}}</div>
                            </div>
                            <div class="ml-10">
                                <div>Public price</div>
                                <div class="title-font font-medium text-2xl text-gray-900">${{product.public_price}}</div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="text-gray-600 body-font overflow-hidden" v-show="tabs.variants">
                    <div class="container mx-auto">
                        <div class="flex flex-wrap lg:w-5/5 sm:mx-auto sm:mb-2 -mx-2">
                            <div v-for="(variant, key) in product.variants" :key="key" class="p-2 sm:w-1/2 w-full">
                                <div class="bg-gray-100 rounded flex p-4 items-center">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                                        <path d="M22 4L12 14.01l-3-3"></path>
                                    </svg>
                                    <span class="title-font font-medium">{{variant.name}}</span>                                    
                                </div>
                                <div class="text-gray-500 text-sm p-4 bg-gray-200">
                                    <strong>Description</strong> 
                                    <div class="truncate ...">
                                        {{variant.description}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>     
            </template>

            <template #footer>
                <jet-secondary-button v-on:click="closeModal()">
                    Close
                </jet-secondary-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>

    import JetSecondaryButton from "@/Jetstream/SecondaryButton"
    import JetDialogModal from "@/Jetstream/DialogModal"
    var { isEmpty } = require('lodash');

    export default {
        components: {
            JetSecondaryButton,
            JetDialogModal,
            isEmpty
        },
        data() {
            return {
                showModal: false,
                tabs:{
                    description: true,
                    variants: false
                }
            }
        },
        props: {
            product: {
                type: Object,
                default: false,
                required: true
            }
        },
        methods: {
            closeModal(){
                this.showModal = false
                this.$emit('closeModal')
            },
            clickTab(tab){
                if(tab == 'description'){
                    this.tabs.description = true
                    this.tabs.variants = false
                } else {
                    this.tabs.description = false
                    this.tabs.variants = true
                }
            }
        },
        watch: {
            product: function(n, o){
                if( ! isEmpty(n)){
                    this.showModal = true
                    this.tabs.description = true
                    this.tabs.variants = false
                }
            }
        }
    }
</script>
