<template>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <div class="card-title text-bold">Recent Projects</div>
                    <div class="card-tools">
                        <a class="text-lancer" href="#">View All <span class="fas fa-arrow-right"></span></a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="col-12">
                        <div class="card m-0">
                            <div class="card-body m-0 p-1">
                                <div class="row">
                                    <div class="col-10">
                                        <h6 class="m-0">{{this.title}}</h6>
                                        <small class="p00 m-0">{{this.body }}</small><br>
                                        <small class="p00 m-0">{{this.price}}</small>
                                    </div>
                                    <div class="col-2 text-right">
                                        <button type="button" class="btn btn-outline-success text-right" >View</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "JobList",
        data(){
            return{
                title: 'This is a title',
                body: 'This is the whole body of the card. It includes the job done by the freelancer. Its description and other relevant details',
                price: '$200'
            }
        },
        filters:{
            dynamictrim(){
                let len = 100;
                let val = value.slice(0, len);
                return value.length < len ? value : val + '...'
            }
        },
    }
</script>

<style scoped>

</style>
