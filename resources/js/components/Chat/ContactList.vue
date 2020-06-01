<template>
     <div class="direct-chat-contacts">
                            <ul class="contacts-list">
                                <li>
                                    <a href="#">
                                        <img class="contacts-list-img" src="">

                                        <div class="contacts-list-info">
                              <span class="contacts-list-name">
                                Count Dracula
                                <small class="contacts-list-date float-right">2/28/2015</small>
                              </span>
                                            <span class="contacts-list-msg">How have you been? I was...</span>
                                        </div>
                                        <!-- /.contacts-list-info -->
                                    </a>
                                </li>
                                <!-- End Contact Item -->
                            </ul>
                            <!-- /.contatcts-list -->
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
