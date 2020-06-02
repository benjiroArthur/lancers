<template>
     <div class="direct-chat-contacts p-2 bg-lancer">
            <ul v-if="contacts.length > 0" class="contacts-list">
                <li v-for="(contact, index) in contacts" :key="contact.id" @click="contactSelected(index, contact)"
                    :class="{ 'selected' : index === selected}">
                    <div>
                        <img class="contacts-list-img" :src="contact.userable.image_path" alt="A">

                        <div class="contacts-list-info text-black">
                              <span class="contacts-list-name">
                                {{contact.userable.full_name}}
                              </span>
                        </div>
                        <!-- /.contacts-list-info -->
                    </div>
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
                default: [],
            },
            onlineUsers:{},
        },
        data(){
            return{
                selected: 0,
            }
        },
        methods:{
            contactSelected(index, contact){
                this.selected = index;
                Fire.$emit('selected', contact);
            },
            removeFromList(contact){
                alert('Yes');
                /*Swal.fire({
                    title: 'Are you sure?',
                    text: "You are about to remove" + contact.userable.first_name +"from your contact list!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/friends/' + contact.id).then((response) => {
                            if(response.data === "success")
                            {
                                Fire.$emit('tableUpdate');
                                Swal.fire(
                                    'Deleted!',
                                    'Contact Deleted Successfully',
                                    'success'
                                );

                            }
                            else{
                                Swal.fire(
                                    'Failed!',
                                    response.data,
                                    'warning'
                                )
                            }
                        }).catch(() => {
                            Swal.fire(
                                'Failed!',
                                'User Could Not Be Deleted.',
                                'warning'
                            )
                        });
                    }

                });*/
            },
        },
    }
</script>

<style lang="scss" scoped>
    .direct-chat-contacts{
        @media (max-width: 600px) {
            margin-left: 100px;
        }
        @media (max-width: 980px) {
            margin-left: 400px;
        }
       margin-left: 700px;
        max-height: 800px;
        min-height: 500px;
        overflow-y: scroll;
        padding-top: 10px;
    }
    ul{
        list-style: none;
        padding-left: 0;
        li{
            //display: flex;
            border-bottom: 1px solid #a6a6a6;
            padding: 2px;
            //height: 80px;
            position: relative;
            cursor: pointer;
            color: black !important;
            &.selected{
                background: #f7f7fc !important;
                color: #0e0e0e !important;
                span{
                    color: #0e0e0e !important;
                }
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
                background: #ff373e;
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
