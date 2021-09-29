<template>
    <div>
        <jet-dialog-modal :show="showModal" @close="closeModal">
            <template #title>
                Edit Product
            </template>

            <template #content>
                <form class="w-full">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <jet-label for="name" value="Name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="name"
                                type="text"
                                class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.name"
                                autocomplete="off"
                            />
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <jet-label for="barcode" value="Barcode" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="barcode"
                                type="text"
                                class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.barcode"
                                autocomplete="off"
                            />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <jet-label for="description" value="Description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <textarea v-model="form.description" class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="description" rows="5" cols="50"></textarea>
                            <p class="text-gray-600 text-xs italic">Make it as long and as crazy as you'd like</p>
                        </div>
                    </div>
                    <div class="-mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <jet-label for="image" value="Image" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="image"
                                type="text"
                                class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.image"
                                autocomplete="off"
                            />
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <jet-label for="price" value="Price" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="price"
                                type="text"
                                class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.price"
                                autocomplete="off"
                            />
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <jet-label for="public_price" value="Public Price" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="public_price"
                                type="text"
                                class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.public_price"
                                autocomplete="off"
                            />
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <jet-label for="stock" value="Stock" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="stock"
                                type="text"
                                class="block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                v-model="form.stock"
                                autocomplete="off"
                            />
                        </div>
                    </div>
                </form>
            </template>

            <template #footer>
                <jet-secondary-button v-on:click="closeModal">
                Cancel
                </jet-secondary-button>

                <jet-button
                    class="ml-2"
                    v-on:click="proceedToSave"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    Save Product
                </jet-button>
            </template>
        </jet-dialog-modal>
    </div>
</template>

<script>

    import { isEmpty } from 'lodash'
    import JetInput from "@/Jetstream/Input"
    import JetLabel from "@/Jetstream/Label"
    import JetButton from '@/Jetstream/Button'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'
    
    export default {
        components: {
            JetButton,
            JetInput,
            JetLabel,
            JetDialogModal,
            JetSecondaryButton
        },
        data() {
            return {
                form: {},
                showModal: false
            }
        },
        props: {
            product:{
                type: Object,
                required: true,
            }
        },
        methods: {
            closeModal(){
                this.showModal = false
                this.$emit('closeModal')
            },
            proceedToSave(){
                this.form.post(route('product.edit', {
                    product: this.product.id
                }), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal()
                })
            }
        },
        watch: {
            product: function(n, o){
                if( ! isEmpty(n) ){
                    
                    this.form = this.$inertia.form({
                        name: this.product.name,
                        barcode: this.product.barcode,
                        description: this.product.description,
                        image: this.product.image,
                        price: this.product.price,
                        public_price: this.product.public_price,
                        stock: this.product.stock,
                    })

                    this.showModal = true
                }
            }
        }
    }

</script>