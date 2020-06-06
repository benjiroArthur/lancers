<template>
    <div class="row">
        <div class="col-md-12">
            <div class="justify-content-between d-flex">
               <h6 class="text-uppercase font-weight-bold">Users (Admins)</h6>
                <a href="#" class="btn btn-outline-success text-right" data-toggle="modal" data-target="#addUserModal"><i class="fas fa-user-plus"></i></a>
            </div>

            <div class="col-12 table-responsive">
                <div class="card-body table table-responsive table-borderless p-0">
                    <bootstrap-table :data="admins" :options="myOptions" :columns="myColumns" sticky-header responsive borderless/>
                </div>
            </div>
        </div>
       <!--add user modal-->
        <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form ref="form" @submit.prevent="addUser">
                    <div class="modal-body">

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input v-model="form.email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
<!--
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
-->
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
    </div>
</template>

<script>
    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
    export default {
        name: "AdminsTable",
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
                admins: {},
                form: new Form({
                    email:'',
                }),


            };
        },
        methods:{
            getAdmins(){
                axios.get('/data/admin/getAdmins')
                    .then((response)=>{
                        this.admins = response.data;
                    })
                    .catch()
            },
            addUser(){
                this.$Progress.start();
                axios
                this.form.post('/data/admin/user')
                .then((response) => {
                    let data = response.data;
                    this.admins.push(data);
                    $('#addUserModal').modal('hide');
                    Swal.fire(
                        'Success!',
                        'User Added Successfully',
                        'success'
                    );
                })
                .catch((error)=>{
                    console.log(error.message);
                })
            },
        },
        mounted() {
            this.getAdmins();
        },
    }
</script>

<style scoped>

</style>
