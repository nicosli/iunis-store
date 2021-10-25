<template>
    <front-layout title="Welcome">
        <template #content>
            <div id="content" class="bg-center bg-cover bg-no-repeat h-screen items-center justify-center flex flex-col" style="background-image: url(&quot;https://res.cloudinary.com/moodgiver/image/upload/v1623360651/jean-philippe-delberghe-1400011-unsplash_a8qscz.jpg&quot;);">
                <div id="moka-w1wgf" class="items-center justify-center w-full p-8 flex flex-col">
                    <div id="moka-ix3cs" class="bg-gray-400 items-center justify-center md:w-1/2 w-full shadow-md p-5 h-auto rounded-lg blur-3 bg-opacity-50 flex flex-col col-span-12">
                        <h4 class="w-48 border-t-4 border-solid border-red-500 h-20" id="moka-uuij0">
                        </h4>
                        <h4 class="text-orange-300    text-2xl" id="moka-8q3tt" style="font-family: Abel;">Some CTA description</h4>
                        <h2 class="text-gray-300   text-5xl text-center mt-2 mb-20" id="moka-cqg7a" style="font-family: &quot;Archivo Black&quot;;">Just sit down!</h2>
                    </div>
                </div>
            </div>            
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

