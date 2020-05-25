<template>
    <div class="container-fluid">
        <div class="jumbotron jumbotron-fluid welcome-jumbo">
            <div class="container justify-content-center">
                <h2 class="display-4 text-center text-dark">Welcome To Lancers</h2>
                <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto, ducimus eius id iure odit rem ut voluptatem! Esse est excepturi facere illo perferendis quia reprehenderit sunt unde! Quibusdam, soluta.</p>
                <div class="row justify-content-center">
                    <button class="btn btn-success text-white bg-lancer-dark m-2">Become a Freelancer</button>
                    <button class="btn btn-success text-white bg-lancer-dark m-2">Become a Project Manager</button>
                </div>
            </div>
        </div>


        <h2 class="text-center mt-3 mb-3 text-bold text-dark">OUR PROJECT CATEGORIES</h2>
        <div v-if="categories.length > 0" class="row">

            <div v-for="category in this.categories"  class="col-md-6 col-lg-3">

                <v-card class="cat-card p-2 shadow">
                    <v-card-title primary-title class="m-3 text-center">
                        <div>
                            <h4 class="headline mb-2 text-bold">{{category.name}}</h4>
                            <p> {{ category.description }} </p>
                        </div>
                    </v-card-title>
                    <v-img class="m-3"
                        :src="category.image_path"
                    ></v-img>

                </v-card>
            </div>
        </div>

        <h2 class="text-center mt-3 mb-3 text-bold text-dark">HOW TO GET STARTED</h2>

        <div class="row">
            <img :src="this.resource_path + '/howToGetStarted.gif'" alt="">
        </div>

        <h2 class="text-center mt-3 mb-3 text-bold text-dark">DO IT YOURSELF</h2>

        <div class="row">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-title mt-3 mb-2">Lifestyle</div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolorum ex explicabo ipsam, libero molestias mollitia nesciunt obcaecati
                        </div>
                        <div class="card-image m-3 img-fluid">
                            <img src="" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-title mt-3 mb-2">Lifestyle</div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolorum ex explicabo ipsam, libero molestias mollitia nesciunt obcaecati
                        </div>
                        <div class="card-image m-3 img-fluid">
                            <img src="" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-title mt-3 mb-2">Lifestyle</div>
                    <div class="card-body">
                        <div class="card-text mb-2">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores dolorum ex explicabo ipsam, libero molestias mollitia nesciunt obcaecati
                        </div>
                        <div class="card-image m-3 img-fluid">
                            <img src="" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Welcome",
        data(){
            return{
                categories: {},
                resource_path: '',
            }
        },
        methods:{
            getCat(){
                axios
                .get('/data/job-category')
                .then((response)=>{
                    this.categories = response.data;
                })
                .catch()
            }
        },
        mounted() {
            this.resource_path = this.$parent.resource_path;
            this.getCat();
        }
    }
</script>

<style lang="scss" scoped>
    .cat-card{
        border: 1px solid #44f631;
        & p{
            font-size: 14px;
        }
        font-family: "Roboto", sans-serif;
    }
    .welcome-jumbo{
        background: url("/images/welcome_banner.jpg") no-repeat center fixed;
        background-size: cover;
    }
</style>
