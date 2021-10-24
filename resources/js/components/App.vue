<template>
  <div class="container">
    <Header :title="title" />
    <PostList />
    <main>lista post</main>
  </div>
</template>

<script>
import Header from "./Header.vue";
import PostList from "./Posts/PostList.vue";
export default {
  name: "App",
  data() {
    return { title: "Boolpress" };
  },
  components: {
    Header,
    PostList,
  },
};
</script>
