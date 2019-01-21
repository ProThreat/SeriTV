<template>
    <div class="loginPage">

        <div class="background" :style="{ backgroundImage: 'url('+bgImage+')' }">
            <div class="container">
                <img :src="logoImage" class="img-fluid" width="60px">
                <div class="loginCard">
                    <h1>Create account</h1>
                    <form method="post" @submit="create">
                        <label :class="{ 'error': validationErrors && validationErrors.name }">
                            <input name="loginUsername" class="form-control" placeholder="Username" v-model="loginUsername" required>
                            <div class="errors" v-if="validationErrors && validationErrors.name">
                                <b-alert variant="danger" dismissible v-for="(error, index) in validationErrors.name" :key="index" show>{{ error }}</b-alert>
                            </div>
                        </label>

                        <label :class="{ 'error': validationErrors && validationErrors.email }">
                            <input name="loginEmail" class="form-control" placeholder="Email" v-model="loginEmail" required>
                            <div class="errors" v-if="validationErrors && validationErrors.email">
                                <b-alert variant="danger" dismissible v-for="(error, index) in validationErrors.email" :key="index" show>{{ error }}</b-alert>
                            </div>
                        </label>

                        <label :class="{ 'error': validationErrors && validationErrors.password }">
                            <input name="loginPassword" class="form-control" type="password" placeholder="Password" v-model="loginPassword" required>
                        </label>

                        <label :class="{ 'error': validationErrors && validationErrors.password }">
                            <input name="loginPasswordRepeat" class="form-control" type="password" placeholder="Repeat password" v-model="loginPasswordRepeat" required>
                            <div class="errors" v-if="validationErrors && validationErrors.password">
                                <b-alert variant="danger" dismissible v-for="(error, index) in validationErrors.password" :key="index" show>{{ error }}</b-alert>
                            </div>
                        </label>
                        <button class="btn" type="submit">Create account</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</template>

<script>

export default {

  data () {
    return {
      logoImage: require('@/assets/img/logo-test.png'),
      bgImage: require('@/assets/img/camcorder.jpg'),
      loginUsername: null,
      loginEmail: null,
      loginPassword: null,
      loginPasswordRepeat: null,
      validationErrors: null
    }
  },

  methods: {
    create (event) {
      event.preventDefault()
      this.$http.post('http://localhost:3000/api/register', {
        name: this.loginUsername,
        email: this.loginEmail,
        password: this.loginPassword,
        password_confirmation: this.loginPasswordRepeat
      })
        .then(response => {
          if (response.data.success) {
            // Save user in localStorage
            localStorage.setItem('user', JSON.stringify(response.data.user))

            // Redirect user
            this.$router.push('/')
          }
        })
        .catch(error => {
          console.error('test', error.response.data.errors)
          this.validationErrors = error.response.data.errors
        })
    }
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style lang="scss" scoped>

.loginPage { min-height: 100vh; width: 100%; display: flex;
    .background { position: relative; width: 100%; height: 100%; background-size: cover; background-position: center; z-index: 1;
        .container { height: 100%; display: flex; flex-direction: column; justify-content: center; align-items: center; }
        &:before { content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(0,0,0,0.7); z-index: -1; }
        .loginCard { background: white; border-radius: 3px; padding: 30px 50px; min-width: 450px; margin: 30px 0;
            h1 { color: #22a7f0; text-transform: uppercase; text-align: center; font-weight: bold; margin-bottom: 20px; }
            label { display: block; max-width: 75%; margin: 0 auto 15px;
                input { background-color: #e5e8ed; border: 0px solid; box-shadow: 0 2px 3px rgba(0,0,0,0.10); margin-bottom: 15px; }
            }
            button { display: block; background-color: none; margin: 15px auto 0 auto; text-align: center; }
        }
    }
}

</style>

<style lang="scss">
    nav, .navbar { display: none !important; }
</style>
