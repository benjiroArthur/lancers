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
                                        <div class="col-md-4 text-left">
                                            <div class="img-holder mb-2">
                                                <img :src="client.userable.image_path" alt="" class="img-thumbnail">
                                            </div>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-title text-dark text-bold">{{this.client.userable.email}}</div>
                                            <div class="card-tools text-right">
                                                <a class="text-white text-bold text-left btn bg-lancer" @click="portfolioToggle('true', $event)" href="#"><span class="fas fa-edit"></span></a>
                                            </div>
                                            <div v-if="this.portfolio != null" class="card-body text-left">
                                                <p>{{this.portfolio.title}}</p>
                                                <p>{{this.portfolio.description}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 text-left">
                                            <p>Joined On {{client.created_at | myDate}}</p>
                                            <p>0 Recommendations</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div v-show="portfolioEditMode === true" class="card shadow">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12 text-left">
                                            <div class="img-holder mb-2">
                                                <img :src="client.userable.image_path" alt="" class="img-thumbnail">
                                                <span class="fas fa-camera" data-toggle="modal" data-target="#profileModal" tooltip="Edit Profile Picture"
                                                      style="position: absolute; transform: translate(-70%, 200%); -ms-transform: translate(-70%, 200%); width:20px;"></span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Portfolio ends-->

                    <!--Address Details Starts-->
                    <div class="row">
                        <div class="col-md-12">
                            <div v-show="addressEditMode === false" class="card shadow">
                                <div class="card-header bg-none">
                                    <div class="card-title text-bold">Address Information</div>
                                    <div class="card-tools text-right">
                                        <a class="text-white text-bold text-left btn bg-lancer" @click="addressToggle('true', $event)" href="#">Edit</a>
                                    </div>
                                </div>

                                <div class="card-body text-left">
                                    <div class="row">
                                        <div v-if="client.address !== null" class="col-md-6" >

                                            <div class="row">
                                                <div class="col-md-6 col-lg-6 col-sm-4">
                                                    <p>Country:  </p>
                                                    <p>City:  </p>
                                                    <p>Zip Code: </p>
                                                    <p>Phone number: </p>
                                                </div>
                                                <div class="col-md-6 col-lg-6 col-sm-8">
                                                    <p>{{this.client.address.country | checkNull}}</p>
                                                    <p>{{this.client.address.city | checkNull}}</p>
                                                    <p>{{this.client.address.zip_code | checkNull}}</p>
                                                    <p>{{this.client.address.phone_number | checkNull}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <p v-else class="text-black text-center text-bold h-align-middle h6 v-align-middle">No Information Available To Display</p>
                                    </div>
                                </div>
                            </div>
                            <div v-show="addressEditMode === true" class="card shadow">
                                <div class="card-header bg-none">
                                    <div class="card-title text-bold">Edit Address</div>
                                </div>
                                <div class="card-body text-center">
                                    <form ref="profileForm" @submit.prevent="updateAddress">
                                        <div class="row">
                                            <div class ="col-md-6">
                                                <div class="form-group">
                                                    <select v-model="addressForm.country" type="text" name="country"
                                                            class="form-control" :class="{ 'is-invalid': addressForm.errors.has('country') }" required>
                                                        <option selected>Country</option>
                                                        <option v-for="(country, i) in countries" :key="i">{{country.name}}</option>
                                                    </select>
                                                    <has-error :form="addressForm" field="country"></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <input v-model="addressForm.city" type="text" name="city" placeholder="City" pattern="[a-zA-Z]*"
                                                           class="form-control" :class="{ 'is-invalid': addressForm.errors.has('city') }"
                                                           oninvalid="setCustomeValidity('Characters Only')">
                                                    <has-error :form="addressForm" field="city"></has-error>
                                                </div>
                                            </div>
                                            <div class ="col-md-6">
                                                <div class="form-group">
                                                    <input v-model="addressForm.zip_code" type="text" name="zip_code" placeholder="Zip Code"
                                                           pattern="[0-9]*" maxlength="5"
                                                           class="form-control" :class="{ 'is-invalid': addressForm.errors.has('zip_code') }" required>
                                                    <has-error :form="addressForm" field="zip_code"></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <input v-model="addressForm.phone_number" type="text" name="phone_number" placeholder="Phone Number"
                                                           pattern="[0-9]*" maxlength="15"
                                                           class="form-control" :class="{ 'is-invalid': addressForm.errors.has('phone_number') }" required>
                                                    <has-error :form="addressForm" field="phone_number"></has-error>
                                                </div>

                                            </div>


                                        </div>
                                        <div class ="row justify-content-center text-center">
                                            <div class="text-center">
                                                <button type="button" class="btn btn-danger" @click="addressToggle('false', $event)" >Cancel</button>
                                                <button type="submit" class="btn bg-lancer text-white">Save</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                    <!--Address Details Ends-->

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
                                        <div class="col-md-6">
                                            <p>First Name:  {{this.client.userable.first_name | checkNull}}</p>
                                            <p>Other Name:  {{this.client.userable.other_name | checkNull}}</p>
                                            <p>Family Name: {{this.client.userable.last_name | checkNull}}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Email:  {{this.client.userable.email | checkNull}}</p>
                                            <p>Date Of Birth: {{this.client.userable.dob | checkNull }}</p>
                                            <p>Gender: {{this.client.userable.gender | checkNull}}</p>
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
                                        <div class="row text-center">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input v-model="profileForm.first_name" type="text" name="first_name" placeholder="First Name"
                                                           pattern="[a-zA-Z]*" oninvalid="setCustomeValidity('Characters Only')"
                                                           class="form-control" :class="{ 'is-invalid': profileForm.errors.has('first_name') }" required>
                                                    <has-error :form="profileForm" field="first_name"></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <input v-model="profileForm.other_name" type="text" name="other_name" placeholder="Other Names"
                                                           pattern="[a-zA-Z]*" oninvalid="setCustomeValidity('Characters Only')"
                                                           class="form-control" :class="{ 'is-invalid': profileForm.errors.has('other_name') }">
                                                    <has-error :form="profileForm" field="other_name"></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <input v-model="profileForm.last_name" type="text" name="last_name" placeholder="Family Name"
                                                           pattern="[a-zA-Z]*" oninvalid="setCustomeValidity('Characters Only')"
                                                           class="form-control" :class="{ 'is-invalid': profileForm.errors.has('last_name') }" required>
                                                    <has-error :form="profileForm" field="last_name"></has-error>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input v-model="profileForm.email" type="email" name="email" placeholder="Email"
                                                           class="form-control" :class="{ 'is-invalid': profileForm.errors.has('email') }" readonly>
                                                    <has-error :form="profileForm" field="email"></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <input v-model="profileForm.dob" type="date" name="dob" placeholder="Professional Title"
                                                           class="form-control" :class="{ 'is-invalid': profileForm.errors.has('dob') }">
                                                    <has-error :form="profileForm" field="dob"></has-error>
                                                </div>
                                                <div class="form-group-inline">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input v-model="profileForm.gender" value="male"  type="radio" class="custom-control-input" id="defaultInline1" name="inlineDefaultRadiosExample">
                                                        <label class="custom-control-label" for="defaultInline1">Male</label>
                                                    </div>

                                                    <!-- Default inline 2-->
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input v-model="profileForm.gender" value="female"  type="radio" class="custom-control-input" id="defaultInline2" name="inlineDefaultRadiosExample">
                                                        <label class="custom-control-label" for="defaultInline2">Female</label>
                                                    </div>
                                                    <has-error :form="profileForm" field="gender"></has-error>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="text-center">
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
                                    <div class="card-title text-wrap">
                                        <p>Welcome Back</p>
                                        <p>{{this.client.userable.full_name}}</p>
                                        <p>{{this.client.email}}</p>
                                    </div>
                                    <div class="card-tools"></div>
                                </div>

                                <div class="card-body">
                                    <p>Setup Your Account</p>
                                    <p class="text-danger text-bold" v-if="client.profile_updated === false">Please Update Your Profile</p>
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
        <!--link modal start-->
        <div class="modal" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="linkModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h5 class="modal-title">Add A Link To Your Project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form @submit.prevent="submitLink">
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Link Address</label>
                                <input   id="name" type="text" name="name"  class="form-control" v-model="singleLink.name" required placeholder="https://linktofile">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Add Link<i class="fas fa-user-plus"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--link modal end-->
    </div>
</template>

<script>
    export default {
        name: "ClientProfile",
        data(){
            return{
                countries:{},
                client:{},
                portfolioEditMode: false,
                profileForm: new Form({
                    first_name: '',
                    last_name: '',
                    other_name: '',
                    gender: 'Gender',
                    dob: '',
                    email: '',
                }),
                addressForm: new Form({
                    country: 'Country',
                    city: '',
                    zip_code: '',
                    phone_number: '',
                    user_id: '',
                }),
                profileEditMode: false,
                addressEditMode: false,
                genderOptions: [
                    { value: 'male', text: 'Male' },
                    { value: 'female', text: 'Female' },
                    { value: 'unknown', text: 'Unknown' },
                ],
                file: null,
                image_file: '',
                formData: new FormData(),
                singleLink: new Form({
                    name:''
                }),
                links:{},

            }
        },
        methods:{
            addressToggle(val, event){
                event.preventDefault();
                if(val === 'true'){
                    this.addressEditMode = true;
                }
                else if(val === 'false'){
                    this.addressEditMode = false;
                    this.addressForm.fill(this.client.address);
                }
            },
            //get user details
            getIndex(){
                axios
                    .get('/data/user')
                    .then((response) => {
                        this.client = response.data;
                        this.profileForm.fill(this.client.userable)
                        this.addressForm.fill(this.client.address);
                    })
            },
            //get countries
            getCountries(){
                axios
                    .get('https://restcountries.eu/rest/v2/all')
                    .then((response) => {
                        this.countries = response.data;
                    })
            },
            updateAddress(){
                this.addressForm.post('/data/user/address')
                    .then((response)=>{
                        Fire.$emit('profileUpdate');
                        this.addressEditMode = false;
                        Swal.fire(
                            'Update',
                            'Address Updated Successfully',
                            'success'
                        );
                    })
                    .catch((error)=>{
                        this.addressEditMode = true;
                        console.log(error.message)
                    })
            },

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

                    if(response.data.message === 'success'){
                        Swal.fire(
                            'Update',
                            'Profile Picture Updated Successfully',
                            'success'
                        );
                    }
                    else{
                        Swal.fire(
                            'Error',
                            response.data.message,
                            'warning'
                        );
                    }
                    this.$Progress.finish();

                })
                    .catch(function(error){

                    });
                $('#profileModal').modal('hide');
            },
            //toggle edit mode
            portfolioToggle(val, event){
                event.preventDefault();
                if(val === 'true'){
                    this.portfolioEditMode = true;
                }
                else if(val === 'false'){
                    this.profileForm.fill(this.client.userable)
                    this.portfolioEditMode = false;
                }
            },
            //update user profile
            updateProfile(){
                this.profileForm.post('/data/user/profile')
                    .then((response) => {
                        Fire.$emit('profileUpdate');
                        this.profileEditMode = false;
                        Swal.fire(
                            'Update',
                            'Profile Updated Successfully',
                            'success'
                        );
                    })
                    .catch((error) => {
                        this.profileEditMode = true;
                    })
            },
            //add link
            submitLink(){
                this.singleLink
                    .post('/data/user/job_link')
                    .then((response)=>{
                        $('#linkModal').modal('hide');
                        Fire.$emit('profileUpdate');
                        Swal.fire(
                            'Success',
                            'Link Added Successfully',
                            'success'
                        );
                    })
                    .catch((error)=>{})
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
            linksToggle(event){
                event.preventDefault();
                $('#linkModal').modal('show');
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
            this.getCountries();

            Fire.$on('profileUpdate', ()=>{
                this.getIndex();
            });
        }
    }
</script>

<style scoped>

</style>
