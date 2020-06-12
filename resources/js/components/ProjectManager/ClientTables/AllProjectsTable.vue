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
        <div class="modal fade" id="addFileModal" tabindex="-1" role="dialog" aria-labelledby="addFileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">Add Project Files</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <input type="file" ref="file" accept="application/zip" @change="loadFile($event)" name="file">
                        <span class="text-danger"> *Accept Zip Files Only</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click="uploadFile" class="btn btn-outline-success">Save</button>
                    </div>

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
                project: {},
                file: null,
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

                            return ' <a class="btn btn-sm show bg-lancer text-white" data-toggle="modal" data-target="#">Add Project Files</a> '
                        },
                        events: {
                            'click .show': function (e, value, row) {
                                Fire.$emit('addFiles', row);

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
                    }
                ],

            };
        },
        methods: {
            openFileModal(row){
                this.project = row;
                $('#addFileModal').modal('show');
            },
            loadFile(e){
                this.file = e.target.files[0];
            },
            uploadFile(){
                let formData = new FormData();
                formData.append('project_id', this.project.id);
                formData.append('file', this.file);

                axios.post( '/data/client/add-file',
                    formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    },
                    this.$Progress.start()
                ).then((response)=>{
                    if(response.data === 'success'){
                        $('#addFileModal').modal('hide');
                        Swal.fire(
                            'success',
                            'Files Uploaded Successfully',
                            'success'
                        );
                        this.$Progress.finish();
                    }
                }).catch((error)=>{console.log(error.message)})
            },
        },
        mounted() {
            Fire.$on('addFiles', (row)=>{
                this.openFileModal(row);
            });
        },
    }
</script>

<style scoped>

</style>
