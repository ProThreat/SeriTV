<template>
  <div class="filters">

    <div class="head">
      <font-awesome-icon size="1x" :icon="['fas', 'filter']" /><span>Filters</span>
      <span class="close"><font-awesome-icon size="1x" :icon="['fas', 'times']" /></span>
    </div>

    <h5>Score</h5>
    <div class="score">
      <vue-slider ref="slider" v-model="score" v-bind="scoreOptions"></vue-slider>
    </div>

    <h5>Search</h5>
    <div class="search-wrapper">
        <input type="text" class="form-control search" v-on:keyup="onKeyUp()" v-model="key" placeholder="Search title.."/>
    </div>
    <div class="others">

    </div>
    <div class="genre">
      <label class="ccChecker" v-for="genre in genres" :key="genre">{{ genre }}
        <input type="checkbox" name="genres[]">
        <span class="checkmark"></span>
      </label>
    </div>
    <div class="format">
      <!-- TODO add right icons for vue -->
      <font-awesome-icon icon="th" />
      <font-awesome-icon icon="list-ul" />
      <i class="fas fa-th"></i>
      <i class="fas fa-list-ul"></i>
    </div>

  </div>
</template>

<script>
import GenreService from '@/services/GenreService'
import MovieService from '@/services/MovieService'
import vueSlider from 'vue-slider-component'

// wait function for onkeyup delay
function wait (time) {
  return new Promise(resolve => {
    setTimeout(() => {
      resolve()
    }, time)
  })
}

export default {

  props: ['items', 'filter'],

  components: {
    vueSlider
  },

  data () {
    return {
      showFilters: false,
      key: '',
      score: [0, 100],
      genres: null,
      scoreOptions: {
        data: null,
        eventType: 'auto',
        width: 'auto',
        height: 6,
        dotSize: 16,
        min: 0,
        max: 100,
        interval: 1,
        show: true,
        speed: 0.5,
        enableCross: true,
        tooltip: 'hover',
        tooltipDir: 'top',
        reverse: false,
        clickable: true
      }
    }
  },

  async mounted () {
    this.genres = (await GenreService.index()).data
  },

  methods: {

    async onKeyUp () {
      await wait(300)
      if (this.key === '') {
        this.$emit('updateItems', (await MovieService.index()).data)
      } else {
        this.$emit('updateItems', (await MovieService.search(this.key)).data)
      }
    }

  }

}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>

<style lang="scss">
@import './assets/sass/series/filters.scss';
</style>
