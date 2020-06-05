<template>
    <div class="container-fluid">
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image--><img class="masthead-avatar mb-5" src="assets/img/avataaars.svg" alt="">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading mb-0">START BOOTSTRAP</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Masthead Subheading--><div class
                <p class="pre-wrap masthead-subheading font-weight-light mb-0">Graphic Artist - Web Designer - Illustrator</p>
            </div>
        </header>

        <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <div class="text-center">
                    <h2 class="page-section-heading text-secondary mb-0 d-inline-block">JOB CATEGORIES</h2>
                </div>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Items-->
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal0">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div><img class="img-fluid" src="assets/img/portfolio/cabin.png" alt="Log Cabin"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal1">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div><img class="img-fluid" src="assets/img/portfolio/cake.png" alt="Tasty Cake"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal2">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div><img class="img-fluid" src="assets/img/portfolio/circus.png" alt="Circus Tent"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal3">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div><img class="img-fluid" src="assets/img/portfolio/game.png" alt="Controller"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal4">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div><img class="img-fluid" src="assets/img/portfolio/safe.png" alt="Locked Safe"/>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-5">
                        <div class="portfolio-item mx-auto" data-toggle="modal" data-target="#portfolioModal5">
                            <div class="portfolio-item-caption d-flex align-items-center justify-content-center h-100 w-100">
                                <div class="portfolio-item-caption-content text-center text-white"><i class="fas fa-plus fa-3x"></i></div>
                            </div><img class="img-fluid" src="assets/img/portfolio/submarine.png" alt="Submarine"/>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- Commenting this whole block out --

        <h2 class = "text-centre mt-3 text-bold text-dark">NEED WORK DONE?</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-image m-3 img-fluid cat-card">
                        <img :src="resource_path+'/do_it_your_self/post_job.jpg'" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-title mt-3"><strong> Post A Job</strong></div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            Easy way to get your projects or ideas become a reality. Post a job and get it done to your best satisfaction.
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-image m-3 img-fluid cat-card">
                        <img :src="resource_path+'/do_it_your_self/hire_freelancer.jpg'" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-title mt-3"><strong>Choose A Freelancer</strong></div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            You get the option to choose a particular freelancer to execute your project for you. The experience of freelancers span in many fields from
                            Web Development, Mobile Applications, Graphic Design etc.
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-image m-3 img-fluid cat-card">
                        <img :src="resource_path+'/do_it_your_self/safe_payment.jpg'" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-title mt-3"><strong>Secure Payment</strong></div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            We have a secured payment platform that works seamlessly with easy steps and process to get freelancers paid.
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <h2 class = "text-centre mt-3 text-bold text-dark">What Is Great About lancers </h2>

        <div class = "row">
              <div class = "col-md-3">
                    <div class="card text-white bg-primary mb-3" style="max-width: 16rem;">
                        <div class="card-header"><strong>Browse Portfolios</strong> </div>
                        <div class="card-body">

                            <h5 class="card-text">Find professionals you can trust by browsing their samples of previous work and reading their profile reviews.</h5>
                        </div>
                    </div>
              </div>

            <div class = "col-md-3">
                    <div class="card text-white bg-secondary mb-3" style="max-width: 16rem;">
                        <div class="card-header"><strong>Track Progress</strong> </div>
                        <div class="card-body">

                            <h5 class="card-text">Keep up-to-date and on-the-go with our time tracker, and mobile app.</h5>
                        </div>
                    </div>
            </div>

            <div class = "col-md-3">
                <div class="card text-white bg-primary mb-3" style="max-width: 16rem;">
                    <div class="card-header"><strong>Live Chat</strong> </div>
                    <div class="card-body">
                        <h5 class="card-text">You can live chat with your freelancers to get constant updates on the progress of your work.</h5>
                    </div>
                </div>
            </div>

            <div class = "col-md-3">
                <div class="card text-white bg-secondary mb-3" style="max-width: 16rem;">
                    <div class="card-header"><strong>Pay For Quality</strong> </div>
                    <div class="card-body">
                        <h5 class="card-text"> Pay for work when it has been completed and you're 100% satisfied. </h5>
                    </div>
                </div>
            </div>
        </div>


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
        </div> -->

        <!-- End of comments -->

<!--        <div class="test-div">-->

<!--        </div>-->


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
    /*.test-div{*/
    /*    !*min-height: 400px;*!*/
    /*}*/
    .cat-card{
        border: 1px solid #44f631;
        & p{
            font-size: 14px;
        }
        font-family: "Roboto", sans-serif;
    }
</style>
