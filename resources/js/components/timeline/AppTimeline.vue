<template>
  <div>
    <app-timeline-create/>

    <section class="timeline__posts">
      <app-timeline-post
        v-for="post in posts"
        :key="post.id"
        :post="post"/>
    </section>
  </div>
</template>

<script>
import AppTimelineCreate from '../timeline/AppTimelineCreate';
import AppTimelinePost from '../timeline/AppTimelinePost';
import axios from 'axios';

export default {
  components: {
    AppTimelineCreate,
    AppTimelinePost
  },
  data() {
    return {
      posts: []
    }
  },
  mounted() {
    this.getPosts();
  },
  methods: {
    async getPosts() {
      const posts = await axios.get('/api/posts');
      this.posts = posts.data.data;
    }
  }
}
</script>

<style>
.timeline__posts {
  margin-top: 40px;
}
</style>
