import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        isShow: false,
    },
    getters: {
        getIsShow(state){
            return state.isShow;
        }
    },
    actions: {

    },
    mutations: {
        changeIsShow(state, value){
            state.isShow = value;
        }
    }
});
