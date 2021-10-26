
<template>
  <div class="card my-3">
    <div class="card-header">
      <div class="d-flex justify-content-between align-items-center">
        <h2>{{ post.title }}</h2>

        <span
          class="badge badge-pill"
          :class="`badge-${post.category ? post.category.color : 'light'}`"
          >{{ post.category ? post.category.name : "Nessuna" }}</span
        >
      </div>
      <address>
        Scritto da: {{ post.author ? post.author.name : "Anonimo" }}
      </address>
    </div>

    <div class="card-body">
      <p>{{ post.content }}</p>
    </div>
    <div class="card-footer">
      <time>
        <small>Pubblicato il: {{ getFormattedDate(post.created_at) }}</small>
      </time>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post"],
  methods: {
    getFormattedDate(date) {
      const postDate = new Date(date);
      const day = postDate.getDate();
      const month = postDate.getMonth() + 1;
      const year = postDate.getFullYear();

      if (day < 10) day = "0" + day;
      if (day < 10) month = "0" + month;

      return `${day}/${month}/${year}`;
    },
  },
};
</script>
