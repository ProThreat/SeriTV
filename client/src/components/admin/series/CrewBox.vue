<template>

    <div class="crew-box" :class="{ 'selected': toggled }" @click="toggleItem">
      <div class="overlay">+</div>
      <div class="image" style="background-image: url('http://localhost:3000/img/placeholder.jpg')"></div>
      <div class="name">{{ data.person.name }}</div>
    </div>

</template>

<script>

export default {

  props: ['data'],

  data () {
    return {
      toggled: false
    }
  },

  methods: {

    toggleItem () {
      this.toggled = !this.toggled
      this.data.person.active = !this.data.person.active
    }

  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

</style>
