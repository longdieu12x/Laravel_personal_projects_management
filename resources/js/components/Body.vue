<template>
    <div class="mcontainer" id="body">
        <leftbody-component
            v-on:updateToShowProject="showProject($event)"
            v-on:updateProjectId="updateProjectId($event)"
            v-on:updateToCreateProject="createProject($event)"
        >
        </leftbody-component>
        <project-component v-if="isCreate == true"></project-component>
        <rightbody-component :todayTask="todayTask" :upcoming="upcoming" :project="project" :project_id="project_id" v-if="isCreate == false" :key="project_id"></rightbody-component>
    </div>
</template>

<script>
import LeftBody from './LeftBody';
import RightBody from './RightBody';
import CreateProject from './CreateProject.vue';
export default {

  data () {
    return {
        todayTask: window.todays,
        upcoming: window.upcomings,
        isCreate: false,
        project: window.project,
        project_id: -1,
    }
  },
  created(){
    axios.get('/api/upcomings/1')
        .then(res => {
            console.log(res.data);
            this.upcomings = res.data;
        })
        .catch(err => {
            console.log(err);
            this.upcoming = [];
        })
    ;
    axios.get('/api/todays/1')
        .then(res => {
            this.todayTask = res.data;
        })
        .catch(err => {
            console.log(err);
            this.todayTask = [];
        })
    ;

  },
  methods: {
      showProject(val){
        this.isCreate = val;
      }
      ,
      createProject(val){
        this.isCreate = val;
      }
      ,
      updateProjectId(project_id){
        this.project_id = project_id;
        axios.get('/api/upcomings/' + project_id)
            .then(res => {
                console.log(res.data);
                this.upcomings = res.data;
            })
            .catch(err => {
                console.log(err);
                this.upcoming = [];
            })
        ;
        axios.get('/api/todays/' + project_id)
            .then(res => {
                this.todayTask = res.data;
            })
            .catch(err => {
                console.log(err);
                this.todayTask = [];
            })
        ;
      }
  },
  components: {
      LeftBody,
      RightBody,
      CreateProject,
  },

}
</script>

<style>

</style>
