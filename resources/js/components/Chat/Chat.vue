<template>
    <div class="container-fluid">
            <!-- DIRECT CHAT SUCCESS -->
            <div class="chat-app card card-success card-outline direct-chat direct-chat-success">
                <!--header-->
                <chat-header></chat-header>
                <!-- /.card-header -->

                <div class="card-body">
                    <!-- Conversations are loaded here -->
                    <messages-feed :messages="messages"></messages-feed>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                   <contact-list @contactSelected="contactSelected(contact)" :contacts="contacts" :onlineUsers="onlineUsers"></contact-list>
                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.card-body -->
                <messages-composer @send="sendMessage"></messages-composer>
                <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->



    </div>
</template>

<script>
    import Conversation from "./Conversation";
    import MessagesComposer from "./MessagesComposer";
    import ChatHeader from "./ChatHeader";
    import ContactList from "./ContactList";
    import MessagesFeed from "./MessagesFeed";
    export default {
        name: "Chat",
        components: {Conversation, MessagesComposer, ChatHeader, ContactList, MessagesFeed},
        props:{
            user:{
                type: Object,
                required: true,
            }
        },
        data(){
            return{
                selectedContact: null,
                messages: [],
                contacts: [],
                contact:{},
                onlineUsers: null,
            }
        },
        methods:{
            getContact(){
                axios.get('/friends')
                .then((response)=>{
                    this.contacts = response.data;
                })
                .catch((error)=>{
                    console.log(error.message)
                })
            },
            sendMessage(){},
            contactSelected(contact){},
        },

        mounted() {

        },
        created() {
            this.getContact();
        }
    }
</script>

<style lang="scss" scoped>
    .chat-app{
        min-height: 500px;
    }
</style>
