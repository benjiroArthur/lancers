<template>
<div class="container-fluid top-bg-img">
    <div class="container profile-place">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div v-show="portfolioEditMode === false" class="card shadow">
                            <div class="card-body text-center">
                                <div class="row">
                                    <div class="col-4 text-left">
                                        <div class="img-holder mb-2">
                                            <img :src="freelancer.userable.image_path" alt="" class="img-thumbnail">
                                        </div>
                                        <div v-if="freelancer.address !== null">
                                            <p>{{this.freelancer.address.country}}</p>
                                            <p>{{this.freelancer.address.city}}</p>

                                        </div>
                                        <p>Joined On {{freelancer.created_at | myDate}}</p>
                                        <p>0 Recommendations</p>
                                    </div>
                                    <div class="col-8">
                                        <div class="card-title text-dark text-bold">{{this.freelancer.userable.email}}</div>
                                        <div class="card-tools text-right">
                                            <a class="text-white text-bold text-left btn bg-lancer" @click="portfolioToggle('true')" href="#">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-show="portfolioEditMode === true" class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-4 text-left">
                                        <div class="img-holder mb-2">
                                            <img :src="freelancer.userable.image_path" alt="" class="img-thumbnail">
                                            <span class="fas fa-camera" data-toggle="modal" data-target="#profileModal" tooltip="Edit Profile Picture"
                                                  style="position: absolute; transform: translate(-70%, 200%); -ms-transform: translate(-70%, 200%); width:20px;"></span>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card-header bg-none">
                                            <div class="card-title text-dark text-bold mb-3">{{this.freelancer.userable.email}}</div>
                                        </div>
                                        <div class="card-body text-left">
                                            <form ref="portfolioForm" @submit.prevent="updatePortfolio">
                                                <div class="form-group">
                                                    <label class="text-left">Professional Title</label>
                                                    <input v-model="portfolioForm.title" type="text" name="title"
                                                           class="form-control" :class="{ 'is-invalid': portfolioForm.errors.has('title') }">
                                                    <has-error :form="portfolioForm" field="title"></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label>Summary</label>
                                                    <textarea v-model="portfolioForm.description" type="text" name="description" rows="5"
                                                              class="form-control" :class="{ 'is-invalid': portfolioForm.errors.has('description') }"></textarea>
                                                    <has-error :form="portfolioForm" field="description"></has-error>
                                                </div>
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-danger" @click="portfolioToggle('false')" >Cancel</button>
                                                    <button type="submit" class="btn bg-lancer text-white">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header bg-none">
                                <div class="card-title text-bold">Links to Projects Worked On</div>
                                <div class="card-tools text-right">
                                    <a class="text-white text-bold text-left btn bg-lancer" href="#">Add Link</a>
                                </div>
                            </div>

                            <div class="card-body text-center">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header bg-none">
                                <div class="card-title text-bold">Profile Information</div>
                                <div class="card-tools text-right">
                                    <a class="text-white text-bold text-left btn bg-lancer" href="#">Edit</a>
                                </div>
                            </div>

                            <div class="card-body text-center">

                            </div>
                        </div>
                        <div class="card shadow">
                            <div class="card-header bg-none">
                                <div class="card-title text-bold">Profile Information</div>
                                <div class="card-tools text-right">
                                    <a class="text-white text-bold text-left btn bg-lancer" href="#">Edit</a>
                                </div>
                            </div>

                            <div class="card-body text-center">

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
                                <div class="card-title">
                                    <p>Welcome Back</p>
                                    <p>{{this.freelancer.userable.full_name}}</p>
                                    <p>{{this.freelancer.email}}</p>
                                </div>
                                <div class="card-tools"></div>
                            </div>

                            <div class="card-body">
                                <p>Setup Your Account</p>
                                <p class="text-danger text-bold" v-if="freelancer.profile_updated === false">Please Update Your Profile</p>
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
</div>
</template>

<script>
    export default {
        name: "FreelancerProfile",
        data(){
            return{
                freelancer:{},
                portfolioForm: new Form({
                    title: '',
                    description: ''
                }),
                portfolioEditMode: false,
            }
        },
        methods:{
            getIndex(){
                axios
                    .get('/data/user')
                    .then((response) => {
                        this.freelancer = response.data;
                    })
            },
            updatePortfolio(){},
            portfolioToggle(val){
                if(val === 'true'){
                    this.portfolioEditMode = true;
                }
                else if(val === 'false'){
                    this.portfolioEditMode = false;
                }
            }
        },
        mounted() {
            this.getIndex();
        }
    }
</script>

<style lang="scss" scoped>
    .top-bg-img{
        background-image: url("/images/banner/bodybanner.jpg");
        margin-top: -50px;
    }
    .profile-place{
        padding-top: 200px;
    }
</style>
