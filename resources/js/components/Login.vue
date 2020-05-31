<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="login-box justify-content-center col-md-5">
                <!-- /.login-logo -->
                <div class="card shadow">
                    <div class="card-body login-card-body justify-content-center mt-3 mb-3">
                        <div class="card-image text-center">
                            <img :src="this.$parent.resource_path+'/lancers_logo.png'" width="auto" height="50" alt="" loading="lazy">
                        </div>
                        <p class="login-box-msg text-center text-lancer text-bold h3 mt-3 mb-3"><b>Sign In</b></p>


                        <form name="login" class="main-login-form text-center" @submit.prevent="submit" method="post">


                            <div class="mb-3">
                                <input v-model="form.email" type="email" class="form-control" placeholder="Email"
                                       :class="{ 'is-invalid': form.errors.has('email') }" name="email" id="email">
                                <has-error :form="form" field="email"></has-error>
                            </div>
                            <div class="mb-3">
                                <input v-model="form.password" placeholder="Password" id="password" type="password"
                                       :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" name="password" required autocomplete="password">
                                <has-error :form="form" field="password"></has-error>
                            </div>

                              <div class=" row d-flex">
                                  <div class="icheck-success text-lancer text-left col-6">
                                      <input type="checkbox" id="remember" name="remember" v-model="form.remember">
                                      <label for="remember">
                                          Remember Me
                                      </label>
                                  </div>
                                  <a class="text-lancer d-block text-success text-sm-center text-lg-right col-6" href="#" @click="resetPass">
                                      Forgot Your Password?
                                  </a>



                              </div>



                            <div class="text-center mt-3">
                                <!-- /.col -->

                                <button type="submit" class="btn btn-success bg-lancer btn-block">Log In</button>

                                <!-- /.col -->
                            </div>
                        </form>

                        <br>
                        <div class="row justify-content-center">

                            <div class="col-12">
                                <p class="text-center text-danger">Don't Have Account? <a href="#" class="text-lancer" @click="signUp">Sign Up</a></p>

                            </div>
                        </div>

                    </div>

                    <!-- /.login-card-body -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Login",
        data(){
            return{
                form: new Form({
                    email: '',
                    password: '',
                    remember:'',
                }),
            }
        },
        methods:{
            submit(){
                this.form.post('/login').then((response)=>{
                    window.location.assign('/home');
                })
            },
            signUp(){
                window.location.assign('/register');
            },
            resetPass(){
                window.location.assign('/password/reset');
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>

</style>
