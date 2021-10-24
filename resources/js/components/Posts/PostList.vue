
<template>
  <section id="post-list">
    <h2>I miei Post</h2>

    <!-- Caricamento della pagina facendolo a tutta pagina l utente non ha la possibilita' di eseguire altre operazioni -->
    <Loader v-if="isLoading" />

    <!-- Stampiamo tutti i post -->
    <PostCard v-for="post in posts" :key="post.id" :post="post" />
  </section>
</template>

<script>
// import axios from 'axios';  //importare axios primo metodo //secondo metodo in front.js
import Loader from "./Loader.vue";
import PostCard from "./PostCard.vue";

export default {
  name: "PostList",
  components: {
    PostCard,
    Loader,
  },
  data() {
    return {
      baseUri: "http://127.0.0.1:8001", //la porta 8001 puo essere modifica in base alla porta di lavoro
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
          /*
            this.posts = res.data.data; //Aggiunta di un altro data pke abbiamo modificato il Api/PostController.php la index per visualissare solo 5 post  per volta. questo ha comportato la creazione di un oggetto che ha come chiave data(si puo usare postman per vedere il nome della chiave che e' stata passata)
            */
          /*Un altro modo di scrivere migliore a quello di sopra e' scriverlo sotto forma di oggetto pke si ha la possibilita di importare piu elementi all interno dell oggetto
            dall array associativo che vediamo in postman, quindi invece di ripetere ogni volta tutto quello di cui abbiamo bisogno con questo procedimento li possiamo raggruppare tutti */
          const { data, current_page, last_page } = res.data; //DESTRUCTURING
          this.posts = data;

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