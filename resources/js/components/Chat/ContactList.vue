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
        name: "ContactList"
    }
</script>

<style lang="scss" scoped>
    .direct-chat-contacts{
        width: 50%;
    }
</style>
