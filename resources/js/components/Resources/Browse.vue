<template>
    <li class="nav-item dropdown ml-4">
        <a class="nav-link count-indicator text-dark" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="fas fa-search text-dark h4"></i> Browse Jobs
        </a>


        <div class="dropdown-menu  dropdown-menu-center navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown" style="width: 500px">

            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title text-bold">Recent Projects</div>
                    <div class="card-tools">
                        <a class="text-lancer" href="#" @click="viewall">View All <span class="fas fa-arrow-right"></span></a>
                    </div>
                </div>

                <div v-if="browsejobs.length > 0" class="row m-0">
                    <div v-for="(job, index) in browsejobs" :key="index" class="col-12">
                        <div class="card m-0">
                            <div class="card-body m-0 p-1">
                                <div class="row">
                                    <div class="col-9">
                                        <h6 class="m-0">{{job.project_title}}</h6>
                                        <small class="p00 m-0">{{job.description | trimtext}}</small><br>
                                        <small class="p00 m-0">{{job.project_cost}}</small>
                                    </div>
                                    <div class="col-3 text-right">
                                        <button type="button" class="btn btn-outline-success text-right" @click="viewJob(job)" >View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               <!-- <div class="row m-0">
                    <div class="col-12">
                        <div class="card m-0">
                            <div class="card-body m-0 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="m-0">{{this.title}}</h6>
                                        <small class="p00 m-0">{{this.body | trimtext}}</small><br>
                                        <small class="p00 m-0">{{this.price}}</small>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-outline-success text-right" @click="addressToggle('false', $event)" >View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row m-0">
                    <div class="col-12">
                        <div class="card m-0">
                            <div class="card-body m-0 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="m-0">{{this.title}}</h6>
                                        <small class="p00 m-0">{{this.body | trimtext}}</small><br>
                                        <small class="p00 m-0">{{this.price}}</small>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-outline-success text-right" @click="addressToggle('false', $event)" >View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>-->
            </div>
        </div>
        <!--view Job Modal-->
        <div class="modal fade" id="viewJobModal" tabindex="-1" role="dialog" aria-labelledby="viewJobModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewJobModalLabel">Project Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <div class="modal-body">
                            <div class="row justify-content-between d-flex border-bottom m-2">
                                <h5>{{this.job.project_title}}</h5>
                                <h6>$ {{this.job.project_cost}}</h6>
                            </div>
                            <p>{{this.job.description}}</p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-outline-success" @click="apply()">Apply For this Job </button>
                        </div>

                </div>
            </div>
        </div>
    </li>
</template>

<script>
    export default {
        name: "Browse",
        data(){
            return{
               /* title: 'This is a title',
                body: 'This is the whole body of the card. It includes the job done by the freelancer. Its description and other relevant details',
                price: '$200',*/
                browsejobs: {},
                job:{},
            }

        },
        methods:{
            viewall(){
                window.location.assign('/browse/projects')
            },
            getProjects(){
                    axios
                        .get('/data/latest-projects')
                        .then((response) => {
                            this.browsejobs = response.data;
                        })

                },
            viewJob(job){
                this.job = job;
                $('#viewJobModal').modal('show');
            },
            apply(){
                $('#viewJobModal').modal('hide');
                let id = this.job.id;
                Swal.fire({
                    title: 'Confirm Job Application',
                    text: "You are about to apply for this job",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#32a778',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Apply!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('/data/freelancer/apply-job/' + id).then((response) => {
                            if(response.data === "success")
                            {
                                /*Fire.$emit('tableUpdate');*/
                                Swal.fire(
                                    'Success!',
                                    'Job Application Successful',
                                    'success'
                                );

                            }
                            else{
                                Swal.fire(
                                    'Failed!',
                                    response.data,
                                    'warning'
                                )
                            }
                        }).catch((error) => {
                            console.log(error.message)
                        });
                    }

                });
            },
        },
        mounted() {
            this.getProjects();
        },
    }
</script>

<style scoped>

</style>
