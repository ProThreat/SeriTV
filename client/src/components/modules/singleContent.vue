<template>
    <b-card :title="title"
          :img-src="coverImage"
          img-alt="Image"
          img-top
          tag="article"
          class="mb-2"
    >
    <p class="card-text">
      <span>{{ shortDescription }}</span>
      <small>Year: {{ year }}</small>
    </p>
  </b-card>
</template>

<script>
export default {
  props: [
    'title',
    'coverImage',
    'shortDescription',
    'year'
  ]
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
