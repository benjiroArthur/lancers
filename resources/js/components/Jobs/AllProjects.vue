<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title text-bold">Available Jobs</div>
                </div>

                <div class="card-body">
                    <div class="col-12 table-responsive">
                        <div class="card-body table table-responsive table-borderless table-striped  p-0">
                            <bootstrap-table :data="allProjects" :options="myOptions" :columns="myColumns" sticky-header responsive borderless />
                        </div>
                    </div>
                </div>
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
                        <button type="button" class="btn btn-outline-success" @click="apply()">Apply For this Job {{this.job.id}}</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
    export default {
        name: "JobList",
        components: {BootstrapTable},
        data() {
            return {
                myOptions: {
                    search: true,
                    pagination: true,
                    toolbar: '#toolbar',
                    clickToSelect: true,
                    selectItemName: 'id',
                    index: true,
                    perPage: 5,

                },
                myColumns: [
                    {field: 'project_title', title: 'Project Title'},
                    {field: 'job_type.name', title: 'Category'},
                    {field: 'project_cost', title: 'Cost ($)'},
                    {field: 'description', title: 'Project Description'},
                    {
                        field: 'action',
                        title: 'Action',
                        align: 'center',
                        clickToSelect: false,
                        render: function (e, value, row) {
                        },
                        formatter: function (e, value, row) {

                            return '<a class="btn btn-sm show bg-lancer text-white" data-toggle="modal" href="#" data-target="#">Apply</a>'
                        },
                        events: {
                            'click .show': function (e, value, row) {
                                Fire.$emit('viewSingleJob', row);

                            },
                            'click .edit': function (e, value, row) {


                            },
                            'click .destroy': function (e, value, row) {

                            },
                        }
                    }
                ],
                projects: {},
                allProjects: {},
                job:{},


            };
        },
        methods:{

            getProjects(){
                axios
                    .get('/data/available-projects')
                    .then((response) => {
                        this.allProjects = response.data;
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
                    title: 'Confirm Job Application for '+ id,
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
            Fire.$on('viewSingleJob', (row)=>{
                this.job = row;
                this.apply();
            });
        },
    }
</script>

<style scoped>

</style>
