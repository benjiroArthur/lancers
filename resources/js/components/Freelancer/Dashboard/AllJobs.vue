<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-justified">
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link text-lancer text-bold">All Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-3" class="nav-link text-lancer text-bold">Jobs Applied For</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-4" class="nav-link text-lancer text-bold">Awarded Jobs</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-5" class="nav-link text-lancer text-bold">Awaiting Payment</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link text-lancer text-bold">Projects In Progress</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-7" class="nav-link text-lancer text-bold">Awaiting Acceptance</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link text-lancer text-bold">Completed Project</a></li>
                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                                <lancer-allprojects-table :allProjects="this.allProjects"></lancer-allprojects-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-1" role="tabpanel">
                                <lancer-completed-table :completedProjects="this.completedProjects"></lancer-completed-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-2" role="tabpanel">
                                <lancer-inprogress-table :inProgressProjects="this.inProgressProjects"></lancer-inprogress-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-3" role="tabpanel">
                                <lancer-appliedjobs-table :appliedProjects="this.appliedProjects"></lancer-appliedjobs-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-4" role="tabpanel">
                                <lancer-awarded-table :awardedProjects="this.awardedProjects"></lancer-awarded-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-5" role="tabpanel">
                                <lancer-awaitpayment-table :awaitPayProjects="this.awaitPayProjects"></lancer-awaitpayment-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-7" role="tabpanel">
                                <lancer-awaitacceptance-table :awaitingAcceptance="this.awaitingAcceptance"></lancer-awaitacceptance-table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    import LancerAllProjectsTable from "../FreelancerTables/LancerAllProjectsTable";
    import LancerCompletedTable from "../FreelancerTables/LancerCompletedTable";
    import LancerInProgressTable from "../FreelancerTables/LancerInProgressTable";
    import LancerAppliedJobsTable from "../FreelancerTables/LancerAppliedJobsTable";
    import LancerAwardedTable from "../FreelancerTables/LancerAwardedTable";
    import LancerAwaitingPaymentTable from "../FreelancerTables/LancerAwaitingPaymentTable";
    import LancerAwaitingAcceptanceTable from "../FreelancerTables/LancerAwaitingAcceptanceTable";

    export default {
        name: "AllJobs",
        components:{LancerAwaitingAcceptanceTable, LancerAllProjectsTable, LancerCompletedTable, LancerInProgressTable, LancerAppliedJobsTable, LancerAwardedTable, LancerAwaitingPaymentTable},
        data(){
            return{
                client:{},
                auth_user: {},
                awardedProjects: {},
                awaitPayProjects: {},
                awaitingAcceptance: {},
                inProgressProjects: {},
                completedProjects: {},
                appliedProjects: {},
                allProjects: {},
            }
        },
        methods: {
            getUser(){
                axios
                    .get('/data/user')
                    .then((response) => {
                        let user = response.data;
                        this.auth_user = user.userable;
                    })
            },
            getAcceptance(){
                axios.get('/data/freelancer/await-acceptance')
                    .then((response)=>{
                        this.awaitingAcceptance = response.data;
                    })
                    .catch((error)=>{
                        console.log(error.message)
                    })
            },
            getInProgressProjects(){
                axios.get(`/data/freelancer/in-progress/${this.$parent.userId}`)
                    .then((response)=>{
                        this.inProgressProjects = response.data;
                    })
                    .catch()
            },
            getCompletedProjects(){
                axios.get(`/data/freelancer/completed-projects/${this.$parent.userId}`)
                    .then((response)=>{
                        this.completedProjects = response.data;
                    })
                    .catch()
            },
            getAppliedProjects(){
                axios.get(`/data/freelancer/applied/${this.$parent.userId}`)
                    .then((response)=>{
                        this.appliedProjects = response.data;
                    })
                    .catch()
            },
            getAllProjects(){
                axios.get(`/data/freelancer/job-offered/${this.$parent.userId}`)
                    .then((response)=>{
                        this.allProjects = response.data;
                    })
                    .catch()
            },
            getawardedProjects(){
                axios.get(`/data/freelancer/awarded-jobs`)
                    .then((response)=>{
                        this.awardedProjects = response.data;
                    })
                    .catch()
            },
            getawaitpayProjects(){
                axios.get(`/data/freelancer/jobs-waiting-payment`)
                    .then((response)=>{
                        this.awaitPayProjects = response.data;
                    })
                    .catch()
            },
            acceptJob(row, client){
                let full_name = this.auth_user.full_name;
                let project_id = row.project.id;
                let client_name = client.full_name;
                Swal.fire({
                    title: 'Accept This Project',
                    text: "I " + full_name + ', do Accept this project From '+ client_name ,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#32a778',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Accept it!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('/data/freelancer/accept-jobs', {
                            project_id: project_id
                        }).then((response) => {
                            if (response.data === "success") {
                                Fire.$emit('jobUpdate');
                                Swal.fire(
                                    'Success!',
                                    'Project Accepted, Wait For Payment Before You Start',
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
            declineJob(row){
                let project_id = row.project.id;
                Swal.fire({
                    title: 'Reject This Project',
                    text: 'You will not be able to apply for this project again' ,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#32a778',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Reject It!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('/data/freelancer/reject-project', {
                            project_id: project_id
                        }).then((response) => {
                            if (response.data === "success") {
                                Fire.$emit('jobUpdate');
                                Swal.fire(
                                    'Success!',
                                    'Project Rejected',
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
            submitJob(row){
                let project_id = row.project.id;
                Swal.fire({
                    title: 'Submit This Project',
                    text: 'I declare that I have completed this project' ,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#32a778',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Submit It!'
                }).then((result) => {
                    if (result.value) {
                        axios.post('/data/freelancer/submit-jobs', {
                            project_id: project_id
                        }).then((response) => {
                            if (response.data === "success") {
                                Fire.$emit('jobUpdate');
                                Swal.fire(
                                    'Success!',
                                    'Project Submitted',
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

            download(id){
                let filename = 'projectFiles.zip';
                axios.get('/data/download-files/'+id, {responseType: 'blob'})
                    .then(response => {
                       if(response.data !== 'no file'){
                           this.downloadFile(response, filename);
                       }
                       else{
                           Swal.fire(
                               'Error',
                               'No Files Available',
                               'warning'
                           );
                       }
                        //console.log(response);
                    }).catch(error => {
                    this.loading = false;
                    this.error = error.response.data.message || error.message;
                });
            },
            downloadFile(response, filename) {
                // It is necessary to create a new blob object with mime-type explicitly set
                // otherwise only Chrome works like it should
                var newBlob = new Blob([response.data]);
                // IE doesn't allow using a blob object directly as link href
                // instead it is necessary to use msSaveOrOpenBlob
                if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                    window.navigator.msSaveOrOpenBlob(newBlob);
                    return;
                }
                // For other browsers:
                // Create a link pointing to the ObjectURL containing the blob.
                const data = window.URL.createObjectURL(newBlob);
                var link = document.createElement('a');
                link.href = data;
                link.download = filename;
                link.click();
            },

            submitProject(row) {

            },

        },
        mounted() {
            this.getInProgressProjects();
            this.getCompletedProjects();
            this.getAppliedProjects();
            this.getAllProjects();
            this.getawardedProjects();
            this.getawaitpayProjects();
            this.getAcceptance();
            this.getUser();

            Fire.$on('acceptJob', (row)=>{
                axios.get('/data/get/client/'+ row.project.client_id).then((response)=>{
                    this.client = response.data;
                    this.acceptJob(row, this.client);
                });

            });

            Fire.$on('declineJob', (row)=>{
                this.declineJob(row);
            });

            Fire.$on('submitProject', (row)=>{
                this.submitJob(row);
            });
            Fire.$on('downloadFiles', (row)=>{
                this.download(row.project.id);
            });
            Fire.$on('jobUpdate', ()=>{
                this. getInProgressProjects();
                this.getCompletedProjects();
                this.getAppliedProjects();
                this.getAllProjects();
                this.getawardedProjects();
                this.getawaitpayProjects();
                this.getAcceptance();
                this.getUser();
            });


            Echo.channel('projectUpdate')
                .listen('ProjectUpdateEvent', (e)=>{
                    Fire.$emit('jobUpdate');
                });
        }
    }
</script>

<style lang="scss" scoped>
    .nav {
        :hover{
            color: #32a778;
        }
        .active {
            border-bottom: 2px solid #32a778;
        }

    }

</style>
