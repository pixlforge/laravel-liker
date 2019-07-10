<template>
  <div class="timeline__post media">
    <img
      src=""
      alt=""
      class="timeline__avatar rounded mr-3">
    <div class="media-body">
      <div class="font-weight-bold">
        Célien
      </div>
      <p>
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia tempora, omnis corrupti deserunt eius ut. Hic quibusdam eveniet corporis voluptate officia pariatur ab quasi, expedita esse commodi delectus atque aperiam?
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
