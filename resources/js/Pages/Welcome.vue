<template>
    <front-layout title="Dashboard">
        <template #header>
            
        </template>
    </front-layout>
</template>

<script>
    import { defineComponent } from 'vue'
    import FrontLayout from '@/Layouts/FrontLayout.vue'

    export default defineComponent({
        components: {
            FrontLayout
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    })
</script>

