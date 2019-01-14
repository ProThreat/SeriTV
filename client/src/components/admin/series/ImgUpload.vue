<template>
  <div class="uploadImage">

    <div class="item">
      <my-upload field="img" key="0" :value.sync="show" :params="otherParams" @crop-success="cropSuccess" :width="300" :height="300" url="http://localhost:3000/api/v1/uploadImage" langType="en"></my-upload>
      <a class="btn" @click="toggleShowImage">set avatar</a>
      <img :src="imgDataUrl">
    </div>

  </div>
</template>

<script>
import myUpload from 'vue-image-crop-upload'

export default {

  data () {
    return {
      show: true,
      imgDataUrl: '',
      headers: {
        smail: '*_~'
      },
      otherParams: {
        token: '123456798',
        name: 'img'
      }
    }
  },

  components: {
    'my-upload': myUpload
  },

  methods: {

    toggleShowImage () {
      this.show = !this.show
    },

    cropSuccess (imgDataUrl, field) {
      console.log('-------- crop success --------')
      this.imgDataUrl = imgDataUrl
    }

  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>
