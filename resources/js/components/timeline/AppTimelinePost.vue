<template>
  <div class="timeline__post media">
    <img
      :src="post.author.data.avatar"
      alt=""
      class="timeline__avatar rounded mr-3">
    <div class="media-body">
      <div class="font-weight-bold">
        {{ post.author.data.name }}
      </div>
      <p>
        {{ post.body }}
      </p>

      <app-timeline-post-likes/>
    </div>
  </div>
</template>

<script>
import AppTimelinePostLikes from "../timeline/AppTimelinePostLikes";

export default {
  components: {
    AppTimelinePostLikes
  },
  props: {
    post: {
      type: Object,
      required: true
    }
  }
}
</script>

<style>
.timeline__post {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  margin-bottom: 20px;
}

.timeline__avatar {
  width: 60px;
}
</style>
