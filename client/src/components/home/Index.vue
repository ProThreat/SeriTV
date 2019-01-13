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
          :shortDescription="movie.short_description"
          :coverImage="movie.image"
          :year="movie.year"
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
    this.movies = (await MovieService.index()).data
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
