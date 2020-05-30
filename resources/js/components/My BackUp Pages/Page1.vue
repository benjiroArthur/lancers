<template>
    <div class="container-fluid">
        <VueSlickCarousel
            v-bind="settings" >
            <img v-for="(item,i) in items" :src="resource_path+item.src" class="img-fluid" alt="..."  :key="i">
        </VueSlickCarousel>




        <h2 class="text-center mt-3 mb-3 text-bold text-dark">POPULAR PROJECTS</h2>

        <VueSlickCarousel v-if="popular_projects.length > 0"
                          v-bind="options"
        >


            <v-card class="p-2 cat-card shadow m-2" v-for="(project, i) in popular_projects" :key="i">
                <v-card-title primary-title class="m-3 text-center">
                    <div>
                        <h5 class="headline mb-2 text-bold"> <span class="fas fa-user-circle bg-lancer text-white"></span> {{project.project_title | titleFilter}}</h5>
                        <p> {{ project.description | descFilter }} </p>
                    </div>
                </v-card-title>
                <v-img class="m-3"
                       :src="project.image"
                       alt="image"
                ></v-img>

            </v-card>

        </VueSlickCarousel>


        <h2 class="text-center mt-3 mb-3 text-bold text-dark">RECENTLY VIEWED PROJECTS</h2>

        <VueSlickCarousel v-if="recent_projects.length > 0"
                          v-bind="options"
        >
            <!--<img v-for="(project, i) in popular_projects" :key="i" :src="project.image" alt="..." class="img-fluid">-->

            <v-card class="p-2 cat-card shadow mx-2" v-for="(project, i) in recent_projects" :key="i">
                <v-card-title primary-title class="m-3 text-center">
                    <div>
                        <h5 class="headline mb-2 text-bold"><span class="fas fa-user-circle bg-lancer text-white"></span> {{project.project_title | titleFilter}}</h5>
                        <span class="pull-right">{{project.from_now}}</span>
                        <p> {{ project.description | descFilter }} </p>
                    </div>
                </v-card-title>
                <v-img class="m-3"
                       :src="project.image"
                       alt="image"
                ></v-img>

            </v-card>

        </VueSlickCarousel>

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
        name: "Page1",
        data(){
            return{
                show: false,
                projects: {},
                popular_projects: [],
                recent_projects: [],
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
                options: {
                    dots: false,
                    autoplay: true,
                    slidesToShow: 5,
                    arrow: true,
                    dotsClass: "slick-dots",
                    infinite: true,
                    centerMode: true,
                    centerPadding: "20px",
                    responsive: [
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3,
                                infinite: true,
                                dots: true
                            }
                        },
                        {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 2
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                centerMode: true,
                            }
                        }

                    ]
                },
            }
        },
        methods:{
            getProject(){
                axios
                    .get('/data/project')
                    .then((response)=>{
                        this.projects = response.data;
                        this.popular_projects = this.projects.popularProject;
                        this.recent_projects = this.projects.recently;
                    })
                    .catch()
            },

            next() {
                this.$refs.slick.next();
            },

            prev() {
                this.$refs.slick.prev();
            },

            reInit() {
                // Helpful if you have to deal with v-for to update dynamic lists
                this.$nextTick(() => {
                    this.$refs.slick.reSlick();
                });
            },
        },
        filters:{
            descFilter(value){
                let len = 20;
                let val = value.slice(0, len);
                return value.length < len ? value : val + '...'
            },

            titleFilter(value){
                let len = 20;
                let val = value.slice(0, len);
                return value.length < len ? value : val + '...'
            }
        },
        mounted() {
            this.resource_path = this.$parent.resource_path;
            this.getProject();
        }
    }
</script>

<style scoped>

</style>
