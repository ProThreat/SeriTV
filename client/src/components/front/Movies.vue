<template>
  <div class="SeriesPage">

    <div class="header" :style="{ backgroundImage: 'url('+bgImage+')'}"></div>

    <div class="SerieItems container-fluid">

      <div class="container">
        <!-- https://medium.muz.li/imdb-redesign-concepts-39a832b7867d -->

        <Filters :items="movies" :filter="theaterFilters" @updateFilters="updateFilters" @updateItems="changeMovies" />

        <div class="row" :class="filters.formats">

            <div class="col-12 col-sm-3 mt-4 item" :key="movie.id" v-for="movie in movies">
              <div class="card">
                <img class="card-img-top" alt="Movie poster" :src="movie.image">
                <div class="card-body">
                  <h5 class="card-title">{{movie.title}}</h5>
                  <p class="card-text" v-if="movie && movie.description.length>0">{{movie.description.substring(0,128)}}...</p>
                  <p class="card-text" v-else>...</p>
                  <a href="#" class="btn btn-primary">More info</a>
                </div>
              </div>
            </div>

        </div>
      </div>
    </div>

  </div>
</template>

<script>
import MovieService from '@/services/MovieService'
import Filters from '@/components/Global/Filters'

export default {
  data () {
    return {
      bgImage: require('@/assets/img/camcorder.jpg'),
      latestMovie: {},
      movies: {},
      filters: { formats: 'Grid' },
      theaterFilters: ['format', 'score', 'search', 'type', 'genre', 'watched', 'studios'],
      comingSoonFilters: null
    }
  },

  components: {
    Filters
  },

  async mounted () {
    this.movies = (await MovieService.index()).data
  },

  methods: {

    changeMovies (value) {
      this.movies = value
    },

    updateFilters (filterOn) {
      this.filters[filterOn.filter] = filterOn.value
    }

  }

}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.SeriesPage { background-color: #f2f2f2;
  .header { height: 30vw; background-size: cover; background-position: center; }
  .SerieItems { position: relative;
    .container { background-color: #f2f2f2; margin-top: -60px; padding: 15px; border-radius: 3px;
      .item { transition: 0.3s all ease-in-out; }
    }
  }
}
</style>
