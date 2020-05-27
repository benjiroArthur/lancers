<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 align-items-center d-block justify-content-center">
                <circle-counter
                    size="10rem"
                    :text="AllProjectNum.toString()"
                    :dashCount="parseInt(AllProjectNum)"
                    :activeCount="parseInt(AllProjectNum)"
                    :strokeWidth=25
                    :activeWidth=20
                    stroke="#65f1b9"
                    activeStroke="dark"
                    :dashSpacing=0
                    :rotate="-90"
                    :reverse=false
                >
                </circle-counter>
                <p class="text-dark h3 mt-3">All Projects</p>
            </div>
            <div class="col-md-3 justify-content-center">
                <circle-counter
                    size="10rem"
                    :text="NotStartedNum.toString()"
                    :dashCount="AllProjectNum"
                    :activeCount="NotStartedNum"
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
            <div class="col-md-3 justify-content-center">
                <circle-counter
                    size="10rem"
                    :text="InProgressNum.toString()"
                    :dashCount="AllProjectNum"
                    :activeCount="InProgressNum"
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
            <div class="col-md-3 justify-content-center">
                <circle-counter
                    size="10rem"
                    :text="CompletedNum.toString()"
                    :dashCount="AllProjectNum"
                    :activeCount="CompletedNum"
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
                AllProjectNum: '',
                InProgress: {},
                InProgressNum: '',
                NotStarted: {},
                NotStartedNum: '',
                Completed: {},
                CompletedNum: '',
                user:{},

            }

        },
        methods:{
            getAllProject(){
                axios
                    .get('/data/freelancer/job-offered')
                    .then((response)=>{
                        this.AllProject = response.data;
                        this.AllProjectNum = this.AllProject.length;
                    })
                    .catch()
            },
            getInProgress(){
                axios
                    .get('/data/freelancer/in-progress')
                    .then((response)=>{
                        this.InProgress = response.data;
                        this.InProgressNum = this.InProgress.length;
                    })
                    .catch()
            },
            getNotStarted(){
                axios
                    .get('/data/freelancer/not-started')
                    .then((response)=>{
                        this.NotStarted = response.data;
                        this.NotStartedNum = this.NotStarted.length;
                    })
                    .catch()
            },
            getCompleted(){
                axios
                    .get('/data/freelancer/completed-projects')
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

</style>
