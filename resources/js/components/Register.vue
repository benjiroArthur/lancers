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
                        <div class="mb-3">
                            <input v-model="form.password_confirmation" placeholder="Confirm Password" id="password-confirm" type="password"
                                   :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" name="password_confirmation" required autocomplete="new-password">

                            <has-error :form="form" field="password_confirmation"></has-error>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" required>
                            <label class="form-check-label" for="defaultCheck1">
                                I Agree To The Lancers <a href="#">User Agreement</a> And <a href="#">Privacy Policy</a>
                            </label>
                        </div>

                        <div class="text-center mt-3">
                            <button @click="next" type="button" class="btn btn-success bg-lancer btn-block">Join Lancers</button>

                        </div></form>
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
                            <div class="card-image text-center">
                                <img :src="this.$parent.resource_path+'/lancers_logo.png'" width="auto" height="50" alt="" loading="lazy">
                            </div>
                            <v-card class="clickable shadow m-3" @click="submit('freelancer')">
                                <v-card-title>I want to work <span class="fas fa-arrow-right text-right text-lancer ml-5"></span></v-card-title>
                            </v-card>

                            <v-card class="clickable shadow m-3" @click="submit('client')">
                                <v-card-title>I want to hire <span class="fas fa-arrow-right text-right text-lancer pull-right ml-5"></span></v-card-title>
                            </v-card>


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
                form: new Form({
                    email: '',
                    password: '',
                    password_confirmation: '',
                    user_type:'',
                }),
                nextPage: false,
            }
        },
        methods:{
            next(){
                if(this.form.email !== null && this.form.password !== null && this.password_confirmation !== null){
                    this.nextPage = true;
                }
                return;
            },
            back(){
                this.nextPage = false;
            },
            submit(value){
                alert(value);
               /* this.form.post('/register').then((response)=>{
                    window.location.assign('/home');
                })*/
            },
            signIn(){
              window.location.assign('/signup');
            },
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style lang="scss" scoped>
    .clickable{
        cursor: pointer;
        &:hover{
            background-color: white;
            color: #32a778;
            -webkit-transition: all 0.4s;
            -moz-transition: all 0.4s;
            transition: all 0.4s;
        }
    }
</style>
