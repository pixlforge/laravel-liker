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
    },

    "PREPEND_POST"(state, post) {
      state.posts.unshift(post);
    },

    "UPDATE_POST"(state, post) {
      state.posts = state.posts.map(p => {
        if (p.id === post.id) {
          return post;
        }

        return p;
      });
    }
  },

  /**
   * Actions
   */
  actions: {
    async getPosts({ commit }) {
      const posts = await axios.get('/api/posts');
      commit('SET_POSTS', posts.data.data);
    },

    async getPost({ commit }, id) {
      const post = await axios.get(`/api/posts/${id}`);
      commit('PREPEND_POST', post.data.data);
    },

    async refreshPost({ commit }, id) {
      const post = await axios.get(`/api/posts/${id}`);
      commit('UPDATE_POST', post.data.data);
    },
    
    async createPost({ commit }, post) {
      const res = await axios.post('/api/posts', post);
      commit('PREPEND_POST', res.data.data);
    },

    async likePost({ commit }, id) {
      let post = await axios.post(`/api/posts/${id}/likes`);
      commit('UPDATE_POST', post.data.data);
    }
  }
});