<template>
    <div class="card-header">
        <h3 class="card-title">{{selectedContact.length > 0 ? selectedContact.userable.full_name : 'Select A Contact'}}</h3>

        <div class="card-tools">
            <span v-show="unreadCount > 0" data-toggle="tooltip" :title="unreadCount + 'New Messages'" class="badge bg-success">unreadCount</span>
            <!--<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
            </button>-->
            <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Contacts"
                    data-widget="chat-pane-toggle">
                <i class="fas fa-user-circle"></i></button>
            <!--<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
            </button>-->
        </div>
    </div>
</template>

<script>
    export default {
        name: "Header",
        data(){
           return{
               selectedContact:{},
               UnreadCount: 0,
           }
        },
        mounted() {
            Fire.$on('contactSelected', (contact)=>{
                this.selectedContact = contact;
            });
        }
    }
</script>

<style scoped>

</style>
