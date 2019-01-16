<template>
  <div class="series edit">

      <form method="post" action="/admin/seri/create" autocomplete="off" enctype="multipart/form-data">

          <div class="images">
              <div class="overlay"></div>
              <!-- Add dropzone -->
              <vue-dropzone ref="myVueDropzone" id="dropzone" :options="sliderOptions"></vue-dropzone>
              <!-- <div class="slider owl-carousel">
                <div class="slide" v-bind:style="{ backgroundImage: 'url('+ './assets/img/cat.jpg' +')' }"></div>
              </div> -->
          </div>

          <div class="seri-information container">

              <div class="row">
                  <div class="col-5 col-md-4 col-lg-3">
                      <!-- <div class="image" style="background-image: url('http://localhost:3000/img/placeholder.jpg')"></div> -->
                      <!-- <img-upload /> -->
                      <vue-dropzone ref="myVueDropzone" id="dropzone" :options="thumbnailOptions"></vue-dropzone>
                  </div>

                  <div class="short-information col-7 col-md-8 col-lg-9">
                      <div class="top">
                          <h1>{{ title || 'Title here...' }}</h1>
                          <p><textarea class="short blend-style" name="short_description" placeholder="Enter short description here..."></textarea></p>

                          <!-- TODO Create working rating (based on imdb, added couchplanner rating later on) -->
                          <div class="rating">
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                              <i class="fa fa-star"></i>
                          </div>
                      </div>

                  </div>
              </div>
              <div class="row seri-body">

                  <div class="col-12 col-md-4 col-lg-3">
                      <div class="seriBar name">
                          <span>Name</span>
                          <ul>
                              <li><input class="name_input blend-style" name="name[]" v-model="title" placeholder="Title here..."></li>
                              <li :key="input.id" v-for="input in inputsName">
                                <input :id="input.id" class="name_input blend-style" name="name[]" v-model="input.value" placeholder="Title here...">
                              </li>
                          </ul>
                          <button class="add_input" @click="addInput" type="button">+</button>
                      </div>

                      <div class="seriBar type">
                          <span>Type</span>
                          <select class="blend-style" name="type">
                              <option v-for="(type, index) in types" :key="index">{{ type.type }}</option>
                          </select>
                      </div>

                      <div class="seriBar">
                          <span>Release date: </span>
                          <input class="blend-style" type="date" name="release_date" placeholder="15th June 1998"/>
                      </div>

                      <div>Genres</div>
                      <tags-input element-id="tags" :existing-tags="genres" :typeahead="true" :only-existing-tags="true" :add-tags-on-comma="true" :typeahead-max-results="5"></tags-input>

                      <div class="seriBar">
                          <div>Seasons</div>
                          <input class="blend-style" type="number" name="seasons" value="" placeholder="1"/>
                      </div>

                      <div class="seriBar">
                          <div>Episodes</div>
                          <input class="blend-style" type="number" name="episodes" value="" placeholder="24"/>
                      </div>

                      <div class="seriBar">
                          <div>Aired</div>
                          <input class="blend-style" type="date" name="aired[]" value="" /> -
                          <input class="blend-style" type="date" name="aired[]" value="" />
                      </div>

                      <div class="seriBar">
                          <div>Duration</div>
                          <input class="blend-style" name="duration" value="" placeholder="23 per ep." />
                      </div>

                      <div><small class="label">*The following fields will not be shown if empty</small></div>

                      <div>Rating</div>
                      <tags-input element-id="tags" :existing-tags="rating" :typeahead="true" :only-existing-tags="true" :add-tags-on-comma="true" :typeahead-max-results="5"></tags-input>

                      <div>Producers</div>
                      <tags-input element-id="tags" :existing-tags="producers" :typeahead="true" :only-existing-tags="true" :add-tags-on-comma="true" :typeahead-max-results="5"></tags-input>

                      <div>Licensors</div>
                      <tags-input element-id="tags" :existing-tags="licensors" :typeahead="true" :only-existing-tags="true" :add-tags-on-comma="true" :typeahead-max-results="5"></tags-input>

                      <div>Studios</div>
                      <tags-input element-id="tags" :existing-tags="studios" :typeahead="true" :only-existing-tags="true" :add-tags-on-comma="true" :typeahead-max-results="5"></tags-input>

                      <!--
                        To add: episodes, aired (date to date)?, duration, rating, producers & licensors & studios?
                        see also: https://myanimelist.net/anime/36456/Boku_no_Hero_Academia_3rd_Season
                      -->

                  </div>

                  <div class="col-12 col-md-8 col-lg-9">

                    <b-tabs>

                      <b-tab title="Details" active>
                        <div class="description expand">
                            <h4>Description</h4>
                            <textarea class="blend-style" name="description" placeholder="Insert description here..."></textarea>
                        </div>
                        <div class="background expand">
                            <h4>Background information</h4>
                            <textarea class="blend-style" placeholder="Insert description here...">No background information has been added</textarea>
                        </div>
                      </b-tab>

                      <b-tab title="Media">
                        <p>Scroll down or up to see the other demos.</p>
                      </b-tab>

                      <b-tab title="Recommendations">
                        <p>No recommendations found yet</p>
                      </b-tab>

                      <b-tab title="Stats">
                        <p>No stats availible yet!</p>
                      </b-tab>

                      <b-tab title="Characters & Staff" >
                        <h3>Cast</h3>
                        <div class="crew-group cast">
                            <crew-box :data="{ person }" :key="{ person }" v-if="person.active" v-for="person in cast" />
                            <b-btn v-b-modal.modalCast>Launch demo modal</b-btn>
                            <!-- <a class="crew-add" data-popup="crew" data-type="cast">
                                <span><i class="fa fa-plus"></i></span>
                            </a> -->
                        </div>

                        <h3>Crew</h3>
                        <div class="crew-group crew">
                            <crew-box :data="{ person }" :key="{ person }" v-if="person.active" v-for="person in crew" />
                            <b-btn v-b-modal.modalCrew>Launch demo modal</b-btn>
                            <!-- <a class="crew-add" data-popup="crew" data-type="crew">
                                <span><i class="fa fa-plus"></i></span>
                            </a> -->
                        </div>
                      </b-tab>

                    </b-tabs>

                    <div class="mt-3 w-100 d-flex">
                        <button class="btn btn-flat ml-auto">Save</button>
                    </div>
                  </div>

              </div>
          </div>

          <!-- Modals -->
          <b-modal id="modalCast" ref="modal" title="Add cast">
            <div class="crew-group">
              <crew-box v-for="person in cast" :key="person.id" :data="{ person }" />
            </div>
          </b-modal>

          <b-modal id="modalCrew" ref="modal" title="Add crew">
            <div class="crew-group">
              <crew-box v-for="person in crew" :key="person.id" :data="{ person }" />
            </div>
          </b-modal>

      </form>

  </div>
</template>

<script>
// Ajax
import TypeService from '@/services/TypeService'
import GenreService from '@/services/GenreService'
import PeopleService from '@/services/PeopleService'
import CompanyService from '@/services/CompanyService'

// Dropzone
import vue2Dropzone from 'vue2-dropzone'
import 'vue2-dropzone/dist/vue2Dropzone.min.css'

//
import crewBox from '@/components/Admin/Series/CrewBox'

//
export default {

  components: {
    vueDropzone: vue2Dropzone,
    crewBox
  },

  data () {
    return {
      title: '',
      types: null,
      genres: null,
      cast: [],
      crew: [],
      producers: null,
      licensors: null,
      studios: null,
      inputsName: [],
      rating: {
        1: 'G (General audience)',
        2: 'PG (Parental Guidance Suggestion)',
        3: 'PG-13 (Parents Strongly Cautioned)',
        4: 'R (Restricted)',
        5: 'NC-17 (Adults only)',
        6: '18+',
        7: '15+',
        8: '14+'
      },

      sliderOptions: {
        url: 'http://localhost:3000/api/v1/uploadImage',
        resizeWidth: 1920,
        maxFilesize: 1
      },
      thumbnailOptions: {
        url: 'http://localhost:3000/api/v1/uploadImage',
        resizeWidth: 255,
        resizeHeight: 308,
        maxFilesize: 0.5,
        maxFiles: 1
      }
    }
  },

  async mounted () {
    this.types = (await TypeService.index()).data
    this.genres = (await GenreService.index()).data
    this.cast = (await PeopleService.index()).data
    this.crew = (await PeopleService.index()).data
    this.producers = (await CompanyService.producers()).data
    this.licensors = (await CompanyService.licensors()).data
    this.studios = (await CompanyService.studios()).data
  },

  methods: {

    addInput () {
      this.inputsName.push({
        value: ''
      })
    }

  }

}
</script>

<style lang="scss">
  @import './assets/sass/series/create_edit.scss';
  @import './assets/sass/plugins/tags/style.scss';
</style>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>
