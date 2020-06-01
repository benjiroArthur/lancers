<template>
    <div class="container-fluid">
            <!-- DIRECT CHAT SUCCESS -->
            <div class="chat-app card card-success card-outline direct-chat direct-chat-success">
                <!--header-->
                <chat-header></chat-header>
                <!-- /.card-header -->

                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <messages-feed></messages-feed>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                   <contact-list :contacts="contacts" :onlineUsers="onlineUsers"></contact-list>
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
    import MessagesComposer from "./MessagesComposer";
    export default {
        name: "Chat",
        components: {Conversation, MessagesComposer},
        data(){
            return{
                selectedContact: null,
                messages: [],
                contacts: [],
                onlineUsers: null,
            }
        },
        methods:{
            getContact(){
                axios.get('/data/chat/friends')
                .then((response)=>{
                    this.contacts = response.data;
                })
                .catch((error)=>{})
            }
        },

        mounted() {
            this.getContact();
        }
    }
</script>

<style lang="scss" scoped>
    .chat-app{
        min-height: 500px;
    }
</style>
