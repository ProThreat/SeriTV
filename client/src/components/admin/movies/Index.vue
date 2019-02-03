<template>
  <div>

    <div v-if="loggedUser && loggedUser.permission >= 1" class="container mt-4">
      <div class="search-wrapper">
          <input type="text" class="form-control" v-on:keyup="onKeyUp()" v-model="key" placeholder="Search title.."/>
      </div>
      <div class="row">

          <div class="col-12 col-sm-3 mt-4" :key="movie.id" v-for="movie in movies">
            <div class="card">
              <img class="card-img-top" alt="Movie poster" :src="movie.image">
              <div class="card-body">
                <h5 class="card-title">{{ movie.title }}</h5>
                <p class="card-text" v-if="movie.description.length>0">{{ movie.description.substring(0,128) }}...</p>
                <p class="card-text" v-else>...</p>
              </div>
            </div>
          </div>

      </div>
    </div>
    <div v-else-if="!loggedUser">
      <b-alert variant="danger" show>You have to login to access this page</b-alert>
    </div>
    <div v-else>
      <error-page />
    </div>

  </div>
</template>

<script>
import MovieService from '@/services/MovieService'
import ErrorPage from '@/components/global/403'

// wait function for onkeyup delay
function wait (time) {
  return new Promise(resolve => {
    setTimeout(() => {
      resolve()
    }, time)
  })
}

export default {

  props: ['loggedUser'],
  data () {
    return {
      latestMovie: {},
      movies: {},
      key: ''
    }
  },

  components: {
    ErrorPage
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
    }
  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>

</style>
