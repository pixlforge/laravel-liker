<template>
  <div>
    <span
      v-if="post.likes"
      class="text-secondary">
      {{ likes }} from {{ numberOfUsers }}
      (including you)
    </span>

    <ul class="list-inline mb-0">
      <li class="list-inline-item">
        <a href="">
          Like it
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
import pluralize from "pluralize";

export default {
  props: {
    post: {
      type: Object,
      required: true
    }
  },
  computed: {
    likes() {
      return pluralize('like', this.post.likes, true);
    },
    numberOfUsers() {
      return pluralize('person', this.post.likers.data.length, true);
    }
  }
}
</script>

