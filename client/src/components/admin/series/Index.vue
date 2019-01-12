<template>
  <div class="container">
    <div class="row">

        <div class="col-12 col-sm-3 mt-4" v-for="movie in movies">
          <div class="card">
            <img class="card-img-top" :src="movie.image">
            <div class="card-body">
              <h5 class="card-title">{{ movie.title }}</h5>
              <p class="card-text">{{ movie.description.substring(0,128)}}...</p>
              <a href="#" class="btn btn-primary">More info</a>
            </div>
          </div>
        </div>

    </div>
  </div>


</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import MovieService from '@/services/MovieService'

export default {
  data () {
    return {
      latestMovie: {},
      movies: {}
    }
  },
  async mounted () {
    this.movies = (await MovieService.index()).data
  }
}


</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
