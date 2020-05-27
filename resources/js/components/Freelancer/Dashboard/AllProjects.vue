<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-3 justify-content-center">
                <circle-counter
                    size="10rem"
                    :text="AllProjectNum.toString()"
                    :dashCount=AllProjectNum+1
                    :activeCount=AllProjectNum
                    :strokeWidth=25
                    :activeWidth=20
                    stroke="#65f1b9"
                    activeStroke="black"
                    :dashSpacing=0
                    :rotate="-90"
                    :reverse=false
                >
                </circle-counter>
                <p class="text-dark h3 mt-3">All Projects</p>
            </div>
            <div class="col-md-3 col-sm-3 justify-content-center">
                <circle-counter
                    size="10rem"
                    :text="NotStartedNum.toString()"
                    :dashCount=AllProjectNum
                    :activeCount=NotStartedNum
                    :strokeWidth=25
                    :activeWidth=20
                    stroke="#65f1b9"
                    activeStroke="red"
                    :dashSpacing=0
                    :rotate="-90"
                    :reverse=false
                >
                </circle-counter>
                <p class="text-danger h3 mt-3">Pending</p>
            </div>
            <div class="col-md-3 col-sm-3 justify-content-center">
                <circle-counter
                    size="10rem"
                    :text="InProgressNum.toString()"
                    :dashCount=AllProjectNum
                    :activeCount=InProgressNum
                    :strokeWidth=25
                    :activeWidth=20
                    stroke="#65f1b9"
                    activeStroke="orange"
                    :dashSpacing=0
                    :rotate="-90"
                    :reverse=false
                >
                </circle-counter>
                <p class="orange h3 mt-3">In Progress</p>
            </div>
            <div class="col-md-3 col-sm-3 justify-content-center">
                <circle-counter
                    size="10rem"
                    :text="CompletedNum.toString()"
                    :dashCount=AllProjectNum
                    :activeCount=CompletedNum
                    :strokeWidth=25
                    :activeWidth=20
                    stroke="#65f1b9"
                    activeStroke="#024a2d"
                    :dashSpacing=0
                    :rotate="-90"
                    :reverse=false
                >
                </circle-counter>
                <p class="text-lancer-dark h3 mt-3">Completed</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow pro-card">
                    <div v-if="AllProject.length > 0" class="row p-2">
                        <div v-for="(job, i) in AllProject" class="col-md-3" :key="i">
                            <div class="card shadow-lg m-2" :class="singlePro(job.status)" >
                                <p>{{job.project.project_title}}</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    import circleCounter from 'vue-circle-counter';
    export default {
        name: "AllProjects",
        components: {circleCounter},
        data(){
            return{
                AllProject: {},
                AllProjectNum: 0,
                InProgress: {},
                InProgressNum: 0,
                NotStarted: {},
                NotStartedNum: 0,
                Completed: {},
                CompletedNum: 0,
                user:{},

            }

        },
        methods:{
            getAllProject(){
                axios
                    .get('/data/freelancer/job-offered/'+this.$parent.userId)
                    .then((response)=>{
                        this.AllProject = response.data;
                        this.AllProjectNum = this.AllProject.length;
                    })
                    .catch()
            },
            getInProgress(){
                axios
                    .get('/data/freelancer/in-progress/'+this.$parent.userId)
                    .then((response)=>{
                        this.InProgress = response.data;
                        this.InProgressNum = this.InProgress.length;
                    })
                    .catch()
            },
            getNotStarted(){
                axios
                    .get('/data/freelancer/not-started/'+this.$parent.userId)
                    .then((response)=>{
                        this.NotStarted = response.data;
                        this.NotStartedNum = this.NotStarted.length;
                    })
                    .catch()
            },
            getCompleted(){
                axios
                    .get('/data/freelancer/completed-projects/'+this.$parent.userId)
                    .then((response)=>{
                        this.Completed = response.data;
                        this.CompletedNum = this.Completed.length;
                    })
                    .catch()
            },
            getUser(){
                axios
                    .get('/data/user')
                    .then((response)=>{
                        this.user = response.data;
                    })
                    .catch()
            },

            singlePro(param){
                if(param === 'in progress'){
                    return 'my-c-orange'
                }
                else if(param === 'not started'){
                    return 'my-c-red'
                }
                else if(param === 'completed'){
                    return 'my-c-green'
                }
            },
        },
        mounted() {
            this.getAllProject();
            this.getInProgress();
            this.getNotStarted();
            this.getCompleted();
            this.getUser();
        }
    }
</script>

<style lang="scss" scoped>
    .pro-card{
        min-height: 25rem;
    }
    .my-c-red{
        border: 2px solid red;
    }
    .my-c-orange{
        border: 2px solid #f3892d;
    }
    .my-c-green{
        border: 2px solid green;
    }
</style>
