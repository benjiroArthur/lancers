<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <circle-counter
                    size="10rem"
                    :text="AllProject"
                    :dashCount="AllProject"
                    :activeCount="AllProject"
                    strokeWidth="25"
                    activeWidth="20"
                    stroke="#32a778"
                    activeStroke="dark"
                    dashSpacing="0"
                    rotate="-90"
                    :reverse=false
                >
                </circle-counter>
                <p class="text-center text-dark">All Projects</p>
            </div>
            <div class="col-md-3">
                <circle-counter
                    size="10rem"
                    :text="NotStarted"
                    :dashCount="AllProject"
                    :activeCount="NotStarted"
                    strokeWidth="25"
                    activeWidth="20"
                    stroke="#32a778"
                    activeStroke="red"
                    dashSpacing="0"
                    rotate="-90"
                    :reverse=false
                >
                </circle-counter>
                <p class="text-center text-danger">Pending</p>
            </div>
            <div class="col-md-3">
                <circle-counter
                    size="10rem"
                    :text="InProgress"
                    :dashCount="AllProject"
                    :activeCount="InProgress"
                    strokeWidth="25"
                    activeWidth="20"
                    stroke="#32a778"
                    activeStroke="orange"
                    dashSpacing="0"
                    rotate="-90"
                    :reverse=false
                >
                </circle-counter>
                <p class="text-center orange">In Progress</p>
            </div>
            <div class="col-md-3">
                <circle-counter
                    size="10rem"
                    :text="Completed"
                    :dashCount="AllProject"
                    :activeCount="Completed"
                    strokeWidth="25"
                    activeWidth="20"
                    stroke="#32a778"
                    activeStroke="#024a2d"
                    dashSpacing="0"
                    rotate="-90"
                    :reverse=false
                >
                </circle-counter>
                <p class="text-center text-lancer-dark">Completer</p>
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
                AllProject: 56,
                InProgress: 22,
                NotStarted: 20,
                Completed: 14,
            }

        },
        methods:{
            getAllProject(){
                axios
                    .get('/data/project')
                    .then((response)=>{
                        this.projects = response.data;
                        this.popular_projects = this.projects.popularProject;
                        this.recent_projects = this.projects.recently;
                    })
                    .catch()
            }
        },
        mounted() {
        }
    }
</script>

<style scoped>

</style>
