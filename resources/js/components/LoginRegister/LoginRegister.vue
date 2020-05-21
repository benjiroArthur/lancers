<template>
        <a class="nav-link text-white" href="#" @click.prevent="openModal(info)">{{this.textInfo}}</a>
</template>

<script>
    export default {
        name: "LoginRegister",
        props: {
            info:{
            type: String,
            }
            },

        data(){
            return{
                textInfo: '',
            }
        },
        methods:{
            checkInfo(){
                if(this.info === 'login'){
                    this.textInfo = 'Login';
                }
                else if(this.info === 'register'){
                    this.textInfo = 'Register';
                }
            },
            openModal(data){
                if(data === 'login'){
                    Fire.$emit('loginForm')
                }
                else if(data === 'register'){
                    Fire.$emit('registerForm')
                }
            },
        },

        mounted(){
            this.checkInfo();
        }
    }

</script>

<style scoped>

</style>
