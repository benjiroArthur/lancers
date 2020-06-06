<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="#" class="btn btn-outline-success text-right"><i class="fas fa-plus-circle"></i></a>
                        </div>
                        <ul class="nav nav-justified">
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link text-lancer text-bold">All Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link text-lancer text-bold">Completed Project</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link text-lancer text-bold">Pending Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-3" class="nav-link text-lancer text-bold">Jobs Unapplied For</a></li>
                            <!--<li class="nav-item"><a data-toggle="tab" href="#tab-eg7-3" class="nav-link">Payments</a></li>-->
                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                                <allprojects-table></allprojects-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-1" role="tabpanel">
                                <completed-table></completed-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-2" role="tabpanel">
                                <pending-table></pending-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-3" role="tabpanel">
                                <unappliedjobs-table></unappliedjobs-table>
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
</template>

<script>
    import CompletedTable from "../ClientTables/CompletedTable";
    import PendingTable from "../ClientTables/PendingTable";
    import AllProjectsTable from "../ClientTables/AllProjectsTable";

    export default {
        name: "ClientPostJobs",
        components: {CompletedTable, PendingTable, AllProjectsTable},
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
            }
        },
        methods:{
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
        },
        mounted() {
            this.getCat();
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
