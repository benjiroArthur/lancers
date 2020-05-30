<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="card-title text-bold">Recent Projects</div>
                                <div class="card-tools">
                                    <a class="text-lancer" href="#">View All <span class="fas fa-arrow-right"></span></a>
                                </div>
                            </div>

                            <div class="card-body text-center">
                               <div class="mt-5 ml-5 pr-2">
                                   <i class="fas fa-clipboard-list h1 text-lancer"></i>
                                   <p>Start bidding now on projects the meet your skills</p>
                                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A exercitationem labore nesciunt sequi velit. Aliquid minima necessitatibus recusandae! Alias autem corporis eos error labore libero odio quam quis vero voluptatem!</p>
                                   <a class="btn bg-lancer text-white">Browse Projects</a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="card-title text-bold">Recent Projects</div>
                            </div>

                            <div class="card-body text-center">
                                <div class="mt-2 ml-2 pr-2">
                                    <div class="row">
                                        <div class="col-2">
                                            <img :src="this.$parent.resource_path + 'lancers_logo.png'" alt="" class="img-fluid">
                                        </div>

                                        <div class="col-10">
                                            <i class="fas fa-clipboard-list h1 text-lancer"></i>
                                            <p>Start bidding now on projects the meet your skills</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A exercitationem labore nesciunt sequi velit. Aliquid minima necessitatibus recusandae! Alias autem corporis eos error labore libero odio quam quis vero voluptatem!</p>
                                            <a class="btn bg-lancer text-white">Browse Projects</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="card-title"></div>
                                <div class="card-tools"></div>
                            </div>

                            <div class="card-body"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header">
                                <div class="card-title"></div>
                                <div class="card-tools"></div>
                            </div>

                            <div class="card-body"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FreelancerHome"
    }
</script>

<style scoped>

</style>
