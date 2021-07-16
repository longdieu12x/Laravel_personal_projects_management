<template>
<div id="right">

    <h1>{{project['name']}}</h1>
    <br>
    <div class="horizontal">
      <img src="../images/horizontal.png"  alt=""/>
    </div>

    <p>
      {{project['content']}}
    </p>
    <div class="users-icon"><img src="../images/users.png" alt=""/></div>
    <div class="upcoming">
        <div class="add-tasks">
            <h2>Today's Task</h2>
        </div>

            <ul class="tasks-list">
                <li  v-for="task in todayTask" :key="task.id">
                    <div class="info">
                        <div class="left">
                            <label class="myCheckbox">
                                <input type="checkbox"
                                name="test"
                                :checked="task.completed"
                                @change="updateTodayTask(task.taskId)"
                                />
                                <span></span>
                            </label>
                            <h4>{{task.title}}</h4>
                        </div>
                        <div class="right">
                            <img src="../images/edit.png" alt=""/>
                            <img src="../images/del.png" alt="" @click="deleteTodayTask(task.taskId)"/>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    <div class="upcoming">
        <div class="add-tasks">
            <h2>Upcoming</h2>
            <div class="add-action" @click="addUpcomingTask">
                <img src="../images/add.png" alt="">
            </div>
        </div>
            <form action="" @submit="addUpcomingTask">
                <input type="text" v-model="newTask"/>
            </form>

            <ul class="tasks-list">
                <li v-for="upcomingtask in upcoming" :key="upcomingtask.id">
                    <div class="info">
                        <div class="left">
                            <label class="myCheckbox">
                                <input type="checkbox"
                                name="test"
                                :checked="upcomingtask.completed"
                                @change="checkUpcoming(upcomingtask.taskId)"
                                />
                                <span></span>
                            </label>
                            <h4>{{upcomingtask.title}}</h4>
                        </div>
                        <div class="right">
                            <img src="../images/edit.png" alt=""/>
                            <img src="../images/del.png" alt="" @click="deleteUpcoming(upcomingtask.taskId)"/>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import { mapGetters } from 'vuex';
export default {
  props: ['project_id'],
  data() {
    return {
        newTask: "",
        newTodayTask: "",
        todayTask: [],
        upcoming: [],
        project: { 'name': 'Development', 'content': 'hi bro'},
        // project_id: this.project_id,
    };
  },
  created() {

    axios.get('/api/projects/'+this.project_id)
        .then(res => {
            this.project = res.data;
            console.log(this.project);
        })
    ;
    axios.get('/api/upcomings/' + this.project_id)
        .then(res => {
            this.upcoming = res.data;
        })
        .catch(err => {
            console.log(err);
            this.upcoming = [];
        })
    ;
    axios.get('/api/todays/' + this.project_id)
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
      //** Save to Clip board */
      saveToClipBoard(){
        let e = this.$refs.codeInput;
        const el = document.createElement('textarea');
        el.value = e.innerText;
        document.body.appendChild(el);
        el.select();
        document.execCommand('copy');
        document.body.removeChild(el);
      }
      ,
      //** Upcoming Task */
     // Add upcoming task
      addUpcomingTask(e){
          e.preventDefault();
          if (this.upcoming.length > 4){
              alert("Please complete the upcoming task");
          }
          else {
              const newTask = {
                  title: this.newTask,
                  waiting: true,
                  taskId: Math.random().toString(36).substring(7),
                  code_id: this.project_id,
              };
              axios.post("/api/upcomings", newTask)
              .then(()=> {
                  this.upcoming.push(newTask);
              })
              .catch((err) => {console.log(err);})
              ;
              // Clear newTask
              this.newTask = "";
          }
      },
      // Delete Upcoming Task
      deleteUpcoming(taskId){
          if (confirm("Are you sure?")){
              fetch(`api/upcomings/${taskId}`,{
                  method: 'delete',
              })
              .then((res) => res.json())
              .then(() => {
                  this.upcoming = this.upcoming.filter(({taskId: id}) => id !== taskId);
              });
          }
      },
      checkUpcoming(taskId){
          if(this.todayTask.length > 4){
              alert("Sorry complete existing task");
              window.location.href="/";
          }
          else {
              this.addDailyTask(taskId);

              // Delete from upcoming Db
              fetch(`api/upcomings/${taskId}`,{
                  method: 'delete',
              }).then((res) => res.json())
              .then(() => {
                  this.upcoming = this.upcoming.filter(({taskId: id}) => id !== taskId);
              });
          }
      },
      //** Today Task */
      addDailyTask(taskId){
          // get task
          const task = this.upcoming.filter(({taskId: id}) => id == taskId)[0];
          // Post request
          axios.post("/api/todays", task)
          .then(() => {
              this.todayTask.unshift(task);
          })
          .catch((err) => console.log(err))
          ;

      },
      deleteTodayTask(taskId){
          if (confirm("Do you want to delete this task?")){
            fetch(`api/todays/${taskId}`,{
                  method: 'delete',
            })
            .then((res) => res.json())
            .then(() => {
                  this.todayTask = this.todayTask.filter(({taskId: id}) => id !== taskId);
            });
          }
      },
      updateTodayTask(taskId){
          if (confirm("Do you actually finish this task?")){
            fetch(`api/todays/${taskId}`,{
                  method: 'delete',
            })
            .then((res) => res.json())
            .then(() => {
                  this.todayTask = this.todayTask.filter(({taskId: id}) => id !== taskId);
            });
          }
      },
      ...mapGetters(['getProjectId']),

  },
};
</script>

<style>
</style>
