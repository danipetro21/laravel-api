<script >
import axios from 'axios';

export default {
  data() {
    return {
      movieList : [],
    }
  },
  mounted() {
    axios.get('http://localhost:8000/api/v1/movie/all')
      .then(res => {

        this.movieList = res.data.response;
        console.log(this.movieList);
      })
      .catch(err => console.error(err));
  }
}
</script>

<template>

  <ul>
    <li v-for="(movie, index) in this.movieList" :key="index"> 
      <p>name : {{ movie.name }}</p>
    </li>
  </ul>

</template>

<style scoped></style>
