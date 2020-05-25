<template>
    <VueSlickCarousel
        v-bind="settings" >
        <img v-for="(item,i) in items" :src="item.src" class="img-fluid" alt="..."  :key="i">
    </VueSlickCarousel>
</template>

<script>
    export default {
        name: "Slider",

        data(){
            return{
                resource_path:'',
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
                settings: {
                    dots: true,
                    autoplay: true,
                    slidesToShow: 2,
                    arrow: true,
                    dotsClass: "slick-dots",
                    infinite: true,
                    centerMode: true,
                    centerPadding: "20px",
                },
            }
        },
        created() {
            this.resource_path = this.$parent.resource_path;
        }
    }
</script>

<style scoped>

</style>

