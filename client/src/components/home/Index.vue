<template>
  <b-container>
    <b-jumbotron class="mt-5" header="Things place" lead="The place to find cool things "></b-jumbotron>
    <b-row>
      <b-col md="6">
        <b-card :title="movie.title" img-src="https://i.imgur.com/IzVg5ET.png" img-alt="Image" img-top>
          <div class="card-body">
            <h5 class="card-title">Current things things:</h5>
          </div>
        </b-card>
      </b-col>
      <b-col md="6">

      </b-col>
    </b-row>
  </b-container>
</template>

<script>
import MovieService from '@/services/MovieService'

export default {
  data () {
    return {
      latestMovie: {},
      movie: {
        title: 'Avatar'
      }
    }
  },
  async mounted () {
    this.movies = (await MovieService.index()).data
  },
  components: {
    MovieService
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
