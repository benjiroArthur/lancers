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
                                            <img :src="freelancer.userable.image_path" alt="" class="img-thumbnail">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-title text-dark text-bold">{{this.freelancer.userable.email}}</div>
                                        <div class="card-tools text-right">
                                            <a class="text-white text-bold text-left btn bg-lancer" @click="portfolioToggle('true', $event)" href="#">Edit Profile</a>
                                        </div>
                                        <div v-if="this.portfolio != null" class="card-body text-left">
                                            <p>{{this.portfolio.title}}</p>
                                            <p>{{this.portfolio.description}}</p>
                                            <p>{{this.portfolio.academic}}</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-left">
                                        <p>Joined On {{freelancer.created_at | myDate}}</p>
                                        <p>0 Recommendations</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-show="portfolioEditMode === true" class="card shadow">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4 text-left">
                                        <div class="img-holder mb-2">
                                            <img :src="freelancer.userable.image_path" alt="" class="img-thumbnail">
                                            <span class="fas fa-camera" data-toggle="modal" data-target="#profileModal" tooltip="Edit Profile Picture"
                                                  style="position: absolute; transform: translate(-70%, 200%); -ms-transform: translate(-70%, 200%); width:20px;"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
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
                                                <!--<div class="form-group">
                                                    <input v-model="portfolioForm.academic" type="text" name="academic" placeholder="Current Qualification"
                                                           class="form-control" :class="{ 'is-invalid': portfolioForm.errors.has('academic') }">
                                                    <has-error :form="portfolioForm" field="academic"></has-error>
                                                </div>-->
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
                                        <p>First Name:  {{this.freelancer.userable.first_name | checkNull}}</p>
                                        <p>Other Name:  {{this.freelancer.userable.other_name | checkNull}}</p>
                                        <p>Family Name: {{this.freelancer.userable.last_name | checkNull}}</p>
                                    </div>
                                    <div class="col-md-6">
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
                                    <div class="row text-center">
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
                                            <div class="text-center text-center">
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
                                    <div v-if="freelancer.address !== null" class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-4  text-wrap">
                                         <p>Country:  </p>
                                        <p>City:  </p>
                                        <p>Zip Code: </p>
                                        <p>Phone number: </p>
                                            </div>
                                            <div class="col-lg-6 col-sm-8 text-wrap">
                                         <p>{{this.freelancer.address.country | checkNull}}</p>
                                        <p>{{this.freelancer.address.city | checkNull}}</p>
                                        <p>{{this.freelancer.address.zip_code | checkNull}}</p>
                                        <p>{{this.freelancer.address.phone_number | checkNull}}</p>
                                            </div>
                                        </div>


                                    </div>
                                    <p v-else class="text-black text-bold h6 h-align-middle v-align-middle">No Information Available To Display</p>
                                </div>
                            </div>
                        </div>
                        <div v-show="addressEditMode === true" class="card shadow">
                            <div class="card-header bg-none">
                                <div class="card-title text-bold">Edit Address</div>
                            </div>
                            <div class="card-body text-center">
                                <form ref="profileForm" @submit.prevent="updateAddress">
                                    <div class="row justify-content-center">
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
                                                       class="form-control" :class="{ 'is-invalid': addressForm.errors.has('zip_code') }" required
                                                pattern="[0-9]*" maxlength="5" oninvalid="setCustomeValidity('Invalid Zipcode Pattern')">
                                                <has-error :form="addressForm" field="zip_code"></has-error>

                                            </div>
                                        <div class="form-group">
                                            <input v-model="addressForm.phone_number" type="text" name="phone_number" placeholder="Phone Number"
                                                   class="form-control" :class="{ 'is-invalid': addressForm.errors.has('phone_number') }" required>
                                            <has-error :form="addressForm" field="phone_number"></has-error>
                                        </div>

                                        </div>
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <button type="button" class="btn btn-danger" @click="addressToggle('false', $event)" >Cancel</button>
                                                <button type="submit" class="btn bg-lancer text-white">Save</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Address Details Ends-->

                <!--Links Starts-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header bg-none">
                                <div class="card-title text-bold">Links to Projects Worked On</div>
                                <div class="card-tools text-right">
                                    <a class="text-white text-bold text-left btn bg-lancer" @click="linksToggle($event)" href="#">Add Link</a>
                                </div>
                            </div>

                            <div class="card-body text-left text-dark">
                                <ul v-if="links.length > 0">
                                    <li v-for="(link, i) in links" :key="i" class="nav-item">
                                        <a :href="link.name" class="nav-link" target="_blank">{{link.name}}</a>
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

                <!--education background starts-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header bg-none">
                                <div class="card-title text-bold">Educational Background</div>
                                <div class="card-tools text-right">
                                    <a class="text-white text-bold text-left btn bg-lancer" @click="educationToggle($event)" href="#">Add </a>
                                </div>
                            </div>

                            <div class="card-body text-left text-dark">
                               <div v-if="education.length > 0">
                                   <div v-for="(edu, i) in education" :key="i">
                                       <p><strong>Institution Name:  {{edu.institution}}</strong></p>
                                       <p>Qualification:  {{edu.qualification}}</p>
                                       <p>Year Completed:  {{edu.year}}</p>
                                   </div>
                               </div>
                               <div v-else>
                                   <p class="text-bold h6 text-dark">Add Educational Information</p>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--education background ends-->


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
                <!--<div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="card-title"></div>
                                <div class="card-tools"></div>
                            </div>

                            <div class="card-body"></div>
                        </div>
                    </div>
                </div>-->
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

    <!--education-->
    <div class="modal" id="educationModal" tabindex="-1" role="dialog" aria-labelledby="educationModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title">Add Educational Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="submitEducation">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Institution Name</label>
                            <input   id="institution" type="text" name="institution"  class="form-control" v-model="singleEducation.institution" required placeholder="Institution Name">
                        </div>
                        <div class="form-group">
                            <label>Qualification</label>
                            <input   id="qualification" type="text" name="qualification"  class="form-control" v-model="singleEducation.qualification" required placeholder="Qualification">
                        </div>
                        <div class="form-group">
                            <label>Year</label>
                            <input  maxlength="4" minlength="4" id="year" type="text" name="year"  class="form-control" v-model="singleEducation.year" required placeholder="Year">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit<i class="fas fa-user-plus"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<script>
   /* $('.datepicker').datepicker({
        weekdaysShort: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
        showMonthsShort: true
    })*/
    export default {
        name: "FreelancerProfile",
        data(){
            return{
                freelancer:{},
                portfolio:{},
                education:{},
                portfolioForm: new Form({
                    title: '',
                    description: '',
                    academic: '',
                }),
                addressForm: new Form({
                    country: 'Country',
                    city: '',
                    zip_code: '',
                    phone_number: '',
                    user_id: '',
                }),
                singleEducation: new Form({
                    institution: '',
                    qualification: '',
                    year: '',
                    freelancer_id: ''
                }),

                profileForm: new Form({
                    first_name: '',
                    last_name: '',
                    other_name: '',
                    gender: 'Gender',
                    dob: '',
                    email: '',
                }),
                portfolioEditMode: false,
                addressEditMode: false,
                profileEditMode: false,
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
                countries:{},
            }
        },
        methods:{
            //get user details
            getIndex(){
                axios
                    .get('/data/user')
                    .then((response) => {
                        this.freelancer = response.data;
                        this.portfolioForm.fill(this.freelancer.userable.portfolio);
                        this.portfolio = this.freelancer.userable.portfolio;
                        this.profileForm.fill(this.freelancer.userable);
                        this.links = this.freelancer.userable.links;
                        this.addressForm.fill(this.freelancer.address);
                    })
            },
            getCountries(){
                axios
                    .get('https://restcountries.eu/rest/v2/all')
                    .then((response) => {
                        this.countries = response.data;
                    })
            },
            getEducation(){
                axios
                    .get('/data/education')
                    .then((response) => {
                        this.education = response.data;
                    })
            },
            //update user portfolio
            updatePortfolio(){
                this.$Progress.start();
                this.portfolioForm.post('/data/user/portfolio')
                                    .then((response) => {
                                        this.portfolioEditMode = false;
                                        Fire.$emit('profileUpdate');
                                        Swal.fire(
                                            'Update',
                                            'Portfolio Updated Successfully',
                                            'success'
                                        );
                                        this.$Progress.finish();
                                    })
                                    .catch((error) => {
                                        this.portfolioEditMode = true;
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
            //save profile image
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

            //update address
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
            //toggle edit mode
            portfolioToggle(val, event){
                event.preventDefault();
                if(val === 'true'){
                    this.portfolioEditMode = true;
                }
                else if(val === 'false'){
                    this.portfolioForm.fill(this.freelancer.userable.portfolio);
                    this.portfolioEditMode = false;
                }
            },

            addressToggle(val, event){
                event.preventDefault();
                if(val === 'true'){
                    this.addressEditMode = true;
                }
                else if(val === 'false'){
                    this.addressForm.fill(this.freelancer.address);
                    this.addressEditMode = false;
                }
            },

            profileToggle(val, event){
                event.preventDefault();
                if(val === 'true'){
                    this.profileEditMode = true;
                }
                else if(val === 'false'){
                    this.profileForm.fill(this.freelancer.userable);
                    this.profileEditMode = false;
                }
            },
            linksToggle(event){
                event.preventDefault();
                $('#linkModal').modal('show');
            },
            educationToggle(event){
                event.preventDefault();
                $('#educationModal').modal('show');
            },

            submitEducation(){
                this.singleEducation.freelancer_id = this.freelancer.userable.id;
                this.$Progress.start();
                this.singleEducation
                    .post('/data/education')
                    .then((response)=>{
                        $('#educationModal').modal('hide');
                        this.education.push(response.data);
                        Fire.$emit('profileUpdate');
                        Swal.fire(
                            'Success',
                            'Education Profile Added Successfully',
                            'success'
                        );
                        this.$Progress.finish();
                    })
                    .catch((error)=>{})
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
            this.getEducation();

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
