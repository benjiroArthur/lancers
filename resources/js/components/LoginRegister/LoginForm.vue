<template>
    <div class="modal" tabindex="-1" role="dialog" id="loginForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body shadow">
                    <div class="login-box justify-content-center ">
                        <!-- /.login-logo -->

                            <div class="card-body login-card-body bg-white">
                                <p class="login-box-msg text-lancer"><b>Sign In</b></p>

                                <form  class="main-login-form loginBox">

                                    <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input id="email" type="email" placeholder="Email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }" name="email" autofocus required>
                                        <div class="input-group-append">
                                            <div class="input-group-text divBor">
                                                <span class="fas fa-envelope text-success"></span>
                                            </div>
                                        </div>

                                    </div>
                                     <has-error :form="form" field="password"></has-error>
                                    </div>
                                    <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input id="password" type="password" placeholder="Password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" name="password" required >
                                        <div class="input-group-append">
                                            <div class="input-group-text divBor">
                                                <span class="fas fa-lock text-success"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <has-error :form="form" field="password"></has-error>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <button type="submit" class="btn btn-success btn-block">Sign In</button>
                                        </div>
                                        <!-- /.col -->

                                        <div class="col-12">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="remember" name="remember">
                                                <label for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->

                                    </div>
                                </form>

                                <p class="mb-1">

                                    <a class="btn btn-link" href="">
                                        Forgot Your Password?
                                    </a>

                                </p>

                            </div>

                            <!-- /.login-card-body -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LoginForm",
        data(){
            return{
                form: new Form({
                    email:'',
                    password:'',
                }),
            }
        },
        methods:{

        },
        mounted() {
            Fire.$on('loginForm', ()=>{
                $('#loginForm').modal('show');
            })
        }
    }
</script>

<style scoped>

</style>
