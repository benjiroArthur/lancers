<template>
 <carousel :autoplay="true" :nav="true">
     <img :src="resource_path+item.src" class="img-fluid" alt="..."  :key="i">
 </carousel>
</template>

<script>
    import carousel from 'vue-owl-carousel'

    export default {
        data(){
            return{
                resource_path: '',
                items: [
                    {
                        src: '/banner/banner1.jpg'
                    },
                    {
                        src: '/banner/banner2.jpg'
                    },
                    {
                        src: '/banner/banner3.jpg'
                    },
                    {
                        src: '/banner/banner4.jpg'
                    }
                ],

            }
        },
        name: "HomeCarousel",
        components: {carousel},

        mounted() {
            this.resource_path = this.$parent.resource_path;
        }
    }
</script>

<style scoped>

</style>
