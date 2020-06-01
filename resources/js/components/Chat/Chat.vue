<template>
    <div class="container-fluid">


            <!-- DIRECT CHAT SUCCESS -->
            <div class="card card-success cardutline direct-chat direct-chat-success">
                <!--header-->
                <chat-header></chat-header>
                <!-- /.card-header -->

                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <messages-feed></messages-feed>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                   <contact-list></contact-list>
                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.card-body -->
                <messages-composer></messages-composer>
                <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->



    </div>
</template>

<script>
    import Conversation from "./Conversation";
    export default {
        name: "Chat",
        components: {Conversation}
    }
</script>

<style scoped>

</style>
