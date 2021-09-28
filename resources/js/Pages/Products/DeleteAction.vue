<template>
    <div>
        <jet-dialog-modal :show="showConfirm" @close="closeConfirm">
        <template #title>
            Cancel Product
        </template>

        <template #content>
            ¿Estas seguro que quieres eliminar el producto <strong>{{product.name}}</strong>?
        </template>

        <template #footer>
            <jet-secondary-button v-on:click="closeConfirm">
            Cancel
            </jet-secondary-button>

            <jet-button
                class="ml-2"
                v-on:click="proceedToDelete"
                :class="{ 'opacity-25': form.processing }"
                :disabled="form.processing"
            >
                Confirm Delete Product
            </jet-button>
        </template>
        </jet-dialog-modal>
    </div>
</template>

<script>
    
    import { isEmpty } from 'lodash'
    import JetButton from '@/Jetstream/Button'
    import JetDialogModal from '@/Jetstream/DialogModal'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        components: {
            isEmpty,
            JetButton,
            JetDialogModal,
            JetSecondaryButton
        },
        data() {
            return {
                showConfirm: false,
                form: this.$inertia.form()
            }
        },
        props: {
            product: {
                type: Object,
                required: true
            }
        },
        methods: {
            closeConfirm(){
                this.showConfirm = false
                this.$emit('closeConfirm')
            },
            proceedToDelete(){
                this.form.post(route('product.delete', {
                    product: this.product.id
                }), {
                    preserveScroll: true,
                    onSuccess: () => this.closeConfirm()
                })
            }
        },
        watch: {
            product: function(n, o){
                if( ! isEmpty(n) ){
                    this.showConfirm = true
                }
            }
        }
    }

</script>