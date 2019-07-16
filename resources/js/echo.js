import store from "./store";

Echo.channel('posts')
    .listen('PostCreated', event => {
      store.dispatch('getPost', event.post.id);
    });