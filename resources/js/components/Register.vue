<template>
    <div class="container">
        <div class="row justify-content-center">

        <div v-show="nextPage === false" class="login-box justify-content-center col-md-5">

            <div class="card shadow">
                <div class="card-body login-card-body justify-content-center mt-3 mb-3">
                    <div class="card-image text-center">
                        <img :src="this.$parent.resource_path+'/lancers_logo.png'" width="auto" height="50" alt="" loading="lazy">
                    </div>
                    <p class="login-box-msg text-center text-lancer text-bold h3 mt-3 mb-3"><b>Sign Up</b></p>
                    <form name="login" class="main-login-form text-center" @submit.prevent="next" method="post">
                        <div :validator="v" class="mb-3">
                            <input v-model="form.email" type="email" class="form-control" placeholder="Email"
                                   :class="{ 'is-invalid': form.errors.has('email') }" name="email" id="email" required>
                            <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="mb-3">

                            <input  v-model="form.password" placeholder="Password" id="password" type="password"
                                   :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" name="password" required autocomplete="password">
                            <!--<hr class="strength" :class="'level_' + strengthLevel">-->
                            <has-error :form="form" field="password"></has-error>

                 </div>

                        <div class="mb-3">
                            <input  v-model="form.password_confirmation" placeholder="Confirm Password" id="password-confirm" type="password"
                                   :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            <has-error :form="form" field="password_confirmation"></has-error>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                            <label class="form-check-label" for="defaultCheck1">
                                I Agree To The<a href="#">User Agreement</a> And <a href="#">Privacy Policy</a>
                            </label>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-success bg-lancer btn-block">Join Lancers</button>

                        </div>

                    </form>
                    <div class="row justify-content-center">

                        <div class="col-12">
                            <p class="text-center text-danger">Already Have An Account? <a href="#" @click="signIn" class="text-lancer">Sign In</a></p>

                        </div>
                    </div>

                </div>


            </div>
        </div>


        <div v-show="nextPage === true" class="login-box justify-content-center col-md-4">

                    <div class="card shadow">
                        <div class="card-body login-card-body justify-content-center mt-3 mb-3">
                            <a href="#" @click="back"><span class="fas fa-arrow-left text-left text-lancer"></span></a>
                            <div class="card-image text-center mb-5">
                                <img :src="this.$parent.resource_path+'/lancers_logo.png'" width="auto" height="50" alt="" loading="lazy">
                            </div>

                           <!-- <b-form-select v-model="form.user_type" :options="options"></b-form-select>-->

                            <!-- Group of material radios - option 2 -->
                            <div class="form-check text-center m-3">
                                <input v-model="form.user_type" value="client" type="radio" class="form-check-input" id="materialGroupExample2" name="groupOfMaterialRadios" checked>
                                <label class="form-check-label font-weight-bold" for="materialGroupExample2">I Want To Hire</label>
                            </div>

                            <!-- Group of material radios - option 1 -->
                            <div class="form-check text-center m-3">
                                <input v-model="form.user_type" value="freelancer" type="radio" class="form-check-input " id="materialGroupExample1" name="groupOfMaterialRadios">
                                <label class="form-check-label font-weight-bold" for="materialGroupExample1">I Want To Work</label>
                            </div>




                            <div class="text-center mt-3">
                                <button type="submit" @click="submit" class="btn btn-success bg-lancer btn-block">Sign Up</button>
                            </div>

                        </div>


                    </div>
                </div>

            <!--</form>-->
        </div>
    </div>
</template>

<script>

    export default {
        name: "Register",
        data(){
            return{
                options: [
                    { value: null, text: 'Select Your User Type' },
                    { value: 'freelancer', text: 'I Want To Work' },
                    { value: 'client', text: 'I Want To Hire' },
                        ],
                form: new Form({
                    email: '',
                    password: '',
                    password_confirmation: '',
                    user_type: '',
                }),
                nextPage: false,
            }
        },

            methods: {
                next() {
                    this.nextPage = true;

                },
                back() {
                    this.nextPage = false;
                },
                submit() {
                    if (this.form.user_type !== 'What Do You Want To Do') {
                        this.$Progress.start()
                        this.form.post('/register').then((response) => {
                            this.$Progress.finish();
                            window.location.assign('/home');
                        })
                            .catch((error) => {
                                this.nextPage = false;
                            })
                    }


                },
                signIn() {
                    window.location.assign('/login');
                },
            },
            mounted() {
                console.log('Component mounted.')

            },






    }
</script>

<style lang="scss" scoped>
    .my-user-type{
        input[type=radio]
        {
            /* Hide original inputs */
            visibility: hidden;
            //position: absolute;
        }
        input[type=radio] + label:before{
            background-color: red;
            color: black;
            height:30px;
            width:100px;
            //margin-right: 2px;
            //content: " ";
            display:inline-block;
            vertical-align: baseline;
            //border:1px solid #777;
        }
        input[type=radio]:checked + label:before{
            background: #32a778;
            color: white;
        }

        /* CUSTOM RADIO AND CHECKBOX STYLES */
       /* input[type=radio] + label:before{
            border-radius:50%;
        }
        input[type=checkbox] + label:before{
            border-radius:2px;
        }*/
    }


    .clickable{
        cursor: pointer;
        &:hover{
            background-color: white;
            color: #9bf806;
            -webkit-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }

    }

    .strength {
        position: absolute;
        bottom: 233px;
        left: 20px;
        right: 0px;
        display: inline-block;
        width: 2%;
        height: 2%;
        background-color: #BB4440;
        border-radius: 40px;
        overflow: hidden;
        z-index: 9;
        transition: all .5s linear;
    }
    @mixin level($position, $width, $color) {
        bottom: 233px;
        width: $width;
        background-color: $color;
    }

    .level_0 {
        @include level(0, 0%, #BB4440);
    }
    .level_1 {
        @include level(-10px, 25%, #BB4440);
    }
    .level_2 {
        @include level(-10px, 50%, #1cb386);
    }
 HEAD
    .strength{
        width: 25%;
        margin-top: -3px;
        height: 3px;
        border-radius: 10px;
        //overflow: hidden;
        //z-index: 9;
        //transition: all .5s linear;
    }
    @mixin level($position, $width, $color){
        border: $position;
        width: $width;
        background-color: $color;
    }
    .level_0{
        @include level(0, 25%, #f80606)
    }
    .level_1{
        @include level(-10, 25%, #f80606)
    }
    .level_2{
        @include level(-10, 50%, #f6681b)
    }
    .level_3{
        @include level(-10, 75%, #f8d006)
    }
    .level_4{
        @include level(-10, 100%, #9bf806)
    }
    @mixin showpass($property){
        position: absolute;
        left: $property;
        z-index: 11;
        cursor: pointer;
    }
    .show-icon{
        @include showpass(20px);
    }
    .hide-icon{
        @include showpass(18px);
        color: grey;
    }

    .level_3 {
        @include level(-10px, 75%, #00e676);
    }
    .level_4 {
        @include level(-10px, 90%, #00e676);
    }

    @mixin showpass($property) {
        position: absolute;
        left: 400px;
        top: 230px;
        z-index: 11;
        cursor: pointer;
    }

    .show-icon {
        @include showpass(20px);
    }

    .hide-icon {
        @include showpass(18px);
        color: #4e555b;
    }

</style>
