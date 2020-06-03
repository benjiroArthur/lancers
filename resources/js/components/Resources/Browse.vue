<template>
    <li class="nav-item dropdown ml-4">
        <a class="nav-link count-indicator text-dark" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="fas fa-search text-dark h4"></i> Browse
        </a>


        <div class="dropdown-menu  dropdown-menu-center navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown" style="width: 500px">

           <!-- <v-card>
                <v-list>
                    <v-list-item>
                        <v-list-item-avatar>

                        </v-list-item-avatar>

                        <v-list-item-content>
                            <v-list-item-title></v-list-item-title>
                            <v-list-item-subtitle></v-list-item-subtitle>
                        </v-list-item-content>

                    </v-list-item>
                </v-list>

                <v-divider></v-divider>

                <v-list>
                    <v-list-item>
                        <v-list-item-action>
                        </v-list-item-action>
                        <v-list-item-title></v-list-item-title>
                    </v-list-item>

                    <v-list-item>
                        <v-list-item-action>

                        </v-list-item-action>
                        <v-list-item-title></v-list-item-title>
                    </v-list-item>
                </v-list>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    &lt;!&ndash;<v-btn text @click="menu = false">Cancel</v-btn>
                    <v-btn color="primary" text @click="menu = false">Save</v-btn>&ndash;&gt;
                </v-card-actions>
            </v-card>-->
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title text-bold">Recent Projects</div>
                    <div class="card-tools">
                        <a class="text-lancer" href="#" @click="viewall">View All <span class="fas fa-arrow-right"></span></a>
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-12">
                        <div class="card m-0">
                            <div class="card-body m-0 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="m-0">{{this.title}}</h6>
                                        <small class="p00 m-0">{{this.body | trimtext}}</small><br>
                                        <small class="p00 m-0">{{this.price}}</small>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-outline-success text-right" @click="addressToggle('false', $event)" >View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-0">
                    <div class="col-12">
                        <div class="card m-0">
                            <div class="card-body m-0 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="m-0">{{this.title}}</h6>
                                        <small class="p00 m-0">{{this.body | trimtext}}</small><br>
                                        <small class="p00 m-0">{{this.price}}</small>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-outline-success text-right" @click="addressToggle('false', $event)" >View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row m-0">
                    <div class="col-12">
                        <div class="card m-0">
                            <div class="card-body m-0 p-1">
                                <div class="row">
                                    <div class="col-6">
                                        <h6 class="m-0">{{this.title}}</h6>
                                        <small class="p00 m-0">{{this.body | trimtext}}</small><br>
                                        <small class="p00 m-0">{{this.price}}</small>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-outline-success text-right" @click="addressToggle('false', $event)" >View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </li>
</template>

<script>
    export default {
        name: "Browse",
        data(){
            return{
                title: 'This is a title',
                body: 'This is the whole body of the card. It includes the job done by the freelancer. Its description and other relevant details',
                price: '$200'
            }
        },
        methods:{
            viewall(){
                window.location.assign('/browse/projects')
            }
        },
        mounted() {
        },
    }
</script>

<style scoped>

</style>
