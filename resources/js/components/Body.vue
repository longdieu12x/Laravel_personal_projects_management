<template>
    <div class="mcontainer" id="body">
        <leftbody-component
            v-on:updateToShowProject="showProject($event)"
            v-on:updateToCreateProject="createProject($event)"
        >

        </leftbody-component>
        <project-component v-if="isCreate == true"></project-component>
        <rightbody-component v-if="isCreate == false"></rightbody-component>
    </div>
</template>

<script>
import LeftBody from './LeftBody';
import RightBody from './RightBody';
import CreateProject from './CreateProject.vue';
export default {

  data () {
    return {
      isCreate: false,
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
