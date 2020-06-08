<template>
    <div class="card-body table table-responsive table-borderless table-striped  p-0">
        <bootstrap-table :data="applications" :options="myOptions" :columns="myColumns" sticky-header responsive borderless />
    </div>
</template>

<script>
    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
    export default {
        name: "ProjectApplicationTable",
        props:{
            applications:{},
        },
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
                    {field: 'project.project_title', title: 'Project Title'},
                    {field: 'freelancer.full_name', title: 'Applicant Name'},
                    {
                        field: 'action',
                        title: 'Action',
                        align: 'center',
                        clickToSelect: false,
                        render: function (e, value, row) {
                        },
                        formatter: function (e, value, row) {

                            return ' <a class="btn btn-sm show bg-primary text-white" data-toggle="modal" data-target="#">Applicant Profile</a> ' +
                                ' <a class="btn btn-sm edit bg-lancer text-white" data-toggle="modal" data-target="#">Award Job</a> ' +
                                ' <a class="btn btn-sm delete " data-toggle="modal" data-target="#"><i class="fas fa-trash text-danger"></i></a> '
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
    }
</script>

<style scoped>

</style>
