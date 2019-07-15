<template>
  <div>
    <span
      v-if="post.likes"
      class="text-secondary">
      {{ likes }} from {{ numberOfUsers }}
      <template v-if="likedOwnPost">
        (including you)
      </template>
    </span>

    <ul
      v-if="canLike"
      class="list-inline mb-0">
      <li class="list-inline-item">
        <a
          href="#"
          @click.prevent="like">
          Like it
        </a>
      </li>
    </ul>
  </div>
</template>

<script>
import pluralize from "pluralize";
import { mapActions } from "vuex";

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
    },
    likedOwnPost() {
      return this.post.user.data.liked;
    },
    ownsPost() {
      return this.post.user.data.owner;
    },
    hasLikesRemaining() {
      return this.post.user.data.likes_remaining > 0;
    },
    canLike() {
      return !this.ownsPost && this.hasLikesRemaining;
    }
  },
  methods: {
    ...mapActions({
      likePost: "likePost"
    }),
    like() {
      this.likePost(this.post.id);
    }
  }
}
</script>

