<template>
<div class="container-fluid top-bg-img">
    <div class="container profile-place">
        <div class="row">
            <div class="col-md-8">
                <!--Portfolio starts-->
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
                                            <a class="text-white text-bold text-left btn bg-lancer" @click="portfolioToggle('true', $event)" href="#">Edit Profile</a>
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
                                                    <input v-model="portfolioForm.title" type="text" name="title" placeholder="Professional Title"
                                                           class="form-control" :class="{ 'is-invalid': portfolioForm.errors.has('title') }">
                                                    <has-error :form="portfolioForm" field="title"></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <textarea v-model="portfolioForm.description" type="text" name="description" rows="5" placeholder="Summary"
                                                              class="form-control" :class="{ 'is-invalid': portfolioForm.errors.has('description') }"></textarea>
                                                    <has-error :form="portfolioForm" field="description"></has-error>
                                                </div>
                                                <div class="text-right">
                                                    <button type="button" class="btn btn-danger" @click="portfolioToggle('false', $event)" >Cancel</button>
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
                <!--Portfolio ends-->

                <!--Links Starts-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header bg-none">
                                <div class="card-title text-bold">Links to Projects Worked On</div>
                                <div class="card-tools text-right">
                                    <a class="text-white text-bold text-left btn bg-lancer" href="#">Add Link</a>
                                </div>
                            </div>

                            <div class="card-body text-left text-dark">
                                <ul v-if="freelancer.links > 0">
                                    <li v-for="(link, i) in freelancer.links" :key="i" class="nav-item">
                                        <a href="" class="nav-link">{{link.name}}</a>
                                    </li>
                                </ul>
                                <ul v-else>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">some links here</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">some links here too</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Links ends-->
                <!--Bio data starts-->
                <div class="row">
                    <div class="col-md-12">
                        <div v-show="profileEditMode === false" class="card shadow">
                            <div class="card-header bg-none">
                                <div class="card-title text-bold">Profile Information</div>
                                <div class="card-tools text-right">
                                    <a class="text-white text-bold text-left btn bg-lancer" @click="profileToggle('true', $event)" href="#">Edit</a>
                                </div>
                            </div>

                            <div class="card-body text-left">
                                <div class="row">
                                    <div class="col-6">
                                        <p>First Name:  {{this.freelancer.userable.first_name | checkNull}}</p>
                                        <p>Other Name:  {{this.freelancer.userable.other_name | checkNull}}</p>
                                        <p>Family Name: {{this.freelancer.userable.last_name | checkNull}}</p>
                                    </div>
                                    <div class="col-6">
                                        <p>Email:  {{this.freelancer.userable.email | checkNull}}</p>
                                        <p>Date Of Birth: {{this.freelancer.userable.dob | checkNull }}</p>
                                        <p>Gender: {{this.freelancer.userable.gender | checkNull}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-show="profileEditMode === true" class="card shadow">
                            <div class="card-header bg-none">
                                <div class="card-title text-bold">Edit Profile</div>
                            </div>
                            <div class="card-body text-center">
                                <form ref="profileForm" @submit.prevent="updateProfile">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input v-model="profileForm.first_name" type="text" name="first_name" placeholder="First Name"
                                                       class="form-control" :class="{ 'is-invalid': profileForm.errors.has('first_name') }" required>
                                                <has-error :form="profileForm" field="first_name"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <input v-model="profileForm.other_name" type="text" name="other_name" placeholder="Other Names"
                                                       class="form-control" :class="{ 'is-invalid': profileForm.errors.has('other_name') }">
                                                <has-error :form="profileForm" field="other_name"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <input v-model="profileForm.last_name" type="text" name="last_name" placeholder="Family Name"
                                                       class="form-control" :class="{ 'is-invalid': profileForm.errors.has('last_name') }" required>
                                                <has-error :form="profileForm" field="last_name"></has-error>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input v-model="profileForm.email" type="text" name="email" placeholder="Email"
                                                       class="form-control" :class="{ 'is-invalid': profileForm.errors.has('email') }" readonly>
                                                <has-error :form="profileForm" field="email"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <input v-model="profileForm.dob" type="date" name="dob" placeholder="Professional Title"
                                                       class="form-control" :class="{ 'is-invalid': profileForm.errors.has('dob') }">
                                                <has-error :form="profileForm" field="dob"></has-error>
                                            </div>
                                            <div class="form-group">
                                                <b-form-select v-model="profileForm.gender" :options="genderOptions" aria-placeholder="Gender">
                                                </b-form-select>
                                                <has-error :form="profileForm" field="gender"></has-error>
                                            </div>
                                            <div class="text-right">
                                                <button type="button" class="btn btn-danger" @click="profileToggle('false', $event)" >Cancel</button>
                                                <button type="submit" class="btn bg-lancer text-white">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Bio data ends-->

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
    <!--Modals go here-->
    <!--modal for profile image starts here-->
    <div class="modal" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title">Upload Profile Picture</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label>Profile Picture</label>

                                <input ref="image"  id="image" type="file" name="image" accept="image/*" class="form-control" style="border: none" @change="loadImage($event)">
                            </div>
                            <div class="col-6">
                                <img :src="this.image_file" class="uploading-image img-thumbnail" height="128" alt="Preview" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" @click="submitImage">Upload <i class="fas fa-user-plus"></i></button>
                </div>

            </div>
        </div>
    </div>
    <!--modal for profile image ends here-->


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
                profileForm: new Form({
                    first_name: '',
                    last_name: '',
                    other_name: '',
                    gender: '',
                    dob: '',
                    email: '',
                }),
                portfolioEditMode: false,
                profileEditMode: false,
                genderOptions: [
                    { value: 'male', text: 'Male' },
                    { value: 'female', text: 'Female' },
                    { value: 'unknown', text: 'Unknown' },
                ],
                file: null,
                image_file: '',
                formData: new FormData(),

            }
        },
        methods:{
            //get user details
            getIndex(){
                axios
                    .get('/data/user')
                    .then((response) => {
                        this.freelancer = response.data;
                    })
            },
            //update user portfolio
            updatePortfolio(){},
            //load profile image for preview
            loadImage(e){
                //
                this.file = e.target.files[0];
                const reader = new FileReader();
                reader.readAsDataURL(this.file);
                reader.onload = e =>{
                    this.image_file = e.target.result;

                };

            },
            //dave profile image
            submitImage(){

                //Initialize the form data
                this.formData.append('profile_picture', this.file);

                //Add the form data we need to submit

                //Make the request to the POST /single-file URL
                axios.post( '/data/user/profile_picture',
                    this.formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    },
                    this.$Progress.start()
                ).then((response) => {
                    Fire.$emit('profileUpdate');

                    if(response.data === 'Success'){
                        Swal.fire(
                            'Update',
                            'Profile Picture Updated Successfully',
                            'success'
                        );
                    }
                    else{
                        Swal.fire(
                            'Update',
                            response.data,
                            'warning'
                        );
                    }
                    this.$Progress.finish();

                })
                    .catch(function(error){

                    });
                $('#profileModal').modal('hide');
            },
            //update user profile
            updateProfile(){},
            //toggle edit mode
            portfolioToggle(val, event){
                event.preventDefault();
                if(val === 'true'){
                    this.portfolioEditMode = true;
                }
                else if(val === 'false'){
                    this.portfolioEditMode = false;
                }
            },
            profileToggle(val, event){
                event.preventDefault();
                if(val === 'true'){
                    this.profileEditMode = true;
                }
                else if(val === 'false'){
                    this.profileEditMode = false;
                }
            },
        },
        filters:{
            checkNull(val){
                if(val === null){
                    return 'N/A';
                }
                return val;
            }
        },
        mounted() {
            this.getIndex();

            Fire.$on('profileUpdate', ()=>{
                this.getIndex();
            });
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
