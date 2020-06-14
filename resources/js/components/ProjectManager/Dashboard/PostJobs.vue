<template>
    <div class="container-fluid pr-3 pl-3">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div  class="card-tools">
                            <a href="#" class="btn btn-outline-success text-center test-lancer" title="Post A Job" @click.prevent="initiatePost">Post Job</a>
                            <!--<a href="#" id="myPrint" class="btn btn-outline-success text-center test-lancer" title="Post A Job" @click.prevent="print">Print</a>-->
                        </div>
                        <ul class="nav nav-justified my-tabs">
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link text-lancer text-bold">All Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-4" class="nav-link text-lancer text-bold">Jobs Unapplied For</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-3" class="nav-link text-lancer text-bold">Applied Jobs</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link text-lancer text-bold">Pending Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-6" class="nav-link text-lancer text-bold">Awaiting Payment</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-5" class="nav-link text-lancer text-bold">In Progress</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-7" class="nav-link text-lancer text-bold">Awaiting Acceptance</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link text-lancer text-bold">Completed Project</a></li>

                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                                <allprojects-table :allprojects="this.allprojects"></allprojects-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-1" role="tabpanel">
                                <completed-table :completed="this.completed"></completed-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-2" role="tabpanel">
                                <pending-table :pending="this.pending"></pending-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-3" role="tabpanel">
                                <applied-table :appliedJobs="this.appliedJobs"></applied-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-4" role="tabpanel">
                                <unappliedjobs-table :unappliedjobs="this.unappliedjobs"></unappliedjobs-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-5" role="tabpanel">
                                <client-inprogress-table :inProgress="this.inProgress"></client-inprogress-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-6" role="tabpanel">
                                <awaitpayment-table :awaitingPayment="this.awaitingPayment"></awaitpayment-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-7" role="tabpanel">
                                <awaitacceptance-table :awaitingAcceptance="this.awaitingAcceptance"></awaitacceptance-table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!--post job modal-->
        <div class="modal fade" id="postJobModal" tabindex="-1" role="dialog" aria-labelledby="postJobModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="postJobModalLabel" v-show="!editMode">Post A Job</h5>
                        <h5 class="modal-title" id="editJobModalLabel" v-show="editMode">Edit A Job</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form ref="form" @submit.prevent="editMode === true ? updateJob() : postJob()" >
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="project_title">Project Title</label>
                                <input v-model="jobForm.project_title" type="text" class="form-control" id="project_title" required>
                            </div>
                            <div class="form-group">
                                <label for="job_type_id">Category</label>
                                <select v-model="jobForm.job_type_id" class="form-control" id="job_type_id" required>
                                    <option selected value="Select One" disabled>Select One</option>
                                    <option v-for="(job, i) in jobType" :key="i" :value="job.id">{{job.name}}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea v-model="jobForm.description" type="text" class="form-control" id="description" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="project_cost">Estimated Cost</label>
                                <input v-model="jobForm.project_cost" type="text" class="form-control" id="project_cost" required>
                            </div>
                            <div class="form-group">
                                <label for="duration">Duration <span class="text-danger">*In Weeks</span></label>
                                <input v-model="jobForm.duration" type="text" class="form-control" id="duration" required>
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button v-show="editMode" type="submit" class="btn btn-outline-success">Update</button>
                            <button v-show="!editMode" type="submit" class="btn btn-outline-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--Application Modal-->
        <div class="modal fade" id="viewDetailsModal" tabindex="-1" role="dialog" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewDetailsModalLabel">Job Applications</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <div class="modal-body">
                            <div class="col-12 table-responsive">
                                <div class="card-body table table-responsive table-borderless p-0">
                                    <bootstrap-table :data="projectDetails" :options="detmyOptions" :columns="detmyColumns" sticky-header responsive borderless/>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!--<button type="submit" class="btn btn-outline-success">Save</button>-->
                        </div>

                </div>
            </div>
        </div>

        <!--freelancer profile modal-->
        <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="profileModalLabel">Applicant Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="image-holder image-circle">
                                        <img :src="this.freelancer.image_path" alt="" class="img-fluid" >
                                    </div>
                                </div>
                                <div v-if="this.freelancer !== null" class="col-md-7">
                                    <p><strong>Name: </strong> {{this.freelancer.full_name}}</p>
                                    <p><strong>Job Title: </strong> {{this.freelancerPortfolio.title}}</p>
                                    <p><strong>Profile Summary: </strong> {{this.freelancerPortfolio.description}}</p>
                                    <hr>
                                    <div v-if="this.education !== null">
                                        <div v-for="(edu, i) in this.freelancerEducation" :key="i">
                                            <p><strong>Institution: {{edu.institution}}</strong></p>
                                            <p>Qualification: {{edu.qualification}}</p>
                                            <hr>
                                        </div>

                                    </div>
                                    <div v-if="this.freelancerLinks !== null">
                                        <a v-for="(link, i) in this.freelancerLinks" :key="i" :href="link">{{link}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <!--<button type="submit" class="btn btn-outline-success">Save</button>-->
                        </div>

                </div>
            </div>
        </div>

        <!--invoice modal-->
        <div class="modal fade" id="invoiceModal" tabindex="-1" role="dialog" aria-labelledby="invoiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-body">
                            <invoice :userAddress="this.userAddress" :resourcePath="this.$parent.resource_path" :project="this.selectedProject" :client="this.auth_user"></invoice>
                        </div>
                </div>
            </div>
        </div>
        <!--<new-invoice :resourcePath="this.$parent.resource_path"></new-invoice>-->
       <!-- <invoice :resourcePath="this.$parent.resource_path"></invoice>
        <payout></payout>-->

    </div>
</template>

<script>
    import Invoice from "../../Resources/Invoice";
    import CompletedTable from "../ClientTables/CompletedTable";
    import PendingTable from "../ClientTables/PendingTable";
    import AllProjectsTable from "../ClientTables/AllProjectsTable";
    import ClientInProgressTable from "../ClientTables/ClientInProgressTable";
    import ProjectApplicationTable from "../ClientTables/ProjectApplicationTable";
    import AppliedTable from "../ClientTables/AppliedTable";
    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
    import AwaitingPaymentTable from "../ClientTables/AwaitingPaymentTable";
    import AwaitingAcceptanceTable from "../ClientTables/AwaitingAcceptanceTable";

    export default {
        name: "ClientPostJobs",
        components: {ProjectApplicationTable, CompletedTable, PendingTable, AllProjectsTable, ClientInProgressTable, AppliedTable, Invoice, BootstrapTable, AwaitingPaymentTable, AwaitingAcceptanceTable},
        data(){
            return{
                editMode: false,
                auth_user: {},
                freelancer:{},
                selectedProject:{},
                freelancerPortfolio: {},
                freelancerEducation: {},
                freelancerLinks: {},
                categories:{},
                jobType:{},
                userAddress:{},
                awaitingPayment: {},
                awaitingAcceptance: {},
                jobForm: new Form({
                    id: '',
                    project_title:'',
                    job_type_id:'Select One',
                    description:'',
                    project_cost:'',
                    duration:'',
                    projectDetails:{},
                }),
                unappliedjobs: {},
                projectDetails: {},
                pending: {},
                completed: {},
                allprojects: {},
                inProgress: {},
                applications: {},
                appliedJobs: {},
                detmyOptions: {
                    search: true,
                    pagination: true,
                    toolbar: '#toolbar',
                    clickToSelect: true,
                    selectItemName: 'id',
                    index: true,

                },
                detmyColumns: [
                    {field: 'project.project_title', title: 'Project Title'},
                    {field: 'freelancer.full_name', title: 'Freelancer'},
                    {
                        field: 'action',
                        title: 'Action',
                        align: 'center',
                        clickToSelect: false,
                        render: function (e, value, row) {
                        },
                        formatter: function (e, value, row) {

                            return ' <a class="btn btn-sm show bg-primary text-white" data-toggle="modal" data-target="#">View Profile</a> ' +
                                ' <a class="btn btn-sm edit bg-lancer text-white" data-toggle="modal" data-target="#">Award Project</a> '
                        },
                        events: {
                            'click .show': function (e, value, row) {
                                Fire.$emit('viewProfile', row);

                            },
                            'click .delete': function (e, value, row) {

                            },
                            'click .edit': function (e, value, row) {
                                Fire.$emit('awardJob', row);
                            },
                        }
                    }
                ],
            }
        },
        methods: {
            getCat(){
                axios.get('/data/job-type')
                    .then((response)=>{
                        this.jobType = response.data;
                    }).catch((error)=>{
                        console.log(error.message);
                })
            },
            getUser(){
                axios
                    .get('/data/user')
                    .then((response) => {
                        let user = response.data;
                        this.auth_user = user.userable;
                        this.userAddress = user.address;
                    })
            },
            initiatePost(){
                this.editMode = false;
                this.jobForm.reset();
                $('#postJobModal').modal('show');
            },
            postJob(){
                if(this.jobForm.job_type_id === 'Select One') return;
                $('#postJobModal').modal('hide');
                this.$Progress.start();
              this.jobForm.post('/data/client/post-project').then((response)=>{
                  this.allprojects.push(response.data);
                  Fire.$emit('jobPosted');
                  Swal.fire(
                      'Success',
                      'Job Posted Successfully',
                      'success'
                  );
                  this.$Progress.finish();
              })
            },
            awardJob(row){
                let freelancer = row.freelancer;
                let project = row.project;
                let full_name = this.auth_user.full_name;
                Swal.fire({
                    title: 'Award This Project',
                    text: "I " + full_name + ', do award this project to '+ freelancer.full_name ,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#32a778',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Award it!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('/data/client/award-project', {
                            project_id: project.id,
                            freelancer_id: freelancer.id
                        }).then((response) => {
                            if (response.data === "success") {
                                $('#viewDetailsModal').modal('show');
                                Fire.$emit('jobPosted');
                                Swal.fire(
                                    'Success!',
                                    'Project Awarded',
                                    'success'
                                );

                            } else {
                                Swal.fire(
                                    'Failed!',
                                    response.data,
                                    'warning'
                                )
                            }
                        }).catch((error) => {
                            Swal.fire(
                                'Failed!',
                                error.message,
                                'warning'
                            )
                        });
                    }

                });
            },
            AcceptReject(action, row){
                axios.post('/data/client/accept-job',
                    {
                        project_id: row.id,
                        action: action
                    }
                ).then((response)=>{
                    if(response.data === 'accepted'){
                        Swal.fire(
                            'Success',
                            'Project Accepted',
                            'success'
                        );
                    }else if(response.data === 'rejected'){
                        Swal.fire(
                            'Success',
                            'Project Rejected',
                            'success'
                        );
                    }
                }).catch((error)=>{
                    console.log(error.message);
                });
            },
            initiateEdit(row){
               this.editMode = true;
               this.jobForm.fill(row);
               $('#postJobModal').modal('show');
            },
            updateJob(){

                this.$Progress.start();
                this.jobForm.post('/data/client/post-project/' + this.jobForm.id)
                .then((response) => {
                    if(response.data === 'success'){
                        $('#postJobModal').modal('hide');
                        Fire.$emit('jobPosted');
                        Swal.fire(
                            'Updated',
                            'Job information been updated',
                            'success'
                        );
                        this.$Progress.finish();
                    }
                })
                .catch((error) => {
                    console.log(error.message);
                });
            },



            getAllUnappliedJobs(){
                axios.get(`/data/client/unapplied-projects/${this.$parent.userId}`)
                    .then((response)=>{
                        this.unappliedjobs = response.data;
                    })
                    .catch()
            },
            getAllPending(){
                axios.get(`/data/client/not-completed/${this.$parent.userId}`)
                    .then((response)=>{
                        this.pending = response.data;
                    })
                    .catch()
            },
            getCompleted(){
                axios.get(`/data/client/completed-projects/${this.$parent.userId}`)
                    .then((response)=>{
                        this.completed = response.data;
                    })
                    .catch()
            },
            getInProgress(){
                axios.get(`/data/client/in-progress/${this.$parent.userId}`)
                    .then((response)=>{
                        this.inProgress = response.data;
                    })
                    .catch()
            },
            getAllProjects(){
                axios.get(`/data/client/client-projects/${this.$parent.userId}`)
                    .then((response)=>{
                        this.allprojects = response.data;
                    })
                    .catch((error)=>{
                        console.log(error.message);
                    })
            },
            getApplication(id){
                axios.get(`/data/client/applications/${id}`)
                    .then((response)=>{
                        this.projectDetails = response.data;
                    })
                    .catch()
            },
            getApplied(){
                axios.get(`/data/client/applied-projects/${this.$parent.userId}`)
                    .then((response)=>{
                        this.appliedJobs = response.data;
                    })
                    .catch((error)=>{
                        console.log(error.message)
                    })
            },
            getAwaitingPayment(){
                axios.get(`/data/client/awaitingPaymentProjects`)
                    .then((response)=>{
                        this.awaitingPayment = response.data;
                    })
                    .catch((error)=>{
                        console.log(error.message)
                    })
            },
            getAwaitingAcceptance(){
                axios.get(`/data/client/await-acceptance`)
                    .then((response)=>{
                        this.awaitingAcceptance = response.data;
                    })
                    .catch((error)=>{
                        console.log(error.message)
                    })
            },

            getViewProjects(row){
                this.getApplication(row.id);
                $('#viewDetailsModal').modal('show');

            },
            viewProfile(freelancer){
                this.freelancer = freelancer;
                this.freelancerPortfolio = freelancer.portfolio;
                this.freelancerLinks = freelancer.links;
                this.freelancerEducation = freelancer.education;
                $('#profileModal').modal('show');
            },
            print () {
                // Pass the element id here
                $('.myPrint').addClass('d-none');
                this.$htmlToPaper('print-invoice');
                $('.myPrint').removeClass('d-none');
                $('#invoiceModal').modal('hide');
            },
            invoice (row) {
                this.selectedProject = row;
                $('#invoiceModal').modal('show');
            },
        },
        mounted() {
            this.getUser();
            this.getCat();
            this.getAllUnappliedJobs();
            this.getAllPending();
            this.getCompleted();
            this.getAllProjects();
            this.getApplied();
            this.getAwaitingPayment();
            this.getAwaitingAcceptance();
            this.getInProgress();


            Fire.$on('jobPosted', ()=>{
                this.getAllUnappliedJobs();
                this.getAllPending();
                this.getCompleted();
                this.getAllProjects();
                this.getApplied();
                this.getApplied();
                this.getAwaitingPayment();
                this.getAwaitingAcceptance();
                this.getInProgress();
            });

            Fire.$on('viewProjects', (row)=>{this.getViewProjects(row)});
            Fire.$on('viewProfile', (row)=>{this.viewProfile(row.freelancer)});
            Fire.$on('awardJob', (row)=>{this.awardJob(row)});
            Fire.$on('invoice', (row)=>{this.invoice(row)});
            Fire.$on('makeChoice', (action, row)=>{this.AcceptReject(action, row)});
            Fire.$on('editProject', (row)=>{this.initiateEdit(row)});

            Echo.channel('projectUpdate')
                .listen('ProjectUpdateEvent', (e)=>{
                    Fire.$emit('jobPosted');
                });
        },

    };


    /*let url = document.location.toString();
    if (url.match('#')){
        $('.nav-justified a[href="#' + url.split('#')[1]+ '"]').tab('show');
    }

    $('.nav-justified a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    });*/
</script>

<style lang="scss" scoped >
    .nav {
        :hover{
            color: #32a778;
        }
        .active {
            border-bottom: 2px solid #32a778;
        }
        /*@media (max-width: 600px) {
            overflow: scroll;
        }*/

    }

</style>
