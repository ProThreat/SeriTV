<template>
  <b-navbar toggleable="md" type="dark" variant="info">
    <b-container>
      <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
      <router-link class="navbar-brand" to="/">SeriTV</router-link>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <b-nav-item-dropdown text="Movies" right>
            <b-dropdown-item href="#">Action</b-dropdown-item>
            <b-dropdown-item href="#">War</b-dropdown-item>
            <b-dropdown-item href="#">Comedy</b-dropdown-item>
          </b-nav-item-dropdown>
          <b-nav-item-dropdown text="Series" right>
            <b-dropdown-item href="#">Action</b-dropdown-item>
            <b-dropdown-item href="#">War</b-dropdown-item>
            <b-dropdown-item href="#">Comedy</b-dropdown-item>
          </b-nav-item-dropdown>
        </ul>
      </div>
    </b-container>
  </b-navbar>
</template>

<script>
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

export default {
  data () {
    return {
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
</style>
