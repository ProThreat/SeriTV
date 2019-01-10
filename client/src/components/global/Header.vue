<template>
  <b-navbar toggleable="md" type="dark" variant="info">
    <b-container>
      <b-navbar-toggle target="nav_collapse"></b-navbar-toggle>
      <a class="navbar-brand" href="https://tbd.net">SeriTV</a>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Home</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/Movies">Movies</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/Series">Series</router-link>
          </li>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Things
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li class="nav-item">
              <router-link to="/Things">Things</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/Things">Things</router-link>
            </li>
            <li class="nav-item">
              <router-link to="/Things">Things</router-link>
            </li>
            </div>
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
