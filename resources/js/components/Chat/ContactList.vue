<template>
     <div class="direct-chat-contacts">
            <ul v-if="contacts.length > 0" class="contacts-list">
                <li v-for="contact in contacts" :key="contact.id" @click="contactSelected(contact)">
                    <a href="#">
                        <img class="contacts-list-img" :src="contact.userable.image_path">

                        <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                {{contact.userable.full_name}}
                              </span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </a>
                </li>
                <!-- End Contact Item -->
            </ul>
                            <!-- /.contatcts-list -->
         <p v-else>You Have No Contacts</p>
     </div>
</template>

<script>
    export default {
        name: "ContactList",
        props:{
            contacts:{
                type: Array,
            },
            onlineUsers:{},
        },
        data(){
            return{

            }
        },
        methods:{
            contactSelected(contact){
                Fire.$emit('contactSelected', contact);
            }
        },
    }
</script>

<style lang="scss" scoped>
    .direct-chat-contacts{
       margin-left: 100px;
        max-height: 500px;
        min-height: 500px;
        overflow-y: scroll;
        padding-top: 10px;
    }
    ul{
        list-style: none;
        padding-left: 0;
        li{
            display: flex;
            border-bottom: 1px solid #a6a6a6;
            padding: 2px;
            height: 80px;
            position: relative;
            cursor: pointer;
            &.selected{
                background: #c7a3e2 !important;
                color: white;
            }

            .avatar{
                flex: 1;
                display: flex;
                align-items: center;
                img{
                    width: 35px;
                    border-radius: 50%;
                    margin: 0 auto;
                }
            }
            .contact{
                flex: 3;
                font-size: 10px;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;

                p{
                    margin: 0;

                    &.name{
                        font-weight: bold;
                    }
                }
            }
            span.unread{
                background: #4c0ab8;
                color: #fff;
                position: absolute;
                top: 20px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
                padding: 0 4px;
                border-radius: 3px;
            }

            span.online{
                background: #0eb815;
                color: #0eb815;
                position: absolute;
                top: 20px;
                right: 2px;
                display: flex;
                font-weight: 700;
                min-width: 20px;
                justify-content: center;
                align-items: center;
                line-height: 20px;
                font-size: 12px;
            }
        }

    }
</style>
