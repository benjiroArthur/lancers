<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-justified">
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link text-lancer text-bold">All Projects</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link text-lancer text-bold">Completed Project</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link text-lancer text-bold">Projects In Progress</a></li>
                            <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-3" class="nav-link text-lancer text-bold">Jobs Unapplied For</a></li>
                            <!--<li class="nav-item"><a data-toggle="tab" href="#tab-eg7-3" class="nav-link">Payments</a></li>-->
                        </ul>

                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                                <lancer-allprojects-table :user_id="this.user_id"></lancer-allprojects-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-1" role="tabpanel">
                                <lancer-completed-table :user_id="this.user_id"></lancer-completed-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-2" role="tabpanel">
                                <lancer-inprogress-table :user_id="this.user_id"></lancer-inprogress-table>
                            </div>
                            <div class="tab-pane" id="tab-eg7-3" role="tabpanel">
                                <lancer-appliedjobs-table :user_id="this.user_id"></lancer-appliedjobs-table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title"></div>
                        <div class="card-tools"></div>
                    </div>

                    <div class="card-body"></div>
                </div>
            </div>
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

    export default {
        name: "AllJobs",
        components:{LancerAllProjectsTable, LancerCompletedTable, LancerInProgressTable, LancerAppliedJobsTable},
        data(){
            return{
                user_id: 22,
            }
        },
        mounted() {
           // this.user_id = this.$parent.userId
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
