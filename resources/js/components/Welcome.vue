<template>
    <div class="container-fluid">
        <div class="jumbotron jumbotron-fluid">
            <div class="container justify-content-center">
                <h2 class="display-4 text-center text-black">Welcome To Lancers</h2>
                <p class="lead text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid architecto, ducimus eius id iure odit rem ut voluptatem! Esse est excepturi facere illo perferendis quia reprehenderit sunt unde! Quibusdam, soluta.</p>
                <div class="row justify-content-center">
                    <button class="btn btn-success text-white bg-lancer-dark m-2">Become a Freelancer</button>
                    <button class="btn btn-success text-white bg-lancer-dark m-2">Become a Project Manager</button>
                </div>
            </div>
        </div>

        <h2 class="text-center mt-3 mb-3 text-bold text-black">OUR PROJECT CATEGORIES</h2>

        <div class="row">
            <div class="col-md-2">
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

        <h2 class="text-center mt-3 mb-3 text-bold text-black">HOW TO GET STARTED</h2>

        <div class="row"></div>

        <h2 class="text-center mt-3 mb-3 text-bold text-black">DO IT YOURSELF</h2>

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
            }
        },
        methods:{
            getCat(){
                axios
                .get('')
                .then()
                .catch()
            }
        },
        mounted() {
        }
    }
</script>

<style scoped>

</style>
