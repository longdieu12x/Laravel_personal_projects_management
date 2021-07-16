<template>
    <div class="mcontainer" id="body">
        <leftbody-component
                                v-on:updateToShowProject="showProject($event)"
                                v-on:updateProjectId="updateProjectId($event)"
                                v-on:updateToCreateProject="createProject($event)"
        >
        </leftbody-component>
        <project-component v-if="isCreate == true"></project-component>
        <rightbody-component
                              :project_id="project_id"
                              v-if="isCreate == false"
                              :key="project_id"
        >
        </rightbody-component>
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
        isCreate: true,
        project_id: 1,
        count: 2,
    }
  },
  created(){
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
