<template>
    <div class="container">
        <div class="row justify-content-center">

        <div class="login-box justify-content-center col-md-5">

            <div class="card shadow">
                <div class="card-body login-card-body justify-content-center mt-3 mb-3">
                    <div class="card-image text-center">
                        <img :src="this.$parent.resource_path+'/lancers_logo.png'" width="auto" height="50" alt="" loading="lazy">
                    </div>
                    <p class="login-box-msg text-center text-lancer text-bold h3 mt-3 mb-3"><b>Sign Up</b></p>
                    <form name="login" class="main-login-form text-center" @submit.prevent="submit" method="post">
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
                        <!-- Group of material radios - option 2 -->
                        <div class="form-check form-check-inline  text-center m-3">
                            <input v-model="form.user_type" value="client" type="radio" class="form-check-input" id="materialGroupExample2" name="groupOfMaterialRadios" checked>
                            <label class="form-check-label font-weight-bold" for="materialGroupExample2">I Want To Hire</label>
                        </div>

                        <!-- Group of material radios - option 1 -->
                        <div class="form-check  form-check-inline text-center m-3">
                            <input v-model="form.user_type" value="freelancer" type="radio" class="form-check-input " id="materialGroupExample1" name="groupOfMaterialRadios">
                            <label class="form-check-label font-weight-bold" for="materialGroupExample1">I Want To Work</label>
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


        <!--<div v-show="nextPage === true" class="login-box justify-content-center col-md-4">

                    <div class="card shadow">
                        <div class="card-body login-card-body justify-content-center mt-3 mb-3">
                            <a href="#" @click="back"><span class="fas fa-arrow-left text-left text-lancer"></span></a>
                            <div class="card-image text-center mb-5">
                                <img :src="this.resource_path +'/lancers_logo.png'" width="auto" height="50" alt="" loading="lazy">
                            </div>

                           &lt;!&ndash; <b-form-select v-model="form.user_type" :options="options"></b-form-select>&ndash;&gt;






                            <div class="text-center mt-3">
                                <button type="submit" @click="submit" class="btn btn-success bg-lancer btn-block">Sign Up</button>
                            </div>
                        </div>


                    </div>
                </div>-->

            <!--</form>-->
        </div>
    </div>
</template>

<script>

    export default {
        name: "Register",
        data(){
            return{
                resource_path:'',
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
                            Swal.fire(
                                'success',
                                'Registration Successful',
                                'success'
                            );
                            this.$Progress.finish();
                            window.location.assign('/home');

                        })
                            .catch((error) => {
                                this.nextPage = false;
                                console.log(error.message);
                            })
                    }


                },
                signIn() {
                    window.location.assign('/login');
                },
            },
            mounted() {
            this.resource_path = this.$parent.resource_path;
                console.log('Component mounted.')

            },






    }
</script>

<style lang="scss" scoped>
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

</style>
