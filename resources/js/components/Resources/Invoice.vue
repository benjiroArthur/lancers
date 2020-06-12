<template>
    <div id="print-invoice" class="container">
        <div v-if="selectedProject" class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="card-header bg-transparent">
                            <div class="card-tools">
                                <button class="myPrint text-right " @click="print"><i class="fas fa-print"></i> Print Invoice</button>
                            </div>
                        </div>
                        <div class="row p-5">
                            <div class="card-image text-center">
                                <img :src="resourcePath+'/lancers_logo.png'" width="auto" height="50" alt="" loading="lazy">
                            </div>



                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">Invoice #0{{selectedProject.id}}{{client.id}}</p>
                                <p class="text-muted">{{this.today}}</p>
                            </div>

                        </div>

                        <hr class="my-5">

                        <div class="row pb-5 p-5">
                            <div class="col-md-6">
                                <p class="font-weight-bold mb-4">Client Information</p>
                                <p class="mb-1">{{client.full_name}}</p>
                                <p class="mb-1">{{userAddress.city}}, {{userAddress.country}}</p>
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-4">Payment Details</p>
                                <p class="mb-1"><span class="text-muted">VAT: </span> 1425782</p>
                                <p class="mb-1"><span class="text-muted">VAT ID: </span> 10253642</p>
                                <p class="mb-1"><span class="text-muted">Payment Type: </span> Root</p>
                                <p class="mb-1"><span class="text-muted">Name: </span> {{client.full_name}}</p>
                            </div>
                        </div>

                        <!--<div class="col-12 table-responsive">
                            <div class="card-body table table-responsive table-borderless p-0">
                                <bootstrap-table :data="invoice" :options="myOptions" :columns="myColumns" sticky-header responsive borderless/>
                            </div>-->

                        <div class="row p-5">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th class="border-0 text-uppercase small font-weight-bold">Description</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Cost</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>{{selectedProject.project_title}}</td>
                                        <td>${{selectedProject.project_cost}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Grand Total</div>
                                <div class="h2 font-weight-light">$234,234</div>
                            </div>

                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Tax</div>
                                <div class="h2 font-weight-light">12%</div>
                            </div>

                            <div class="py-3 px-5 text-right">
                                <div class="mb-2">Sub - Total amount</div>
                                <div class="h2 font-weight-light">$32,432</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import BootstrapTable from 'bootstrap-table/dist/bootstrap-table-vue.min';
    export default {
        name: "Invoice",
        components: {BootstrapTable},
        props: {
            resourcePath:{type: String},
            selectedProject: {},
            client: {},
            userAddress: {},
        },
        data() {
            return {
                myOptions: {
                    toolbar: '#toolbar',
                    clickToSelect: false,
                    selectItemName: 'id',
                    index: true,
                    today:'',

                },
                myColumns: [
                    {field: 'project_title', title: 'Project Title'},
                    {field: 'cost', title: 'Cost'},
                ],
                invoice: {},


            };
        },
        methods:{
           /* getClients(){
                axios.get('/data/admin/getClients')
                    .then((response)=>{
                        this.invoice = response.data;
                    })
                    .catch()
            },*/
            print () {
                // Pass the element id here
                $('.myPrint').addClass('d-none');
                this.$htmlToPaper('print-invoice');
                $('.myPrint').removeClass('d-none');
            }
        },
        mounted() {
            //this.getClients();
            this.today = new Date();
        },
    }
</script >

<style scoped>
    .container{
        /*background: grey !important;*/
        margin-top: 120px !important;
        margin-bottom: 120px !important;
    }

</style>
