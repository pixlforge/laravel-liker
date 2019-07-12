<template>
  <form @submit.prevent="submit">
    <div class="form-group">
      <label
        for="body"
        class="sr-only">
        Share something
      </label>
      <textarea
        id="body"
        v-model="form.body"
        name="body"
        class="form-control"
        placeholder="Share something"
        rows="3">

      </textarea>
    </div>

    <button
      type="submit"
      class="btn btn-primary btn-block">
      Post
    </button>
  </form>
</template>

<script>
import { mapActions } from 'vuex';

export default {
  data() {
    return {
      form: {
        body: ""
      }
    };
  },
  methods: {
    ...mapActions({
      createPost: "createPost"
    }),
    async submit() {
      await this.createPost(this.form);
      this.form.body = "";
    }
  }
}
</script>
