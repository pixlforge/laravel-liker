<template>
  <div>
    <span class="text-secondary">
      {{ likes }} likes from X people (including you)
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
export default {
  props: {
    likes: {
      type: Number,
      required: true
    }
  }
}
</script>

