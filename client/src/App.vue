<template>
  <div>
    <Header />
    <router-view/>
  </div>
</template>

<script>
import Header from '@/components/global/Header.vue'

export default {
  name: 'app',
  components: {
    Header
  }
}
</script>

<style>
</style>
