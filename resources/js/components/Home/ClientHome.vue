<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="card-title text-bold">Recent Projects</div>
                                <div class="card-tools">
                                    <a class="text-lancer" href="#">View All <span class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>

                            <div class="card-body text-center">
                                <div class="mt-5 ml-5 pr-2">
                                    <p class="text-bold">Millions of amazing freelancers are waiting to turn your dreams into reality.</p>
                                    <div class="m-3">
                                        <a class="btn btn-outline-success text-dark text-bold border-dark m-3" href="#" @click="postjobs">Post a Job</a>
                                    </div>


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
                </div>

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
        name: "ClientHome",
        data(){
            return{
                client:{},
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
            }
        },
        mounted() {
            this.getIndex();
        }
    }
</script>

<style scoped>

</style>
