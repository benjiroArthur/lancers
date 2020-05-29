<template>
    <div class="container-fluid">
        <VueSlickCarousel
            v-bind="settings" >
            <img v-for="(item,i) in items" :src="resource_path+item.src" class="img-fluid" alt="..."  :key="i">
        </VueSlickCarousel>


        <h2 class="text-center mt-3 mb-3 text-bold text-dark">OUR PROJECT CATEGORIES</h2>
        <div v-if="categories.length > 0" class="row">

            <div v-for="category in this.categories"  class="col-md-6 col-lg-3">

                <v-card class="cat-card p-2 shadow">
                    <v-card-title primary-title class="m-3 text-center">
                        <div>
                            <h4 class="headline mb-2 text-bold">{{category.name}}</h4>
                            <p> {{ category.description }} </p>
                        </div>
                    </v-card-title>
                    <v-img class="m-3"
                        :src="category.image_path"
                    ></v-img>

                </v-card>
            </div>
        </div>

        <h2 class="text-center mt-3 mb-3 text-bold text-dark">HOW TO GET STARTED</h2>

        <div class="row img-fluid">
            <img :src="this.resource_path + '/howToGetStarted.gif'" alt="" class="img-fluid">
        </div>

        <h2 class="text-center mt-3 mb-3 text-bold text-dark">DO IT YOURSELF</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-image m-3 img-fluid cat-card">
                        <img :src="resource_path+'/do_it_your_self/laravel.jpg'" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-title mt-3">Build a basic Laravel website</div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            This tutorial gives an overview of Laravel and walks beginners through making a simple Laravel website.
                        </div>
                        <a class="btn btn-success mr-0" href="https://medium.com/@assertchris/laravel-basic-site-d5790d77367d" target="_blank">Explore >> </a>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-image m-3 img-fluid cat-card">
                        <img :src="resource_path+'/do_it_your_self/digital.jpg'" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-title mt-3">How to make digital paintings</div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            These resources will guid you on how to make professional digital paintings, Explore and learn more.
                        </div>
                        <a class="btn btn-success mr-0" href="https://paintable.cc/digital-painting-the-ultimate-beginners-guide/" target="_blank">Explore >> </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-image m-3 img-fluid cat-card">
                        <img :src="resource_path+'/do_it_your_self/bootstrap.jpg'" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-title mt-3">Bootstrap Collections</div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            Get all your bootstrap icons, templates, themes, and documentation from this ultimate bootstrap resource.
                        </div>
                        <a class="btn btn-success mr-0" href="https://getbootstrap.com/" target="_blank">Explore >> </a>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<script>
    export default {
        name: "Welcome",
        data(){
            return{
                categories: {},
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
                settings: {
                    dots: false,
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
        methods:{
            getCat(){
                axios
                .get('/data/job-category')
                .then((response)=>{
                    this.categories = response.data;
                })
                .catch()
            }
        },
        mounted() {
            this.resource_path = this.$parent.resource_path;
            this.getCat();
        }
    }
</script>

<style lang="scss" scoped>
    .cat-card{
        border: 1px solid #44f631;
        & p{
            font-size: 14px;
        }
        font-family: "Roboto", sans-serif;
    }
</style>
