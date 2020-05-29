<template>
    <div class="container-fluid">
        <div class="container">
            <div v-show="editMode === false" class="row">
                <button class="btn btn-primary" @click="setEditMode" >edit</button>
                <p>Main Mode</p>
            </div>
            <div v-show="editMode === true" class="row">
                <button class="btn btn-primary" @click="setMainMode" >main</button>
                <p>Edit Mode</p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "FreelancerProfile",
        data(){
            return{
                editMode:false,
            }
        },
        methods:{
            setEditMode(){
                this.editMode = true;
            },
            setMainMode(){
                this.editMode = false;
            }
        },
    }
</script>

<style lang="scss" scoped>
    .testrow1{
        min-height: 500px;
        min-width: 500px;
    }

</style>
