<template>
    <div class="row">
        <div class="col-md-12">
            <div class="justify-content-between d-flex">
                <h6 class="text-uppercase font-weight-bold">Projects Awaiting Acceptance</h6>
            </div>

            <div class="col-12 table-responsive">
                <div class="card-body table table-responsive table-borderless p-0">
                    <bootstrap-table :data="awaitingAcceptance" :options="myOptions" :columns="myColumns" sticky-header responsive borderless/>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
    export default {
        name: "AwaitingAcceptanceTable",
        components: {BootstrapTable},
        props:{
            awaitingAcceptance: {},
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

                            return ' <a class="btn btn-sm show bg-lancer">Accept</a> '+
                                ' <a class="btn btn-sm edit bg-danger">Reject</a> '
                        },
                        events: {
                            'click .show': function (e, value, row) {
                                Fire.$emit('makeChoice', 'accept', row);

                            },
                            'click .edit': function (e, value, row) {
                                Fire.$emit('makeChoice', 'reject', row);
                            },
                            'click .destroy': function (e, value, row) {

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
