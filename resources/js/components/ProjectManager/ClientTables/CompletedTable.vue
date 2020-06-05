<template>
    <div class="row">
        <div class="col-md-12">
            <div class="justify-content-between d-flex">
                <h6 class="text-uppercase font-weight-bold">Completed Projects</h6>
            </div>

            <div class="col-12 table-responsive">
                <div class="card-body table table-responsive table-borderless p-0">
                    <bootstrap-table :data="completed" :options="myOptions" :columns="myColumns" sticky-header responsive borderless/>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
    export default {
        name: "CompletedTable",
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
                    {field: 'full_name', title: 'Name'},
                    {field: 'email', title: 'E-mail'},
                    {field: 'address.phone_number', title: 'Mobile Number'},
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
                completed: {},


            };
        },
        methods:{
            getCompleted(){
                axios.get(`data/client/completed-projects/${this.$parent.user_id}`)
                    .then((response)=>{
                        this.completed = response.data;
                    })
                    .catch()
            },
        },
        mounted() {
            this.getCompleted();
        },
    }
</script>

<style scoped>

</style>
