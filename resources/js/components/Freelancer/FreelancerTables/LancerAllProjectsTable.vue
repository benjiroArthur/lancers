<template>
    <div class="row">
        <div class="col-md-12">
           <!-- <div class="justify-content-between d-flex">
                <h6 class="text-uppercase font-weight-bold">All Projects</h6>
            </div>-->
            <div class="col-12 table-responsive">
                <div class="card-body table table-responsive table-borderless p-0">
                    <bootstrap-table :data="allProjects" :options="myOptions" :columns="myColumns" sticky-header responsive borderless/>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
    export default {
        name: "LancerAllProjectsTable",
        components: {BootstrapTable},
        props:{
            allProjects: {},
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
                    {field: 'project.project_title', title: 'Project Title'},
                    {field: 'project.project_cost', title: 'Project Cost ($)'},
                    {field: 'project.description', title: 'Project Description'},
                    {field: 'status', title: 'Project Status'},
                    /*{
                        field: 'action',
                        title: 'Action',
                        align: 'center',
                        clickToSelect: false,
                        render: function (e, value, row) {
                        },
                        formatter: function (e, value, row) {

                                return '<a class="btn btn-sm show bg-lancer text-white" data-toggle="modal" data-target="#">Decline</a>'

                        },
                        events: {
                            'click .show': function (e, value, row) {
                                Fire.$emit('declineProject', row);

                            },
                            'click .edit': function (e, value, row) {


                            },
                            'click .destroy': function (e, value, row) {

                            },
                        }
                    }*/
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
