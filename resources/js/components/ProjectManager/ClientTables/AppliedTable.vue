 <template>
        <div class="row">
            <div class="col-md-12">
                <div class="justify-content-between d-flex">
                    <h6 class="text-uppercase font-weight-bold">Applied Jobs</h6>
                </div>

                <div class="col-12 table-responsive">
                    <div class="card-body table table-responsive table-borderless p-0">
                        <bootstrap-table :data="appliedJobs" :options="myOptions" :columns="myColumns" sticky-header responsive borderless/>
                    </div>
                </div>
            </div>

        </div>

</template>

    <script>
        import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
        export default {
            name: "AppliedJobsTable",
            components: {BootstrapTable},
            props:{
                appliedJobs: {},
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
                        {
                            field: 'action',
                            title: 'Action',
                            align: 'center',
                            clickToSelect: false,
                            render: function (e, value, row) {
                            },
                            formatter: function (e, value, row) {

                                return ' <a class="btn btn-sm show "><i class="fas fa-eye text-success"></i></a> '
                            },
                            events: {
                                'click .show': function (e, value, row) {
                                    Fire.$emit('viewProjects', row);

                                },
                                'click .edit': function (e, value, row) {


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
                                            axios.delete('/data/' + row.id).then((response) => {
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




                };
            },
            methods:{


            },
            mounted() {

            },
        }
    </script>

    <style scoped>

    </style>
