<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <job-list></job-list>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow">
                            <div class="card-header bg-lancer text-white text-bold">
                                <div class="card-title text-wrap">
                                </div>
                                <div class="card-tools"></div>
                            </div>
                            <div class="card-body">
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
    import JobList from "./JobList";
    export default {
        name: "BrowseJobs",
        components: {JobList},
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
