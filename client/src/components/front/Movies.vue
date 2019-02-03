<template>
  <div class="SeriesPage">

    <div class="header" :style="{ backgroundImage: 'url('+bgImage+')'}"></div>

    <div class="SerieItems container-fluid">

      <div class="container">
        <!-- https://medium.muz.li/imdb-redesign-concepts-39a832b7867d -->

        <Filters :items="movies" :filter="theaterFilters" @updateFilters="updateFilters" @updateItems="changeMovies" />

        <div class="row" :class="filters.formats">

            <div class="col-12 col-sm-4 mt-4 item" :key="movie.id" v-for="movie in movies">
              <div class="card">
                <a href="" class="img-top" alt="Movie poster" :style="{ 'backgroundImage': 'url(' + movie.image + ')' }"></a>
                <div class="card-body">
                  <h5 class="card-title" :title="movie.title"><a href="">{{ movie.title }}</a></h5>
                  <div class="genres"><span v-for="item in movie.genres" :key="item.id">{{ item.genre }}</span></div>
                  <div class="score" v-if="movie.reviews && calculateScore(movie.reviews)"><span :style="{ 'height': calculateScore(movie.reviews)+'%' }"><font-awesome-icon size="1x" :icon="['fas', 'star']" /></span><font-awesome-icon size="1x" :icon="['fas', 'star']" /> {{ calculateScore(movie.reviews) }}</div>
                  <button @click="onClick(movie.id)" class="btn addtoWatchlist">+</button>
                </div>
              </div>
            </div>

        </div>

        <b-pagination size="md" :total-rows="100" v-model="currentPage" :per-page="8" />

      </div>
    </div>

  </div>
</template>

<script>
import MovieService from '@/services/MovieService'
import Filters from '@/components/Global/Filters'

export default {

  props: ['loggedUser'],
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

    calculateScore (scores) {
      var total = 0
      if (scores.length > 0) {
        for (var i = 0; i < scores.length; i++) {
          total += parseFloat(scores[i].rating)
        }
      }
      return isNaN((total / scores.length)) ? false : (total / scores.length) // .toFixed(2)
    },

    changeMovies (value) {
      this.movies = value
    },

    updateFilters (filterOn) {
      this.filters[filterOn.filter] = filterOn.value
    },

    onClick (movieId) {
      this.$http.post('http://localhost:3000/api/v1/watched_movies/', {
        user_id: this.loggedUser.id,
        movie_id: movieId,
        watched_type: 1
      })
    }

  }

}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>
@import './../../../assets/sass/themes/default.scss';
.SeriesPage { background-color: #f2f2f2; min-height: 100vh;
  .header { height: 30vw; background-size: cover; background-position: center; }
  .SerieItems { position: relative;
    .container { background-color: #f2f2f2; margin-top: -60px; padding: 15px; border-radius: 3px;
      .row.List {
        .item { flex: 0 0 100%; max-width: 100%;
          .card { display: flex; flex-direction: row;
            .img-top { flex: 0 0 15%; max-width: 15%; padding-bottom: 15%; }
            .card-body { flex: 0 0 75%; max-width: 75%; }
          }
        }
      }
      .row.4x-Grid {
        //@include media-breakpoint-up(sm) { .item { flex: 0 0 25%; max-width: 25%; } }
      }
      .item { transition: 0.3s all ease-in-out;
        .card { height: 100%; border-radius: 0; background: transparent; border: 0; box-shadow: 0px 1px 10px 0px rgba(0, 0, 0, 0.25);
          &:hover { text-decoration: none; box-shadow: 0px 1px 25px 0px rgba(0, 0, 0, 0.25); }
          .img-top { background-size: cover; background-position: center; padding-bottom: 150%; }
          .card-body { display: flex; flex-direction: column; padding: 1rem 1.25rem; color: rgba(0, 0, 0, 0.7);
            h5 { text-transform: uppercase; font-size: 15px; letter-spacing: 1px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; margin: 0 0 3px 0;
              a { color: rgba(0, 0, 0, 0.7);
                &:hover, &:active, &:focus { text-decoration: none; }
              }
            }
            .genres { color: $primaryColor; font-family: $Roboto; font-size: 14px; font-weight: 500; margin-bottom: 15px;
              span:not(:last-child):after { content: ', '; }
            }
            .score { position: relative; margin-top: auto; margin-bottom: 15px; text-transform: uppercase; font-size: 15px; letter-spacing: 1px; font-family: inherit; font-weight: 500; line-height: 1.2;
              > span { position: absolute; overflow: hidden; top: 0; bottom: 0;
                svg, i { color: gold; }
              }
            }
            .addtoWatchlist { position: absolute; right: 0; bottom: 0; z-index: 1; color: black; font-size: 1.1em; padding: 29px 10px 5px 35px;
              &:before { content: ''; position: absolute; right: -1px; bottom: -1px; border: 30px solid gold; border-top: 30px solid transparent; border-left: 30px solid transparent; z-index: -1; }
            }
          }
        }
      }
    }
  }
}
</style>
