<template>
  <div>
    <Header />
    <router-view :loggedUser="loggedUser" />
  </div>
</template>

<script>
import Header from '@/components/global/Header.vue'

export default {
  name: 'app',
  components: {
    Header
  },

  computed: {
    loggedUser () {
      return this.$store.state.userlogged
    }
  }
}
</script>

<style>
</style>
