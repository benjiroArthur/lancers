<template>
    <div class="container-fluid top-bg-img">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <div class="card-title text-bold">Recent Projects</div>
                                    <div class="card-tools">
                                        <a class="text-lancer" @click="postjobs" href="#">View All <span class="fas fa-arrow-right"></span></a>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="mt-2 ml-5 pr-2">
                                        <div v-if="latestProject.length > 0">
                                            <div v-for="(project, i) in latestProject" :key="i" class="col-12">
                                                <div class="card m-0">
                                                    <div class="card-body m-1 p-1">
                                                        <div class="row">
                                                            <div class="col-9">
                                                                <h6 class="m-0">{{project.project_title}}</h6>
                                                                <small class="p00 m-0">{{project.description}}</small><br>
                                                            </div>
                                                            <div class="col-3 text-right">
                                                                <small class="p00 m-0">$ {{project.project_cost}}.00</small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <p v-else class="text-bold">Millions of amazing freelancers are waiting to turn your dreams into reality.</p>
                                        <div class="m-3">
                                            <a class="btn btn-outline-success text-dark text-bold border-dark m-3 text-center" href="#" @click="postjobs">Post a Job</a>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="row">
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
                                                <p class="text-left">Welcome to Lancers. This is where you'll receive updates for project and account activity. Select an option below to get started. </p>
                                                <button class="btn btn-light">Post a Project</button>
                                                <button class="btn btn-light">Browse Projects</button>
                                                <button class="btn btn-light">Setup Account Details</button>
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
                    </div>-->

                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header bg-lancer text-white text-bold">
                                    <div v-if="this.client !== null" class="card-title text-wrap" >
                                        <p>Welcome Back</p>
                                        <p>{{this.client.userable.full_name}}</p>
                                        <p>{{this.client.email}}</p>
                                    </div>
                                    <div class="card-tools"></div>
                                </div>

                                <div class="card-body">
                                    <p>Setup Your Account</p>
                                    <a href="#" @click="goToProfile" ><p class="text-danger text-bold" v-if="client.profile_updated === false">Please Update Your Profile</p></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card shadow">
                                <div class="card-header">
                                    <div class="card-title">Advertisement</div>
                                    <div class="card-tools"></div>
                                </div>

                                <div class="card-body"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "ClientHome",
        data(){
            return{
                client:{},
                latestProject:{},
            }
        },
        methods:{
            postjobs() {
                window.location.assign('/browse/post-jobs')
            },
            goToProfile(){
                window.location.assign('/profile');
            },
            getIndex(){
                axios
                    .get('/data/user')
                    .then((response) => {
                        this.client = response.data;
                    })
            },
            getLatestProject(){
                axios.get('/data/client/latest-project').then((response)=>{
                    this.latestProject = response.data;
                })
            },
        },
        mounted() {
            this.getIndex();
            this.getLatestProject();
            Fire.$on('jobPosted', ()=>{
                this.getLatestProject();
            })
        }
    }
</script>

<style lang="scss" scoped>
    .top-bg-img{
        background-image: url("/images/banner/bodybanner.jpg");
        margin-top: -50px;
    }
</style>
