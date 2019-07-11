import Vuex from 'vuex';
import Vue from 'vue';
import axios from 'axios';

Vue.use(Vuex);

export default new Vuex.Store({

  /**
   * State
   */
  state: {
    posts: []
  },

  /**
   * Getters
   */
  getters: {
    posts(state) {
      return state.posts;
    }
  },

  /**
   * Mutations
   */
  mutations: {
    "SET_POSTS"(state, posts) {
      state.posts = posts;
    }
  },

  /**
   * Actions
   */
  actions: {
    async getPosts({ commit }) {
      const posts = await axios.get('/api/posts');
      commit('SET_POSTS', posts.data.data);
    }
  }
});