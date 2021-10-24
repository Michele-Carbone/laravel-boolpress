
<template>
  <section id="post-list">
    <h2>I miei Post</h2>

    <PostCard v-for="post in posts" :key="post.id" :post="post" />
  </section>
</template>

<script>
// import axios from 'axios';  //importare axios primo metodo //secondo metodo in front.js
import PostCard from "./PostCard.vue";

export default {
  name: "PostList",
  components: {
    PostCard,
  },
  data() {
    return {
      baseUri: "http://127.0.0.1:8001",
      posts: [],
      isLoading: false,
    };
  },
  methods: {
    //chiamata Api dei post
    getPosts() {
      this.isLoading = true;

      axios
        .get(`${this.baseUri}/api/posts`)
        .then((res) => {
          this.posts = res.data;
          this.isLoading = false;
        })
        .catch((err) => {
          console.error(err);
        })
        .then(() => {
          this.isLoading = false;
        });
    },
  },
  created() {
    this.getPosts();
  },
};
</script>

<style>
</style>