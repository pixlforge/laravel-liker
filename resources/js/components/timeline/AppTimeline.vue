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
import { mapGetters, mapActions } from 'vuex';

export default {
  components: {
    AppTimelineCreate,
    AppTimelinePost
  },
  computed: {
    ...mapGetters({
      posts: "posts"
    })
  },
  mounted() {
    this.getPosts();
  },
  methods: {
    ...mapActions({
      getPosts: "getPosts"
    })
  }
}
</script>

<style>
.timeline__posts {
  margin-top: 40px;
}
</style>
