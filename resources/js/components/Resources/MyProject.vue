<template>
    <li class="nav-item dropdown ml-4">
        <a class="nav-link count-indicator text-dark" id="notificationDropdown" href="#" data-toggle="dropdown">
            <i class="fas fa-tv text-dark h4"></i> My Project
        </a>


        <div class="dropdown-menu dropdown-menu-center navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown" style="width: 500px">
            <v-card>
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

                    <!--<v-btn text @click="menu = false">Cancel</v-btn>
                    <v-btn color="primary" text @click="menu = false">Save</v-btn>-->
                </v-card-actions>
            </v-card>
        </div>
    </li>
</template>



<script>
    export default {
        name: "MyProject",
        data: () => ({
            fav: true,
            menu: false,
            message: false,
            hints: true,
        }),
    }
</script>

<style scoped>

</style>
