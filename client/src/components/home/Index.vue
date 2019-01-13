<template>
  <b-container>
    <b-row>
      <b-col
      v-for="movie in movies"
      :key="movie.title"
      lg="4"
      class="mt-2"
      >
        <single-content
          :title="movie.title"
          :description="movie.description"
          :image="movie.image"
          :releaseDate="movie.release_date"
          :rating="movie.imdb_rating"
          class="h-100"
        />
      </b-col>
    </b-row>
    <b-jumbotron class="mt-5" header="Things place" lead="The place to find cool things "></b-jumbotron>
  </b-container>
</template>

<script>
import MovieService from '@/services/MovieService'
import singleContent from '../modules/singleContent'

export default {
  data () {
    return {
      movies: []
    }
  },
  async mounted () {
    this.movies = (await MovieService.index()).data.slice(0, 3)
  },
  components: {
    MovieService,
    singleContent
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
