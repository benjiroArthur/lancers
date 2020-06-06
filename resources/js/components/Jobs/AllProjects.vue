<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title text-bold">Projects</div>
                    <div class="card-tools">
                        <a class="text-lancer" href="#">View All <span class="fas fa-arrow-right"></span></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12 table-responsive">
                        <div class="card-body table table-responsive table-borderless p-0">
                            <bootstrap-table :data="allProjects" :options="myOptions" :columns="myColumns" sticky-header responsive borderless/>
                        </div>

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

                },
                myColumns: [
                    {field: 'project_title', title: 'Project'},
                    {field: 'project_cost', title: 'Cost'},
                    {field: 'description', title: 'Project Description'},
                    {field: 'duration', title: 'Project Duration'},
                    {
                        field: 'action',
                        title: 'Action',
                        align: 'center',
                        clickToSelect: false,
                        render: function (e, value, row) {
                        },
                        formatter: function (e, value, row) {

                            return '<a class="btn btn-sm show " data-toggle="modal" data-target="#"><i class="fas fa-check text-success"></i></a>'
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


            };
        },
        methods:{
            /*getProjects(){
                axios.get('/data/project')
                    .then((response)=>{
                        this.projects = response.data;
                        this.allProjects = this.projects.approvedJobs;
                    })
                    .catch()
            },*/
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
        },
    }
</script>

<style scoped>

</style>
