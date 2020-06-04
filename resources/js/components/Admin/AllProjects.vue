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
                        <div class="card">
                            <div class="card-header bg-lancer text-white">
                                Project Details
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="btn btn-primary bg-lancer text-right">Apply</a>
                            </div>
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
        name: "AllProjects",
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
                    {field: 'allProjects.project_title', title: 'Project'},
                    {field: 'allProjects.project_cost', title: 'Cost'},
                    {field: 'allProjects.description', title: 'Project Description'},
                    {
                        field: 'action',
                        title: 'Action',
                        align: 'center',
                        clickToSelect: false,
                        render: function (e, value, row) {
                        },
                        formatter: function (e, value, row) {

                            return '<a class="btn btn-sm show" data-toggle="modal" data-target="#"><i class="fas fa-eye text-info"></i></a>'
                        },
                        events: {
                            'click .show': function (e, value, row) {
                                Fire.$emit('viewSingleAdmin', row);

                            },
                            'click .edit': function (e, value, row) {
                                return window.location.assign('/admin/show/' + row.id)

                            },
                            'click .destroy': function (e, value, row) {
                                swal.fire({
                                    title: 'Are you sure?',
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.value) {
                                        axios.delete('/data/admin/' + row.id).then((response) => {
                                            if (response.data === "success") {
                                                Fire.$emit('tableUpdate');
                                                Swal.fire(
                                                    'Deleted!',
                                                    'User Deleted Successfully',
                                                    'success'
                                                );

                                            } else {
                                                Swal.fire(
                                                    'Failed!',
                                                    response.data,
                                                    'warning'
                                                )
                                            }
                                        }).catch(() => {
                                            Swal.fire(
                                                'Failed!',
                                                'User Could Not Be Deleted.',
                                                'warning'
                                            )
                                        });
                                    }

                                });
                            },
                        }
                    }
                ],
                projects: {},
                allProjects: {},


            };
        },
        methods:{
            getProjects(){
                axios.get('/data/project')
                    .then((response)=>{
                        this.projects = response.data;
                    })
                    .catch()
            },
        },
        mounted() {
            this.getProjects();
        },
    }
</script>

<style scoped>

</style>
