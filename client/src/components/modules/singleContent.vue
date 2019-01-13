<template>
    <b-card :title="title"
          :img-src="image"
          img-alt="Image"
          img-top
          tag="article"
          class="mb-2"
    >
    <p class="card-text card-movie-description">
      <span v-if="description">{{ description.slice(0, 200) }}...</span>
    </p>
    <p class="card-text">
      <i class="fab fa-imdb"></i>&nbsp;{{ rating }}
    </p>
    <p class="card-text">
      <small>Year: {{ releaseDate }}</small>
    </p>
  </b-card>
</template>

<script>
export default {
  props: [
    'title',
    'image',
    'description',
    'releaseDate',
    'rating'
  ]
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
.card-movie-description {
  min-height: 120px;
}
</style>
