<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-justified">
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link text-lancer text-bold">All Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link text-lancer text-bold">Completed Project</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link text-lancer text-bold">Projects In Progress</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-3" class="nav-link text-lancer text-bold">Jobs Applied For</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-4" class="nav-link text-lancer text-bold">Awarded Jobs</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-5" class="nav-link text-lancer text-bold">Awaiting Payment</a></li>
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
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-md-3">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title"></div>
                        <div class="card-tools"></div>
                    </div>

                    <div class="card-body"></div>
                </div>
            </div>-->
        </div>
        <!--<div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title"></div>
                        <div class="card-tools"></div>
                    </div>

                    <div class="card-body"></div>
                </div>
            </div>
        </div>-->
    </div>
</template>

<script>
    import LancerAllProjectsTable from "../FreelancerTables/LancerAllProjectsTable";
    import LancerCompletedTable from "../FreelancerTables/LancerCompletedTable";
    import LancerInProgressTable from "../FreelancerTables/LancerInProgressTable";
    import LancerAppliedJobsTable from "../FreelancerTables/LancerAppliedJobsTable";
    import LancerAwardedTable from "../FreelancerTables/LancerAwardedTable";
    import LancerAwaitingPaymentTable from "../FreelancerTables/LancerAwaitingPaymentTable";

    export default {
        name: "AllJobs",
        components:{LancerAllProjectsTable, LancerCompletedTable, LancerInProgressTable, LancerAppliedJobsTable, LancerAwardedTable, LancerAwaitingPaymentTable},
        data(){
            return{
                awardedProjects: {},
                awaitPayProjects: {},
                inProgressProjects: {},
                completedProjects: {},
                appliedProjects: {},
                allProjects: {},
            }
        },
        methods: {
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
                        this.allprojects = response.data;
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
            acceptJob(row){},

        },
        mounted() {
            this. getInProgressProjects();
            this.getCompletedProjects();
            this.getAppliedProjects();
            this.getAllProjects();
            this.getawardedProjects();
            this.getawaitpayProjects();

            Fire.$on('acceptJob', (row)=>{
                this.acceptJob(row);
            })
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
