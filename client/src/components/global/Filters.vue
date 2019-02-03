<template>
  <div class="filtering">

    <div class="topBar">

      <b-tabs>
        <b-tab title="Top" active>
        </b-tab>
        <b-tab title="In theater">
        </b-tab>
        <b-tab title="Coming soon" >
        </b-tab>
      </b-tabs>

      <div class="buttons">
        <b-btn @click="showFilterMenu" variant="filter"><font-awesome-icon size="1x" :icon="['fas', 'filter']" /></b-btn>
      </div>

    </div>

    <div class="filters" :class="{ 'show': showFilters }">

      <div class="head">
        <font-awesome-icon size="1x" :icon="['fas', 'filter']" /><span>Filters</span>
        <span class="close"><font-awesome-icon size="1x" :icon="['fas', 'times']" /></span>
      </div>

      <h5 v-if="filter.includes('score')">Score</h5>
      <div class="score" v-if="filter.includes('score')">
        <vue-slider ref="slider" v-if="scoreOptions" v-model="allFilters.score" v-bind="scoreOptions" @change="getItemsByFilters"></vue-slider>
      </div>

      <h5 v-if="filter.includes('format')">View</h5>
      <div class="format" v-if="filter.includes('format')">
        <label class="ccChecker" v-for="format in formats" :key="format" @change="filterToParent('formats', format)">{{ format }}
          <input type="radio" :value="format" v-model="formatPicked" @change="getItemsByFilters">
          <span class="checkmark"></span>
        </label>
      </div>

      <h5 v-if="filter.includes('search')">Search</h5>
      <div class="search-wrapper" v-if="filter.includes('search')">
        <font-awesome-icon size="1x" :icon="['fas', 'search']" />
        <input type="text" class="form-control search" v-on:keyup="onKeyUp()" v-model="allFilters.title" placeholder="Search title.."/>
      </div>

      <h5 v-if="filter.includes('type')">Type</h5>
      <div class="types" v-if="filter.includes('type')">
        <div ref="labels" class="labels">
          <label class="ccChecker" v-for="item in types" :key="item.id">{{ item.type }}
            <input type="radio" name="type" :value="item.id" v-model="allFilters.type" @change="getItemsByFilters">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>

      <h5 v-if="filter.includes('genre')">Genres</h5>
      <div class="genre hasMore" v-if="filter.includes('genre')">
        <div class="search-wrapper">
          <font-awesome-icon size="1x" :icon="['fas', 'search']" />
          <input type="text" class="form-control search" v-on:keyup="onLabelKeyUp()" placeholder="Search.."/>
        </div>
        <div ref="labels" class="labels">
          <label class="ccChecker" v-for="genre in genres" :key="genre">{{ genre }}
            <input type="checkbox" :value="genre" v-model="allFilters.genre" @change="getItemsByFilters">
            <span class="checkmark"></span>
          </label>
        </div>
        <b-btn @click="showMore($event)" variant="filter" v-if="genres && genres.length > 6"><font-awesome-icon size="1x" :icon="['fas', 'plus']" /> <span>Show more</span></b-btn>
      </div>

      <h5 v-if="filter.includes('studios')">Studios</h5>
      <div class="studios" v-if="filter.includes('studios')">
        <div ref="labels" class="labels">
          <label class="ccChecker" v-for="item in studios" :key="item">{{ item }}
            <input type="checkbox" :value="item" v-model="allFilters.studios" @change="getItemsByFilters">
            <span class="checkmark"></span>
          </label>
        </div>
      </div>

      <h5 v-if="filter.includes('seasonal_dates')">Seasonal dates</h5>
      <div class="studios hasMore" v-if="filter.includes('seasonal_dates')">
        <div class="search-wrapper">
          <font-awesome-icon size="1x" :icon="['fas', 'search']" />
          <input type="text" class="form-control search" v-on:keyup="onLabelKeyUp()" placeholder="Search.."/>
        </div>
        <div ref="labels" class="labels">
          <label class="ccChecker" v-for="item in dates" :key="item">{{ item }}
            <input type="checkbox" :value="item" v-model="allFilters.seasonal_dates" @change="getItemsByFilters">
            <span class="checkmark"></span>
          </label>
        </div>
        <b-btn @click="showMore($event)" variant="filter" v-if="dates && dates.length > 6"><font-awesome-icon size="1x" :icon="['fas', 'plus']" /> <span>Show more</span></b-btn>
      </div>

      <h5 v-if="filter.includes('seasons')">Seasons</h5>
      <div class="seasons" v-if="filter.includes('seasons')">
        <vue-slider ref="seasonSlider" v-model="allFilters.seasons" v-bind="seasonOptions" @change="getItemsByFilters"></vue-slider>
      </div>

      <h5 v-if="filter.includes('episodes')">Episodes</h5>
      <div class="episodes" v-if="filter.includes('episodes')">
        <vue-slider ref="episodeSlider" v-model="allFilters.episodes" v-bind="episodeOptions" @change="getItemsByFilters"></vue-slider>
      </div>

    </div>

  </div>
</template>

<script>
import TypeService from '@/services/TypeService'
import GenreService from '@/services/GenreService'
import CompanyService from '@/services/CompanyService'
import MovieService from '@/services/MovieService'
import vueSlider from 'vue-slider-component'

export default {

  props: ['items', 'filter'],

  components: {
    vueSlider
  },

  data () {
    return {
      showFilters: false,

      allFilters: {
        title: ''
      },

      formats: ['List', 'Grid', '4x-Grid'],
      formatPicked: 'Grid',

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
      },

      types: null,
      genres: null,
      studios: null,
      dates: ['Summer 2019', 'Spring 2019', 'Winter 2019'],

      seasonOptions: {
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
      },

      episodeOptions: {
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
    // Add filters information
    this.types = (await TypeService.index()).data
    this.genres = (await GenreService.index()).data
    this.studios = (await CompanyService.studios()).data

    this.setAllFilters()
  },

  methods: {

    setAllFilters () {
      setTimeout(() => {
        // Check given filters
        if (this.$props.filter) {
          // Loop given filters
          for (var f = 0; f < this.$props.filter.length; f++) {
            // Set Filters
            if (this.filter[f] === 'score' || this.filter[f] === 'seasons' || this.filter[f] === 'episodes') {
              this.allFilters[this.filter[f]] = [0, 100]
            } else {
              this.allFilters[this.filter[f]] = []
            }
          }
        }

        // Refresh sliders
        if (this.$refs.slider) {
          this.$nextTick(() => this.$refs.slider.refresh())
        }
        if (this.$refs.seasonSlider) {
          this.$nextTick(() => this.$refs.seasonSlider.refresh())
        }
        if (this.$refs.episodeSlider) {
          this.$nextTick(() => this.$refs.episodeSlider.refresh())
        }
      }, 1)
    },

    showFilterMenu () {
      this.showFilters = !this.showFilters
    },

    typeDelay (ms = 300) {
      var timer = 0
      return function (callback) {
        clearTimeout(timer)
        timer = setTimeout(callback, ms)
      }
    },

    async onKeyUp () {
      // Delay (for if user is still typing)
      this.typeDelay(300)

      // Run filters
      this.getItemsByFilters()
    },

    async getItemsByFilters () {
      // Filters to get parameters
      var str = ''
      for (var key in this.allFilters) {
        if (str !== '') {
          str += '&'
        }
        str += key + '=' + encodeURIComponent(this.allFilters[key])
      }

      // Update items according to filters
      this.$emit('updateItems', (await MovieService.search(str)).data)
    },

    onLabelKeyUp () {
      // Get values
      var value = event.target.value
      var items = event.target.closest('.hasMore').querySelector('.labels').children

      // Loop labels
      for (var i = 0; i < items.length; i++) {
        // Get text of label
        var textValue = items[i].textContent || items[i].innerText

        // Show search results
        if (textValue.toUpperCase().indexOf(value.toUpperCase()) > -1) {
          items[i].style.display = ''
        } else {
          items[i].style.display = 'none'
        }
      }
    },

    showMore (event) {
      // Change text
      var text = event.target.querySelector('span')
      text.innerHTML = text.innerHTML === 'Show more' ? 'Show less' : 'Show more'

      // Get parent
      var targetParent = event.target.closest('.hasMore')

      // Add active class to labels
      targetParent.querySelector('.labels').classList.toggle('active')
    },

    filterToParent (filter, value) {
      // Update filters on parent (component)
      this.$emit('updateFilters', { 'filter': filter, 'value': value })
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
