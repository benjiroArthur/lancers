<template>
    <div class="row">
        <div class="col-md-12">
            <div class="justify-content-between d-flex">
                <h6 class="text-uppercase font-weight-bold">All Projects</h6>
            </div>

            <div class="col-12 table-responsive">
                <div class="card-body table table-responsive table-borderless p-0">
                    <bootstrap-table :data="allprojects" :options="myOptions" :columns="myColumns" sticky-header responsive borderless/>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
    export default {
        name: "AllTable",
        components: {BootstrapTable},
        props: {
            allprojects:{},
        },
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
                    {field: 'project_title', title: 'Project Title'},
                    {field: 'project_cost', title: 'Project Cost'},
                    {field: 'description', title: 'Project Description'},
                    {field: 'status', title: 'Project Status'},
                   /* {
                        field: 'action',
                        title: 'Action',
                        align: 'center',
                        clickToSelect: false,
                        render: function (e, value, row) {
                        },
                        formatter: function (e, value, row) {

                            return ' <a class="btn btn-sm show " data-toggle="modal" data-target="#"><i class="fas fa-check text-success"></i></a> ' +
                                ' <a class="btn btn-sm edit " data-toggle="modal" data-target="#"><i class="fas fa-edit text-warning"></i></a> ' +
                                ' <a class="btn btn-sm delete " data-toggle="modal" data-target="#"><i class="fas fa-trash text-danger"></i></a> '
                        },
                        events: {
                            'click .show': function (e, value, row) {
                                Fire.$emit('viewSingleProject', row);

                            },
                            'click .edit': function (e, value, row) {


                            },
                            'click .destroy': function (e, value, row) {
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "You won't be able to revert this!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.value) {
                                        axios.delete('/data/client/delete-project' + row.id).then((response) => {
                                            if (response.data === "success") {
                                                Fire.$emit('tableUpdate');
                                                Swal.fire(
                                                    'Deleted!',
                                                    'Project Deleted Successfully',
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
                    }*/
                ],

            };
        },
        methods: {},
        mounted() {
        },
    }
</script>

<style scoped>

</style>
