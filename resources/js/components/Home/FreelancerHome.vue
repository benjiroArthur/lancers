<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <!--<div class="card shadow">
                            <div class="card-header">
                                <div class="card-title text-bold">Recent Projects</div>
                                <div class="card-tools">
                                    <a class="text-lancer" href="#">View All <span class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>

                            <div class="card-body text-center">
                               <div class="mt-2 ml-5 pr-2">

                                   <a class="btn bg-lancer text-white">Browse Projects</a>
                               </div>
                            </div>
                        </div>-->
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="card-title text-bold">Recent Projects</div>
                                <div class="card-tools">
                                    <a class="text-lancer" href="#">View All <span class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>

                            <div class="card-body text-center">
                               <div class="mt-2 ml-5 pr-2">
                                   <i class="fas fa-clipboard-list pro-list-icon text-lancer"></i>
                                   <p>Start bidding now on projects that meet your skills</p>
                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                       A exercitationem labore nesciunt sequi velit. Aliquid minima
                                       necessitatibus recusandae! Alias autem corporis eos error labore libero odio quam quis vero voluptatem!</p>
                                   <a class="btn bg-lancer text-white">Browse Projects</a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="card-title text-bold">News Feed</div>
                            </div>

                            <div class="card-body text-center">
                                <div class="mt-2 ml-2 pr-2">
                                    <div class="row">
                                        <div class="col-2">
                                            <img :src="this.$parent.resource_path + '/lancers_logo.png'" alt="" class="img-fluid">
                                        </div>

                                        <div class="col-10">
                                            <p class="text-left">To help you get started, we would like to offer you a free upgrade to our Plus Membership for 30 days (valued at $9.95 USD). You'll receive these great benefits:</p>
                                           <div class="bg-lancer-light text-left p-4">
                                               <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                               <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                               <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                               <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                               <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                               <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                               <button class="btn btn-warning">Click To Claim For Free</button>
                                           </div>
                                            <p class="text-left">To help you get started, we would like to offer you a free upgrade to our Plus Membership for 30 days (valued at $9.95 USD). You'll receive these great benefits:</p>
                                        </div>
                                    </div>

                                </div>
                                <hr>
                                <div class="mt-2 ml-2 pr-2">
                                    <div class="row">
                                        <div class="col-2">
                                            <img :src="this.$parent.resource_path + '/lancers_logo.png'" alt="" class="img-fluid">
                                        </div>

                                        <div class="col-10">
                                            <p class="text-left">To help you get started, we would like to offer you a free upgrade to our Plus Membership for 30 days (valued at $9.95 USD). You'll receive these great benefits:</p>
                                            <div class="bg-lancer-light text-left p-4">
                                                <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <p><span class="fas fa-check"></span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                                <button class="btn btn-warning">Click To Claim For Free</button>
                                            </div>
                                            <p class="text-left">To help you get started, we would like to offer you a free upgrade to our Plus Membership for 30 days (valued at $9.95 USD). You'll receive these great benefits:</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header bg-lancer text-white text-bold">
                                <div class="card-title text-wrap">
                                    <p>Welcome Back</p>
                                    <p v-if="freelancer.userable.full_name !== null">{{this.freelancer.userable.full_name}}</p>
                                    <p>{{this.freelancer.email}}</p>
                                </div>
                                <div class="card-tools"></div>
                            </div>

                            <div class="card-body">
                                <p>Setup Your Account</p>
                                <p class="text-danger text-bold" v-if="freelancer.profile_updated === false"><a
                                    href="#" @click="goToProfile" class="text-danger">Please Update Your Profile</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="card-title"></div>
                                <div class="card-tools"></div>
                            </div>

                            <div class="card-body"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FreelancerHome",
        data(){
            return{
                freelancer:{},
                recentProjects:{},


            }
        },
        methods:{
            goToProfile(){
                window.location.assign('/profile')
            },
            getIndex(){
                axios
                .get('/data/user')
                .then((response) => {
                    this.freelancer = response.data;
                })
            },
            getRecentlProject(){
                axios
                    .get('/data/freelancer/recent-project/'+this.$parent.userId)
                    .then((response)=>{
                        this.recentProjects = response.data;
                    })
                    .catch()
            },

        },
        mounted() {
            this.getIndex();
            this.getRecentlProject();
        }
    }
</script>

<style lang="scss" scoped>
    .pro-list-icon {
        font-size: 150px !important;
        margin: 20px;
    }
</style>
