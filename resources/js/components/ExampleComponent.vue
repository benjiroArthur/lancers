<template>
    <div class="container-fluid">
        <form name="login" class="main-login-form loginBox" @submit.prevent="submit" method="post">


            <div class="input-group mb-3">
                <input v-model="form.email" type="email" class="form-control" placeholder="Old Password"
                       :class="{ 'is-invalid': form.errors.has('email') }" name="email" id="email">
                <div class="input-group-append">
                    <div class="input-group-text divBor">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <has-error :form="form" field="old_password"></has-error>
            </div>
            <div class="input-group mb-3">
                <input v-model="form.password" placeholder="New Password" id="password" type="password"
                       :class="{ 'is-invalid': form.errors.has('password') }" class="form-control" name="password" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text divBor">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <has-error :form="form" field="password"></has-error>
            </div>
            <div class="input-group mb-3">
                <input v-model="form.password_confirmation" placeholder="Confirm Password" id="password-confirm" type="password"
                       :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <div class="input-group-append">
                    <div class="input-group-text divBor">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <has-error :form="form" field="password_confirmation"></has-error>
            </div>

            <div class="form-check form-check-inline text-lancer">
                <input v-model="form.user_type" class="form-check-input text-lancer bg-lancer" type="radio" name="user_type" id="inlineRadio1" value="freelancer">
                <label class="form-check-label" for="inlineRadio1">Freelancer</label>
            </div>
            <div class="form-check form-check-inline text-lancer">
                <input v-model="form.user_type" class="form-check-input text-lancer bg-lancer" type="radio" name="user_type" id="inlineRadio2" value="client">
                <label class="form-check-label" for="inlineRadio2">Project Manager</label>
            </div>

            <div class="row">
                <!-- /.col -->

                <button type="submit" class="btn btn-primary bg-health btn-block">Submit</button>

                <!-- /.col -->
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                form: new Form({
                    email: '',
                    password: '',
                    password_confirmation: '',
                    user_type:'',
                }),
            }
        },
        methods:{
            submit(){
                this.form.post('/register').then((response)=>{
                    window.location.assign('/home');
                })
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
