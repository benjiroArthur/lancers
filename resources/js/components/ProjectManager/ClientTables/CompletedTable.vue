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
        <!-- Modal -->
        <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewModalLabel">Rating</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-check form-check-inline rating">
                            <input v-model="reviewForm.rating" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1">
                            <label class="form-check-label" for="inlineRadio1"><span class="fas fa-star"></span></label>
                        </div>
                        <div class="form-check form-check-inline rating">
                            <input v-model="reviewForm.rating" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                            <label class="form-check-label" for="inlineRadio2"><span class="fas fa-star"></span></label>
                        </div>
                        <div class="form-check form-check-inline rating">
                            <input v-model="reviewForm.rating" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                            <label class="form-check-label" for="inlineRadio3"><span class="fas fa-star"></span> </label>
                        </div>
                        <div class="form-check form-check-inline rating">
                            <input v-model="reviewForm.rating" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio4" value="4">
                            <label class="form-check-label" for="inlineRadio4"><span class="fas fa-star"></span> </label>
                        </div>
                        <div class="form-check form-check-inline rating">
                            <input v-model="reviewForm.rating" class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio5" value="5">
                            <label class="form-check-label" for="inlineRadio5"><span class="fas fa-star"></span> </label>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Comment</label>
                            <textarea v-model="reviewForm.comment" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click="sendReview" class="btn btn-success bg-lancer">Submit</button>
                    </div>
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
        props:{
            completed:{},
        },
        data() {
            return {
                project_id: '',
                reviewForm: new Form({
                    rating: '',
                    comment: '',
                }),
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

                            return ' <a class="btn btn-sm show bg-lancer text-white" data-toggle="modal" data-target="#">Review Freelancer</a> '
                        },
                        events: {
                            'click .show': function (e, value, row) {
                                Fire.$emit('review', row);

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
                                        axios.delete('/data/admin/' + row.id).then((response) => {
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
            sendReview(){
                this.$Progress.start();
                this.reviewForm.post(`/data/client/review/${this.project_id}`).then((response)=>{
                    if(response.data === 'success'){
                        $('#reviewModal').modal('hide');
                        Swal.fire(
                            'Success',
                            'Thanks For Reviewing',
                            'success'
                        );
                        this.$Progress.finish();
                    }
                }).catch((error)=>{
                    this.$Progress.fail();
                    console.log(error.message)
                })
            },
        },
        mounted() {
            Fire.$on('review', (row)=>{
                this.project_id = row.id;
                $('#reviewModal').modal('show');
            });
        },
    }
</script>

<style lang="scss" scoped>
    .rating input {
       /* position:absolute;
        top:0px;
        left:0px;*/
        opacity:0;
    }
    .rating label{
        display:inline-block;
        width:30px;
        height:30px;
        text-align:center;
        color: #666666;
        font-size:30px;
        margin-right:2px;
        line-height:30px;
        border-radius:50%;
        -webkit-border-radius:50%;
    }

    /*.rating span:hover ~ span label,
    .rating span:hover label,
    .rating span.checked label,
    .rating span.checked ~ span label {
        //background:#F90;
        color:#F90;
    }*/
    .rating label:hover,
    {
        color:#F90;
    }
    .rating input[type="radio"]:checked+label{
            color:#F90;
        }

</style>
