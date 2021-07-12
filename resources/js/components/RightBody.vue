<template>
<div id="right">
    <h1>Development Crm</h1>
    <div class="horizontal">
      <img src="../images/horizontal.png"  alt=""/>
    </div>

    <p>
      Lorem Ipsum is simply dummy text of the printing and typesetting industry.
      Lorem Ipsum has been the industry's standard dummy text ever since the
      1500s
    </p>

    <div class="users-icon"><img src="../images/users.png" alt=""/></div>
    <div class="upcoming">
        <div class="add-tasks">
            <h2>Today's Task</h2>
            <div class="add-action">
                <img src="../images/add.png" alt="">
            </div>
        </div>

            <ul class="tasks-list">
                <li v-for="task in todayTask" :key="task.id">
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
            <div class="add-action">
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
export default {
  data() {
    return {
        todayTask: [],
        upcoming: [],
        newTask: "",
        newTodayTask: "",
    };
  },
  created() {
      this.fetchTodayTasks();
      this.fetchUpcoming();
  },
  methods: {
      //** Upcoming Task */
      //get upcoming tasks
      fetchUpcoming(){
        axios.get('/api/upcomings')
            .then((res) => {
                return res.data;
            })
            .then((res) => {
                this.upcoming = res.data;
                console.log(this.upcoming);
            })
            .catch((err) => { console.log(err) });
        },
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
                  taskId: Math.random().toString(36).substring(7)
              };
              axios.post("/api/upcomings", newTask)
              .then(()=> {
                  this.upcoming.push(newTask);
                  console.log(newTask);
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
      // Get today Tasks
      fetchTodayTasks(){
        axios.get('/api/todays')
            .then((res) => {
                return res.data;
            })
            .then((res) => {
                this.todayTask = res.data;
                console.log(this.todayTask);
            })
            .catch((err) => { console.log(err) });
      },
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
      }

  },
};
</script>

<style>
</style>
