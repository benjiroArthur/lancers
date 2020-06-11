<template>
    <div class="row">
        <div class="col-md-12">
            <div class="justify-content-between d-flex">
                <h6 class="text-uppercase font-weight-bold">All Projects</h6>
            </div>

            <div class="col-12 table-responsive">
                <div class="card-body table table-responsive table-borderless p-0">
                    <bootstrap-table :data="awaitingPayment" :options="myOptions" :columns="myColumns" sticky-header responsive borderless/>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
    export default {
        name: "AwaitingPaymentTable",
        components: {BootstrapTable},
        props: {
            awaitingPayment:{},
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

                             return ' <a class="btn btn-sm show bg-lancer text-white" data-toggle="modal" data-target="#">Make Payment</a> '+
                             ' <a class="btn btn-sm edit bg-lancer text-white" data-toggle="modal" data-target="#">Invoice</a> '
                         },
                         events: {
                             'click .show': function (e, value, row) {
                                 Fire.$emit('makePayment', row);
                             },
                             'click .edit': function (e, value, row) {
                                 Fire.$emit('invoice', row);
                             },
                             'click .destroy': function (e, value, row) {
                                 /*Swal.fire({
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

                                 });*/
                             },
                         }
                     }
                ],

            };
        },
        methods: {
            makePayment(row){
                window.location.assign('/payment/'+ row.id);
            },
        },
        mounted() {
            Fire.$on('makePayment', (row)=>{
                this.makePayment(row);
            })
        },
    }
</script>

<style scoped>

</style>
