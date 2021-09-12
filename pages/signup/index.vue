<template>
  <main>
    <navbar></navbar>
    <h1 class="text-center text-danger mt-4">Se créer un compte à Lamatch 🐱‍🏍</h1>
    <div v-if="message">{{ message }}</div>
    <form class="container p-5" method="post" @submit.prevent="register">
      <div class="form-group">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Nom d'utilisateur..." required v-model="username">
        <small>Cet nom d'utilisateur doit être unique</small>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required v-model="email">
        <small>Cet email doit être unique</small>
      </div>
      <div class="form-group">
        <label for="password">Mot de passe</label>
        <div class="d-flex">
          <input :type="passwordFieldType" class="form-control" id="password" name="password" placeholder="Mot de passe..." required v-model="password">
          <button type="button" @click="switchVisibility" id="eyes" class="border-0 abo">👀</button>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Je veux créer mon compte</button>
    </form>
    <customFooter></customFooter>
  </main>
</template>

<script>
import axios from 'axios'
export default {
  data(){
    return {
      username: '',
      email: '',
      password: '',
      message: null,
      passwordFieldType: 'password'
    }
  },
  methods: {
    async register(){
      let self = this;
      try {
        axios.post('http://lamatch.fr/api/signup', {
          'username': this.username, 'password': this.password, 'email': this.email, 'token' : process.env.secret
        }).then(function(response){
          alert(response.data.message)
          self.$router.push('/login')
        }).catch(function (error) {
          if (error.response) {
            alert(error.response.data.message);
          }
        });
      } catch (e){
        console.log(e)
      }
    },
    switchVisibility(){
      this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
    }
  }
}
</script>
<style>
#eyes{
  position: absolute;
  margin-left: 1000px;
  margin-top: 6px;
}
</style>
