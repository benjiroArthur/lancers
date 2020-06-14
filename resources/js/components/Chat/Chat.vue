<template>
    <div class="container">
            <!-- DIRECT CHAT SUCCESS -->
            <div class="chat-app card card-success card-outline direct-chat direct-chat-success">
                <!--header-->
                <chat-header :contact="selectedContact"></chat-header>
                <!-- /.card-header -->

                <div class="card-body">
                    <conversation :contact="selectedContact" :messages="messages"></conversation>
                    <!-- Contacts are loaded here -->
                    <contact-list :contacts="contacts" :onlineUsers="onlineUsers"></contact-list>
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
    export default {
        name: "Chat",
        components: {Conversation, MessagesComposer, ChatHeader, ContactList},
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
                contact:[],
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
            sendMessage(message){
                if(!this.selectedContact) return;

                axios.post('/chat', {
                    to: this.selectedContact.id,
                    chat: message
                }).then((response)=>{
                    this.messages.push(response.data);
                }).catch((error)=>{
                    console.log(error.message)
                })
            },

            startConversationWith(contact){
                axios
                .get(`/getChat/${contact.id}`)
                .then((response) => {
                    this.messages = response.data;
                })
                .catch((error)=>{})
                this.selectedContact = contact;
            },
            hundleMessage(message){
                if(this.selectedContact && message.from === this.selectedContact){
                    this.messages.push(message);
                }
            },
        },

        mounted() {
            Fire.$on('selected', (contact)=>{
                this.startConversationWith(contact);
            });
            Fire.$on('send', (message)=>{
                this.sendMessage(message);
            });

            //listen to message event
            Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e)=>{
                    this.hundleMessage(e.message);
                });
        },
        created() {
            this.getContact();
        }
    }
</script>

<style lang="scss" scoped>
    .chat-app{
        min-height: 600px;
        max-height: 600px;
    }
</style>
