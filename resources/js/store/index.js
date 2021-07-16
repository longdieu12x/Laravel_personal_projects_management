import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({

    state: {
        project_id: 0,
    },
    getters: {
        getProjectId(state){
            return state.project_id;
        }
    },
    actions: {

    },
    mutations: {
        changeProjectId(state, value){
            state.project_id = value;
        }
    }
});
