<template>
  <div id="right" style="text-align: center; height: 100vh;">
    <h1 style="margin-bottom: 50px;">Create your new project</h1>
    <div class="upcoming">
        <form action="" @submit.prevent="addUpcomingTask">
            <h2>Project Name:</h2>
            <input type="text" name="name" style="margin-bottom: 50px;"/>
            <h2>Content of your Project:</h2>
            <textarea name="content" rows="4" cols="50">
            </textarea>
            <button type="submit" class="bubbly-button" @click="changeRight">Create</button>
        </form>
    </div>
  </div>
</template>

<script>
export default {
  watch: {
  },
  created () {
  },
  data () {
    return {
    }
  },
    methods: {
    },
}
</script>

<style>

</style>
