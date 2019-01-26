<template>
  <div class="container mt-4">
      <div class="search-wrapper">
          <input type="text" class="form-control" v-on:keyup="onKeyUp()" v-model="key" placeholder="Search title.."/>
      </div>
    <div class="row">

        <div class="col-12 col-sm-3 mt-4" :key="movie.id" v-for="movie in movies">
          <div class="card">
            <img class="card-img-top" alt="Movie poster" :src="movie.image">
            <div class="card-body">
              <h5 class="card-title">{{movie.title}}</h5>
              <p class="card-text" v-if="movie.description.length>0">{{movie.description.substring(0,128)}}...</p>
              <p class="card-text" v-else>...</p>
              <a href="#" @click="onClick(movie.id)" class="btn btn-primary">Mark as watched</a>
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

// wait function for onkeyup delay
function wait (time) {
  return new Promise(resolve => {
    setTimeout(() => {
      resolve()
    }, time)
  })
}

export default {
  data () {
    return {
      latestMovie: {},
      movies: {},
      key: ''
    }
  },

  async mounted () {
    this.movies = (await MovieService.index()).data
  },

  methods: {
    async onKeyUp () {
      await wait(300)
      if (this.key === '') {
        this.movies = (await MovieService.index()).data
      } else {
        this.movies = (await MovieService.search(this.key)).data
      }
    },
    onClick (movieId) {
      let user = JSON.parse(localStorage.getItem('user'))
      this.$http.post('http://localhost:3000/api/v1/watched_movies/', {
        user_id: user['id'],
        movie_id: movieId
      })
    }
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
