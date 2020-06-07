<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="#" class="btn btn-outline-success text-right" title="Post A Job"><i class="fas fa-plus-circle"></i></a>
                        </div>
                        <ul class="nav nav-justified">
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link text-lancer text-bold">All Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link text-lancer text-bold">Completed Project</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link text-lancer text-bold">Pending Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-3" class="nav-link text-lancer text-bold">Jobs Unapplied For</a></li>
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
                            <div class="tab-pane" id="tab-eg7-3" role="tabpanel">
                                <unappliedjobs-table :unappliedjobs="this.unappliedjobs"></unappliedjobs-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-4" role="tabpanel">
                                <client-inprogress-table :inProgress="this.inProgress"></client-inprogress-table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title"></div>
                        <div class="card-tools"></div>
                    </div>

                    <div class="card-body"></div>
                </div>
            </div>
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
    </div>
</template>

<script>
    import CompletedTable from "../ClientTables/CompletedTable";
    import PendingTable from "../ClientTables/PendingTable";
    import AllProjectsTable from "../ClientTables/AllProjectsTable";
    import ClientInProgressTable from "../ClientTables/ClientInProgressTable";

    export default {
        name: "ClientPostJobs",
        components: {CompletedTable, PendingTable, AllProjectsTable, ClientInProgressTable},
        data(){
            return{
                categories:{},
                jobForm: new Form({
                    project_title:'',
                    job_type_id:'',
                    description:'',
                    project_cost:'',
                    duration:'',
                }),
                unappliedjobs: {},
                pending: {},
                completed: {},
                allprojects: {},
                inProgress: {},
            }
        },
        methods: {
            getCat(){
                axios.get('/data/job-category')
                    .then((response)=>{
                        this.categories = response.data;
                    }).catch((error)=>{
                        console.log(error.message);
                })
            },
            postJob(){
              this.jobForm.post().then((response)=>{
                  Fire.$emit('jobPosted');
                  Swal.fire(
                      'Success',
                      'Job Posted Successfully',
                      'success'
                  );
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
                    .catch()
            },
        },
        mounted() {
           // this.user_id = this.$parent.userId
            this.getCat();
            this.getAllUnappliedJobs();
            this.getAllPending();
            this.getCompleted();
            this.getAllProjects();
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
