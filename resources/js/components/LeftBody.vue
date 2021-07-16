<template>
    <div class="" id="left">
        <img src="../images/hamburger.png" alt="" @click="logout"/>
        <div class="profile">
            <h1> Hi, {{user['name']}} </h1>
            <h2> Let's make project more amaging</h2>
        </div>
        <div class="search">
            <input type="text" placeholder="Search your project"/>
            <img src="../images/search.png" alt=""/>
        </div>
        <div class="project">
            <h3>Projects <span>({{projects.length}})</span></h3>

            <div class="projects">
                <div class="a-project" v-for="project in projects" :key="project.id">
                    <div class="box-color" @click="changeToShowProject(project)">
                        <img src="../images/overlay.png" alt="">
                        <span>PT</span>
                    </div>
                    <h6>{{project['name']}}</h6>
                </div>
                <div class="a-project">
                    <div class="box-color">
                        <img src="../images/overlay.png" alt="" @click="changeToCreateProject()">
                        <span>AP</span>
                    </div>
                    <h6>Add Project</h6>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapMutations } from 'vuex';
export default {
    data(){
        return {
            user: window.user,
            projects: window.projects,
        }
    },
    created(){
    },
    methods:{
        changeToShowProject(project){
            this.$emit('updateProjectId',project.id);
            this.$emit('updateToShowProject', false);
        },
        changeToCreateProject(){
            this.$emit('updateToCreateProject', true);
        }
        ,
        logout(){
            if (confirm("Are you sure to logout the home page?")){
                axios.post("/logout")
                    .then(response => {
                        console.log(response);
                        window.location.reload();
                    })
                    .catch(error => {
                        console.log(error);
                    });
            }
        },
        ...mapGetters(['getProjectId']),
        ...mapMutations(['changeProjectId']),
    },
}
</script>

<style>

</style>
