<template>
    <div>
        <jet-dialog-modal :show="showModal" @close="closeModal">
            <template #title>
                Add Product
            </template>

            <template #content>
                <form class="w-full">
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                            <jet-label for="name" value="Name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="name"
                                type="text"
                                :class="[$page.props.errors.name ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.name"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.name">{{ $page.props.errors.name }}</div>
                        </div>
                        <div class="w-full md:w-1/2 px-3">
                            <jet-label for="barcode" value="Barcode" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="barcode"
                                type="text"
                                :class="[$page.props.errors.barcode ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.barcode"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.barcode">{{ $page.props.errors.barcode }}</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <jet-label for="description" value="Description" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <textarea v-model="form.description" 
                            :class="[$page.props.errors.description ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                            name="description" rows="5" cols="50"></textarea>
                            <div class="text-red-500" v-if="$page.props.errors.description">{{ $page.props.errors.description }}</div>
                        </div>
                    </div>
                    <div class="-mx-3 mb-6">
                        <div class="w-full px-3 mb-6 md:mb-0">
                            <jet-label for="image" value="Image" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="image"
                                type="text"
                                :class="[$page.props.errors.image ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.image"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.image">{{ $page.props.errors.image }}</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <jet-label for="price" value="Price" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="price"
                                type="number"
                                :class="[$page.props.errors.price ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.price"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.price">{{ $page.props.errors.price }}</div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <jet-label for="public_price" value="Public Price" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="public_price"
                                type="number"
                                :class="[$page.props.errors.public_price ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.public_price"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.public_price">{{ $page.props.errors.public_price }}</div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <jet-label for="stock" value="Stock" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="stock"
                                type="number"
                                :class="[$page.props.errors.stock ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.stock"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.stock">{{ $page.props.errors.stock }}</div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2 mt-6">
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <jet-label for="category" value="Category" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="category"
                                type="number"
                                :class="[$page.props.errors.category ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.category"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.category">{{ $page.props.errors.category }}</div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <jet-label for="reviews" value="Reviews" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="reviews"
                                type="number"
                                :class="[$page.props.errors.reviews ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.reviews"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.reviews">{{ $page.props.errors.reviews }}</div>
                        </div>
                        <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <jet-label for="stars" value="Stars" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"/>
                            <jet-input
                                id="stars"
                                type="number"
                                :class="[$page.props.errors.stars ? 'border border-red-300' : 'border border-gray-200', 'block w-full bg-gray-100 text-gray-700 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500']"
                                v-model="form.stars"
                                autocomplete="off"
                            />
                            <div class="text-red-500" v-if="$page.props.errors.stars">{{ $page.props.errors.stars }}</div>
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
                form: this.$inertia.form({
                    name: '',
                    barcode: '',
                    description: '',
                    image: '',
                    price: '',
                    public_price: '',
                    stock: '',
                    reviews: '',
                    stars: '',
                    category: '',
                }),
            }
        },
        props: {
            showModal:{
                type: Boolean,
                required: true,
            }
        },
        methods: {
            closeModal(){
                this.$emit('closeModal')
            },
            proceedToSave(){
                this.form.post(route('product.add'), {
                    preserveScroll: true,
                    onSuccess: () => this.closeModal()
                })
            }
        }
    }

</script>