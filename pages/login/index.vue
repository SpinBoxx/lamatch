<template>
  <main>
    <navbar></navbar>
    <h1 class="text-center text-danger mt-4">Se connecter à Lamatch 🔥</h1>
    <form class="container p-5" @submit.prevent="userLogin">
      <div class="form-group">
        <label for="username">Nom d'utilisteur</label>
        <input type="text" class="form-control" id="username" v-model="login.username" placeholder="Nom d'utilisteur..." required>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <div class="d-flex">
          <input :type="passwordFieldType" class="form-control" id="password" v-model="login.password" placeholder="Mot de passe..." required>
          <button type="button" @click="switchVisibility" id="eyes" class="border-0 abo">👀</button>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>
    <customFooter></customFooter>
  </main>
</template>

<script>
export default {
  data() {
    return {
      login: {
        username: '',
        password: '',
      },
      passwordFieldType: 'password'
    }
  },
  methods: {
    async userLogin() {
      let self = this;
      try {
        this.$auth.loginWith('local', {
          data: {
            username: this.login.username,
            password: this.login.password,
            'token' : process.env.secret
          },
        }).then(function(response){
          alert(response.data.message)
          self.$router.push('/')
        }).catch(function (error) {
          if (error.response) {
            alert(error.response.data.message);
          }
        });
      } catch (err) {
        console.log(err)
      }
    },
    switchVisibility(){
      this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
    }
  }
}
</script>
