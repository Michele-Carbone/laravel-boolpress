
<template>
  <section id="post-list">
    <h2>I miei Post</h2>
  </section>
</template>

<script>
// import axios from 'axios';  //importare axios primo metodo //secondo metodo in front.js
export default {
  name: "PostList",
  data() {
    return { posts: [] };
  },
  methods: {
    //chiamata Api dei post
    getPosts() {
      axios.get("http://127.0.0.1:8001/api/posts");
    },
  },
};
</script>

<style>
</style>