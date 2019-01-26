<template>
  <div class="SeriesPage">

    <Filters :class="{ 'show': showFilters }" :items="movies" :filter="theaterFilters" @updateItems="changeMovies" />

    <div class="header" :style="{ backgroundImage: 'url('+bgImage+')'}"></div>

    <div class="SerieItems container-fluid">

      <div class="container">
        <!-- https://medium.muz.li/imdb-redesign-concepts-39a832b7867d -->
        <div class="topBar">

          <b-tabs>
            <b-tab title="In theater" active>
            </b-tab>
            <b-tab title="Coming soon" >
            </b-tab>
          </b-tabs>

          <div class="buttons">
            <b-btn @click="showFilterMenu" variant="filter"><font-awesome-icon size="1x" :icon="['fas', 'filter']" /></b-btn>
          </div>

        </div>
        <div class="row">

            <div class="col-12 col-sm-3 mt-4" :key="movie.id" v-for="movie in movies">
              <div class="card">
                <img class="card-img-top" alt="Movie poster" :src="movie.image">
                <div class="card-body">
                  <h5 class="card-title">{{movie.title}}</h5>
                  <p class="card-text" v-if="movie.description.length>0">{{movie.description.substring(0,128)}}...</p>
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
      showFilters: false,
      bgImage: require('@/assets/img/camcorder.jpg'),
      latestMovie: {},
      movies: {},
      theaterFilters: ['grid', 'search', 'rating', 'watched', 'seasons', 'episodes'],
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

    showFilterMenu () {
      this.showFilters = !this.showFilters
    }
  }

}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
.SeriesPage { background-color: #f2f2f2;
  .header { height: 30vw; background-size: cover; background-position: center; }
  .SerieItems { position: relative;
    .topBar { display: flex;
      .buttons { margin-left: auto; margin-right: 15px;
        .btn-filter { border: 1px solid rgba(128, 128, 128, 0.4); color:rgb(128, 128, 128); border-radius: 5px; }
      }
    }
    .container { background-color: #f2f2f2; margin-top: -60px; padding: 15px; border-radius: 3px; }
  }
}
</style>

<style lang="scss">
// Navbar
nav, .navbar { position: absolute; width: 100%; background: transparent !important;
  .navbar-nav {
    .nav-link { color: white !important;
    }
  }
}

// Tabs
.nav-tabs { margin: 1px -15px 30px; padding: 0 15px; border-bottom: 0 solid rgba(0,0,0,0.05);
  .nav-item {
    .nav-link { border: none; text-transform: uppercase; color: black; font-size: 18px;
      &.active { position: relative; color: #22a7f0; background: transparent;
        &:before { content: ''; position: absolute; left: 15%; right: 15%; bottom: -1px; border-bottom: 2px solid #22a7f0; }
      }
    }
  }
}
</style>
