<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="#" class="btn btn-outline-success text-center test-lancer" title="Post A Job" @click.prevent="initiatePost">Post Job</a>
                        </div>
                        <ul class="nav nav-justified">
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link text-lancer text-bold">All Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link text-lancer text-bold">Completed Project</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link text-lancer text-bold">Pending Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-3" class="nav-link text-lancer text-bold">Applied Jobs</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-4" class="nav-link text-lancer text-bold">Jobs Unapplied For</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-4" class="nav-link text-lancer text-bold">In Progress</a></li>
                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                                <allprojects-table :allprojects="this.allprojects"></allprojects-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-1" role="tabpanel">
                                <completed-table :completed="this.completed"></completed-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-2" role="tabpanel">
                                <pending-table :pending="this.pending"></pending-table>
                            </div>
                            <div class="tab-pane active" id="tab-eg7-3" role="tabpanel">
                                <applied-table :appliedJobs="this.appliedJobs"></applied-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-4" role="tabpanel">
                                <unappliedjobs-table :unappliedjobs="this.unappliedjobs"></unappliedjobs-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-5" role="tabpanel">
                                <client-inprogress-table :inProgress="this.inProgress"></client-inprogress-table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           <!-- <div class="col-md-3">
                <div class="card">
                    <project-application-table :applications="this.applications"></project-application-table>
                </div>
            </div>-->
        </div>
        <!--<div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title"></div>
                        <div class="card-tools"></div>
                    </div>

                    <div class="card-body"></div>
                </div>
            </div>
        </div>-->
        <!--post job modal-->
        <div class="modal fade" id="postJobModal" tabindex="-1" role="dialog" aria-labelledby="postJobModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="postJobModalLabel">Post A Job</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form ref="form" @submit.prevent="postJob">
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="project_title">Project Title</label>
                                <input v-model="jobForm.project_title" type="text" class="form-control" id="project_title" required>
                            </div>
                            <div class="form-group">
                                <label for="job_type_id">Category</label>
                                <select v-model="jobForm.job_type_id" class="form-control" id="job_type_id" required>
                                    <option selected value="Select One" disabled>Select One</option>
                                    <option v-for="(job, i) in jobType" :key="i" :value="job.id">{{job.name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea v-model="jobForm.description" type="text" class="form-control" id="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="project_cost">Estimated Cost</label>
                                <input v-model="jobForm.project_cost" type="text" class="form-control" id="project_cost" required>
                            </div>
                            <div class="form-group">
                                <label for="duration">Duration <span class="text-danger">*In Weeks</span></label>
                                <input v-model="jobForm.duration" type="text" class="form-control" id="duration" required>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Application Modal-->
        <div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewDetailsModalLabel">Job Applications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <div class="modal-body">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-outline-success">Save</button>
                        </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import CompletedTable from "../ClientTables/CompletedTable";
    import PendingTable from "../ClientTables/PendingTable";
    import AllProjectsTable from "../ClientTables/AllProjectsTable";
    import ClientInProgressTable from "../ClientTables/ClientInProgressTable";
    import ProjectApplicationTable from "../ClientTables/ProjectApplicationTable";
    import AppliedTable from "../ClientTables/AppliedTable";

    export default {
        name: "ClientPostJobs",
        components: {ProjectApplicationTable, CompletedTable, PendingTable, AllProjectsTable, ClientInProgressTable, AppliedTable},
        data(){
            return{
                categories:{},
                jobType:{},
                jobForm: new Form({
                    project_title:'',
                    job_type_id:'Select One',
                    description:'',
                    project_cost:'',
                    duration:'',
                    projectDetails:{},
                }),
                unappliedjobs: {},
                viewProjects: {},
                pending: {},
                completed: {},
                allprojects: {},
                inProgress: {},
                applications: {},
                appliedJobs: {},
            }
        },
        methods: {
            getCat(){
                axios.get('/data/job-type')
                    .then((response)=>{
                        this.jobType = response.data;
                    }).catch((error)=>{
                        console.log(error.message);
                })
            },
            initiatePost(){
                $('#postJobModal').modal('show');
            },
            postJob(){
                if(this.jobForm.job_type_id === 'Select One') return;
                $('#postJobModal').modal('hide');
                this.$Progress.start();
              this.jobForm.post('/data/client/post-project').then((response)=>{
                  this.allprojects.push(response.data);
                  Fire.$emit('jobPosted');
                  Swal.fire(
                      'Success',
                      'Job Posted Successfully',
                      'success'
                  );
                  this.$Progress.finish();
              })
            },
            getAllUnappliedJobs(){
                axios.get(`/data/client/unapplied-projects/${this.$parent.userId}`)
                    .then((response)=>{
                        this.unappliedjobs = response.data;
                    })
                    .catch()
            },
            getAllPending(){
                axios.get(`/data/client/not-completed/${this.$parent.userId}`)
                    .then((response)=>{
                        this.pending = response.data;
                    })
                    .catch()
            },
            getCompleted(){
                axios.get(`/data/client/completed-projects/${this.$parent.userId}`)
                    .then((response)=>{
                        this.completed = response.data;
                    })
                    .catch()
            },
            getInProgress(){
                axios.get(`/data/client/in-progress/${this.$parent.userId}`)
                    .then((response)=>{
                        this.inProgress = response.data;
                    })
                    .catch()
            },
            getAllProjects(){
                axios.get(`/data/client/client-projects/${this.$parent.userId}`)
                    .then((response)=>{
                        this.allprojects = response.data;
                    })
                    .catch((error)=>{
                        console.log(error.message)
                    })
            },
            getApplication(){
                axios.get(`/data/client/applications/${this.project_id}`)
                    .then((response)=>{
                        this.applications = response.data;
                    })
                    .catch()
            },
            getApplied(){
                axios.get(`/data/client/applied-projects/${this.$parent.userId}`)
                    .then((response)=>{
                        this.appliedJobs = response.data;
                    })
                    .catch((error)=>{
                        console.log(error.message)
                    })
            },

            getViewProjects(row){
                this.projectDetails = row;
                $('#viewDetailsModal').modal('show');

            },
        },
        mounted() {
           // this.user_id = this.$parent.userId
            this.getCat();
            this.getAllUnappliedJobs();
            this.getAllPending();
            this.getCompleted();
            this.getAllProjects();
            this.getApplication();
            this.getApplied();


            Fire.$on('jobPosted', ()=>{
                this.getAllUnappliedJobs();
                this.getAllPending();
                this.getCompleted();
                this.getAllProjects();
                this.getApplication();
                this.getApplied();
            });

            Fire.$on('viewProjects', (row)=>{this.getViewProjects(row)});
        },

    };


    let url = document.location.toString();
    if (url.match('#')){
        $('.nav-justified a[href="#' + url.split('#')[1]+ '"]').tab('show');
    }

    $('.nav-justified a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    });
</script>

<style lang="scss" scoped>
    .nav {
        :hover{
            color: #32a778;
        }
        .active {
            border-bottom: 2px solid #32a778;
        }

    }

</style>
