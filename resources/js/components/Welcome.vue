<template>
    <div class="container-fluid">
        <VueSlickCarousel v-bind="settings" >
            <img v-for="(item,i) in items" :src="resource_path+item.src" class="img-fluid" alt="..."  :key="i">
        </VueSlickCarousel>


        <div id = "myCarousel" class = "carousel slide mb-5" data-action="carousel">
            <!--<ol class = "carousel-indicators">
                <li data-target = "#myCarousel" data-slide-to = "0" class="active"></li>
                <li data-target = "#myCarousel" data-slide-to = "1"></li>
                <li data-target = "#myCarousel" data-slide-to = "2"></li>
                <li data-target = "#myCarousel" data-slide-to = "3"></li>
            </ol>-->


                <div class = "carousel-item active">
                    <svg class = "bd-placeholder-img" width="100%" height="100%" xmlns = "" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><rect width="100%" height="100%" fill="#777"/> </svg>
                </div>
                <div class = "container">
                    <div class = "carousel-caption text-lg-left">
                        <h1>HIRE THE BEST FREELANCERS<span class="badge badge-secondary"></span></h1>
                        <h1>FOR ANY IDEAS YOU<span class="badge badge-secondary"></span></h1>
                        <h1>HAVE IN MIND<span class="badge badge-secondary"></span></h1>
                        <button type="button" class="btn btn-outline-success mr-0 btn-lg active" href="#">Hire A Freelancer</button>
                        <button type="button" class="btn btn-outline-success mr-0 btn-lg active" href="#">Earn Money Freelancing</button>
                    </div>
                </div>
        </div>
        <hr>


        <!--<h2 class = "text-centre mt-3 text-bold text-dark mt-5 swift-h2">NEED WORK DONE?</h2>

        <div class="row">
            <div class="col-md-3">
                <img :src="resource_path+'/do_it_your_self/post_job.jpg'" alt="Image" class="img-fluid img-circle">
                <div class="card-text mb-2 text-center ">
                    <h3 class="text-bold">Post a Job</h3><br>
                    <h5>Easy way to get your projects or ideas become a reality. Post a job and get it done to your best satisfaction.</h5>
                </div>
            </div>
            <div class="col-md-3">
                <img :src="resource_path+'/do_it_your_self/hire_freelancer.jpg'" alt="Image" class="img-fluid img-circle">
                <div class="card-text mb-2 text-center ">
                <h3 class="text-bold">Choose A Freelancer</h3><br>
                <h5>
                    You get the option to choose a particular freelancer to execute your project for you. The experience of freelancers span in many fields from
                    Web Development, Mobile Applications, Graphic Design etc.
                </h5>
                </div>
            </div>
            <div class="col-md-3">
                <img :src="resource_path+'/do_it_your_self/safe_payment.jpg'" alt="Image" class="img-fluid img-circle">
                <div class="card-text mb-2 text-center ">
                    <h3 class="text-bold">Secure Payment</h3><br>
                    <h5>
                        We have a secured payment platform that works seamlessly with easy steps and process to get freelancers paid.
                    </h5>
                </div>
            </div>
            <div class="col-md-3">
                <img :src="resource_path+'/do_it_your_self/safe_payment.jpg'" alt="Image" class="img-fluid img-circle">
                <div class="card-text mb-2 text-center ">
                    <h3 class="text-bold">Secure Payment</h3><br>
                    <h5>
                        We have a secured payment platform that works seamlessly with easy steps and process to get freelancers paid.
                    </h5>
                </div>
            </div>
        </div>-->

        <h2 class = "text-centre mt-3 text-bold text-dark mt-5 swift-h2" >What Is Great About Lancers </h2>
        <div class = "row">
            <div class = "col-md-4 text-center ">
                <h2 class="text-dark"> <a class="align-center " ><i class="fas fa-images"></i> Browse Jobs</a></h2>
                <p>Freelancers and potential clients have the luxury to skim through lots of available jobs to see which one will best fit their skills and needs respectively.
                    Lancers has millions of jobs ready to be executed, jump right into it!</p>
            </div>
            <div class = "col-md-4 text-center ">
                <h2 class="text-dark" ><a class="align-center"><i class="fas fa-money-bill-alt"></i> Secure Payment</a></h2>
                <p>Payment is secured and trustworthy. Clients can easily pay work done by Freelancers in a secured manner without having any issues.
                    Freelancers are assured of getting paid after doing a good job</p>
            </div>
            <div class = "col-md-4 text-center ">
                <h2 class="text-dark"><a class="align-center"><i class="fas fa-user-circle"></i> View Portfolios</a></h2>
                <p>Lancers has the best professionals who can get your work done to the best capacity.
                    Find professionals you can trust by browsing their samples of previous work and reading their profile reviews.</p>
            </div>
        </div>
        <div class = "row">
            <div class = "col-md-4 text-center ">
                <h2 class="text-dark"><a class="align-center"><i class="fas fa-thumbtack"></i> Job Tracking</a></h2>
                <p>Lancers believe in information and how the progress of each projects unfold. Clients get to see the progress of their projects as Freelancers are working on it.
                    It creates an environment which makes client feel comfortable about getting their work done.</p>
            </div>
            <div class = "col-md-4 text-center ">
                <h2 class="text-dark"><a class="align-center"><i class="fas fa-comments"></i> Live Chat</a></h2>
                <p>Tracking of jobs doesn't end the process but rather initiates you into Live Chat.
                    You can live chat with your freelancers to get constant updates on the progress of your work as well.
                    Keep up-to-date with the progress of your work being done.</p>
            </div>
            <div class = "col-md-4 text-center ">
                <h2 class="text-dark"><a class="align-center"><i class="fas fa-headset"></i> 24/7 Support</a></h2>
                <p>Our support system is top-notch. We are available 24/7 to help users get their issues resolved.
                    We have the best customer service out there. Don't hesitate to reach us for any kind of help as we are always on standby to help.</p>
            </div>
        </div>
        <hr>

        <h2 class="text-center mt-3 mb-3 text-bold text-dark swift-h2 mt-5">MOST POPULAR JOB CATEGORIES</h2>
        <div v-if="categories.length > 0" class="row">

            <div v-for="category in this.categories"  class="col-md-6 col-lg-3">

                <v-card class="cat-card p-2 shadow">
                    <v-card-title primary-title class="m-3 text-center">
                        <div>
                            <h4 class="headline mb-2 text-bold">{{category.name}}</h4>
                            <p> {{ category.description }} </p>
                            <a class="btn btn-outline-success mr-0" href="#" target="_blank">Get Jobs</a>
                        </div>
                    </v-card-title>
                    <v-img class="m-3"
                           :src="category.image_path"
                    ></v-img>

                </v-card>
            </div>
        </div>

        <h2 class="text-center mt-3 mb-3 text-bold text-dark pa-5 swift-h2 mt-5">DO IT YOURSELF</h2>

        <div class="row">
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-image m-3 img-fluid cat-card">
                        <img :src="resource_path+'/do_it_your_self/laravel.jpg'" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-title mt-3">Build A Basic Laravel Website</div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            This tutorial gives an overview of Laravel and walks beginners through making a simple Laravel website.
                        </div>
                        <a class="btn btn-outline-success mr-0" href="https://medium.com/@assertchris/laravel-basic-site-d5790d77367d" target="_blank">Explore</a>
                    </div>

                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-image m-3 img-fluid cat-card">
                        <img :src="resource_path+'/do_it_your_self/digital.jpg'" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-title mt-3">How To Make Digital Paintings</div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            These resources will guid you on how to make professional digital paintings, Explore and learn more.
                        </div>
                        <a class="btn btn-outline-success mr-0" href="https://paintable.cc/digital-painting-the-ultimate-beginners-guide/" target="_blank">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-image m-3 img-fluid cat-card">
                        <img :src="resource_path+'/do_it_your_self/bootstrap.jpg'" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-title mt-3">Bootstrap Collections</div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            Get all your bootstrap icons, templates, themes, and documentation from this ultimate bootstrap resource.
                        </div>
                        <a class="btn btn-outline-success mr-0" href="https://getbootstrap.com/" target="_blank">Explore</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-center">
                    <div class="card-image m-3 img-fluid cat-card">
                        <img :src="resource_path+'/do_it_your_self/data-entry.jpg'" alt="Image" class="img-fluid">
                    </div>
                    <div class="card-title mt-3">Data Entry</div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            Find an Amazing New Job Today.Job Alerts Sent to Your Inbox. Find Online Jobs Available Now for Immediate Placement.
                        </div>
                        <a class="btn btn-outline-success mr-0" href="https://www.dreamhomebasedwork.com/online-data-entry-jobs-2/" target="_blank">Explore</a>
                    </div>
                </div>
            </div>
        </div>


        <h2 class="text-center mt-3 mb-3 text-bold text-dark">HOW TO GET STARTED</h2>

        <div class="row img-fluid justify-content-center ml-1">
            <img :src="this.resource_path + '/howToGetStarted.gif'" alt="" class="img-fluid">
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

    hr {
        margin-top: 1rem;
        margin-bottom: 1rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, 0.1);
    }

</style>
<!--
STRIPE_KEY=pk_test_ysYG2YLE6Dlfb2WptP1IYcuV
STRIPE_SECRET=sk_test_m52rQlAWfPQK8k1NTQCOXSrA
-->
