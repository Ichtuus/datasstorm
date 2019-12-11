import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        loggingIn: false,
        loginError: null,
        accessToken: null,
    },
    mutations: {
        loginStart: state => state.loggingIn = true,
        loginStop: (state, errorMessage) => {
            state.loggingIn = false;
            state.loginError = errorMessage;
        },
        updateAccessToken: (state, accessToken) => {
            state.accessToken = accessToken;
        }
    },
    actions: {
        doLogin({ commit }, loginData) {
            commit('loginStart');
            axios.post('/login', {
              ...loginData
            },
            {
				headers:{
					'Content-Type': 'application/json'
				}
            })
            .then(response => {
                console.log(response);
                localStorage.setItem('accessToken', response.data.token);
                localStorage.setItem('username', response.data.email);
                commit('loginStop', null)
                commit('updateAccessToken', response.data.token);
            })
            .catch(error => {
                console.log(error);
                commit('loginStop', error)
            })
        },
        fetchAccessToken({commit}) {
            commit('updateAccessToken', localStorage.getItem('accessToken'));
        },
        deleteAccessToken({commit}) {
            commit('updateAccessToken', localStorage.removeItem('accessToken'));
        }
    }
})
