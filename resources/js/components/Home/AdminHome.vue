<template>
    <div class="container-fluid top-bg-img">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                        <div class="col-12 col-sm-6 col-md-2">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">All Users</span>
                                    <span class="info-box-number">{{this.stats.users}}<small>%</small> </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-secret"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Admins</span>
                                    <span class="info-box-number">{{this.stats.admins}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->

                        <!-- fix for small devices only -->
                        <div class="clearfix hidden-md-up"></div>

                        <div class="col-12 col-sm-6 col-md-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Clients</span>
                                    <span class="info-box-number">{{this.stats.clients}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Freelancers</span>
                                    <span class="info-box-number">{{this.stats.freelancers}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-black elevation-1"><i class="fas fa-user yellow"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">New Users</span>
                                    <span class="info-box-number">{{this.stats.users_today}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                        <div class="col-12 col-sm-6 col-md-2">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-black elevation-1"><i class="fas fa-user white"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Monthly Users</span>
                                    <span class="info-box-number">{{this.stats.users_monthly}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>


            </div>
        </div>
        <div class="row">
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-justified">
                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-0" class="active nav-link text-lancer text-bold">Admins</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-1" class="nav-link text-lancer text-bold">Freelancers</a></li>
                                <li class="nav-item"><a data-toggle="tab" href="#tab-eg7-2" class="nav-link text-lancer text-bold">Clients</a></li>
                                <!--<li class="nav-item"><a data-toggle="tab" href="#tab-eg7-3" class="nav-link">Payments</a></li>-->
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-eg7-0" role="tabpanel">
                                    <admins-table></admins-table>
                                </div>
                                <div class="tab-pane" id="tab-eg7-1" role="tabpanel">
                                    <freelancers-table></freelancers-table>
                                </div>
                                <div class="tab-pane" id="tab-eg7-2" role="tabpanel">
                                    <clients-table></clients-table>
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
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header">
                        <div class="card-title"></div>
                        <div class="card-tools"></div>
                    </div>

                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FreelancersTable from "../Admin/AdminTables/FreelancersTable";
    import ClientsTable from "../Admin/AdminTables/ClientsTable";
    import AdminsTable from "../Admin/AdminTables/AdminsTable";

    export default {
        name: "AdminHome",
        components: {FreelancersTable, ClientsTable, AdminsTable},
        data(){
            return{
                stats: {},
            }
        },
        methods:{
            getStats(){
                axios.get('/data/stats').then((response)=>{
                    this.stats = response.data;
                }).catch((error)=>{
                    console.log(error.message);
                })
            },
        },
        mounted() {
        },

    };


    let url = document.location.toString();
    if (url.match('#')){
        $('.nav-justified a[href="#' + url.split('#')[1]+ '"]').tab('show');
    }

    $('.nav-justified a').on('shown.bs.tab', function (e) {
        window.location.hash = e.target.hash;
    });
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
    .top-bg-img{
        background-image: url("/images/banner/bodybanner.jpg");
        margin-top: -50px;
    }

</style>
