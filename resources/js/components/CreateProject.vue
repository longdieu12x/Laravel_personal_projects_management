<template>
  <div id="right" style="text-align: center; height: 100vh;">
    <h1 style="margin-bottom: 50px;">Create your new project</h1>
    <div class="upcoming">
        <form action="" @submit.prevent="addProject">
            <h2>Project Name:</h2>
            <input type="text" v-model="project_name" name="name" style="margin-bottom: 150px;"/>
            <h2>Content of your Project:</h2>
            <textarea name="content" v-model="project_content" rows="12" style="display: block; width: 100%;">
            </textarea>
            <button type="submit" class="bubbly-button">Create</button>
        </form>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  watch: {
  },
  created () {
  },
  data () {
    return {
        project_name: '',
        project_content: '',
        user: window.user,
    }
  },
    methods: {
        addProject(){
            let newProject = {
                name: this.project_name,
                content: this.project_content,
                user: this.user['id']
            };
            axios.post('/api/projects', newProject)
                .then(res => console.log(res))
                .catch(err => console.log(err))
            ;
            document.location.reload()
        }
    },
}
</script>

<style>

</style>
