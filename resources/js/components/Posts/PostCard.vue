
<template>
  <div class="card my-3">
    <div class="card-header">{{ post.title }}</div>
    <div class="card-body">
      <p>{{ post.content }}</p>
      <blockquote class="blockquote mb-0">
        <footer class="blockquote-footer">
          <time
            ><small>Pubblicato il: {{ post.created_at }}</small></time
          >
        </footer>
      </blockquote>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post"],
};
</script>
