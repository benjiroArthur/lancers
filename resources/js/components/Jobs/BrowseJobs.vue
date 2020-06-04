<template>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <all-projects></all-projects>
            </div>
            <div class="col-md-2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header bg-lancer text-white text-bold">
                                <div class="card-title text-wrap">
                                </div>
                                <div class="card-tools"></div>
                            </div>
                            <div class="card-body">
                                <nav class="nav flex-column">
                                    <a class="nav-link active " href="#">Active</a>
                                    <a class="nav-link" href="#">Link</a>
                                    <a class="nav-link" href="#">Link</a>
                                    <a class="nav-link disabled" href="#">Disabled</a>
                                </nav>
                            </div>
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
    import AllProjects from "./AllProjects";
    export default {
        name: "BrowseJobs",
        components: {AllProjects},
        data(){
            return{

            }
        },
        filters:{

        },
    }
</script>

<style scoped>

</style>
