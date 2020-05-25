<template>
    <div class="container-fluid">
        <!--<div class="jumbotron jumbotron-fluid welcome-jumbo">
            <div class="container justify-content-center">
                <h2 class="display-4 text-center text-dark">Welcome To Lancers</h2>
                <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto, ducimus eius id iure odit rem ut voluptatem! Esse est excepturi facere illo perferendis quia reprehenderit sunt unde! Quibusdam, soluta.</p>
                <div class="row justify-content-center">
                    <button class="btn btn-success text-white bg-lancer-dark m-2">Become a Freelancer</button>
                    <button class="btn btn-success text-white bg-lancer-dark m-2">Become a Project Manager</button>
                </div>
            </div>

        </div>-->
        <v-carousel :show-arrows=false
                    autoplay="autoplay">
            <v-carousel-item
                v-for="(item,i) in items"
                :key="i"
                :src="resource_path+item.src"
            ></v-carousel-item>
        </v-carousel>


        <h2 class="text-center mt-3 mb-3 text-bold text-dark">POPULAR PROJECTS</h2>
        <div class="row">
            <!--<VueSlickCarousel
                v-bind="settings" >
                <img :src="resource_path+'/do_it_your_self/laravel.jpg'" alt="Image" class="img-fluid">
                <img :src="resource_path+'/do_it_your_self/laravel.jpg'" alt="Image" class="img-fluid">
                <img :src="resource_path+'/do_it_your_self/digital.jpg'" alt="Image" class="img-fluid">
                <img :src="resource_path+'/do_it_your_self/digital.jpg'" alt="Image" class="img-fluid">
                &lt;!&ndash;<div v-for="(popular_project, index) in this.popular_projects"  class="col-md-6 col-lg-2" :key="index">

                    <v-card class="cat-card p-2 shadow">
                        <v-card-title primary-title class="m-3 text-center">
                            <div>
                                <h4 class="headline mb-2 text-bold">{{popular_project.project_title}}</h4>
                                <p> {{ popular_project.description | descFilter }} </p>
                            </div>
                        </v-card-title>
                        <v-img class="m-3"
                               :src="popular_project.image"
                               alt="image"
                        ></v-img>

                    </v-card>
                </div>&ndash;&gt;
            </VueSlickCarousel>-->
            <VueSlickCarousel v-if="popular_projects.length > 0"
                              v-bind="settings"

            >
                <div v-for="(project, index) in popular_projects" :key="index">
                    <img :src="project.image" alt="dsfds">
                </div>

            </VueSlickCarousel>

            <!--<div v-for="popular_project in this.popular_projects"  class="col-md-6 col-lg-2">

                <v-card class="cat-card p-2 shadow">
                    <v-card-title primary-title class="m-3 text-center">
                        <div>
                            <h4 class="headline mb-2 text-bold">{{popular_project.project_title}}</h4>
                            <p> {{ popular_project.description | descFilter }} </p>
                        </div>
                    </v-card-title>
                    <v-img class="m-3"
                           :src="popular_project.image"
                           alt="image"
                    ></v-img>

                </v-card>
            </div>-->
        </div>

        <h2 class="text-center mt-3 mb-3 text-bold text-dark">RECENTLY VIEWED PROJECTS</h2>

        <div class="row justify-content-center">
           <div class="col-md-10 img-holder">
               <img :src="this.resource_path + '/howToGetStarted.gif'" alt="" class="img-fluid">
           </div>
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
        name: "Home",
        data(){
            return{
                projects: {},
                popular_projects: {},
                recent_projects: {},
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
                    dots: true,
                    autoplay: true,
                    slidesToShow: 6,
                    arrow: true,
                    dotsClass: "slick-dots",
                    infinite: true,
                    centerMode: true,
                    centerPadding: "20px",
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
            }
        },
        filters:{
            descFilter(value){
                let val = value.slice(0, 20);
                return value.length < 20 ? value : val + '...'
            }
        },
        mounted() {
            this.resource_path = this.$parent.resource_path;
            this.getProject();
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
    .welcome-jumbo{
       /* background: url("/images/welcome_banner.jpg") no-repeat center fixed;*/
        background-size: cover;

    }
</style>
