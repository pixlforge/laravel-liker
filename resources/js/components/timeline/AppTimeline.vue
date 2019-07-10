<template>
  <div>
    <app-timeline-create/>

    <section class="timeline__posts">
      <app-timeline-post
        v-for="x in 10"
        :key="x"/>
    </section>
  </div>
</template>

<script>
import AppTimelineCreate from '../timeline/AppTimelineCreate';
import AppTimelinePost from '../timeline/AppTimelinePost';

export default {
  components: {
    AppTimelineCreate,
    AppTimelinePost
  }  
}
</script>

<style>
.timeline__posts {
  margin-top: 40px;
}
</style>
