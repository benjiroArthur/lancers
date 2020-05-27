<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 align-items-center d-block justify-content-center">
                <circle-counter
                    size="10rem"
                    :text="AllProjectNum.toString()"
                    :dashCount="AllProjectNum"
                    :activeCount="AllProjectNum"
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
            }
        },
        mounted() {
            this.getAllProject();
        }
    }
</script>

<style lang="scss" scoped>

</style>
