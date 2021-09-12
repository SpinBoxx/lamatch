<template>
  <main>
    <navbar></navbar>
    <div class="container">
      <h1 class="text-center mt-4">Mon profil</h1>
      <form class="container p-5" method="post" @submit.prevent="updateEmailAndPassword">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Email..." required v-model="email">
          <small>Cet email doit être unique</small>
        </div>
        <div class="form-group">
          <label for="oldPassword">Ancien mot de passe</label>
          <input type="password" class="form-control" id="oldPassword" name="oldPassword" placeholder="Ancien mot de passe..." v-model="oldPassword">
        </div>
        <div class="form-group">
          <label for="newPassword">Nouveau mot de passe</label>
          <div class="d-flex">
            <input :type="passwordFieldType" class="form-control" id="newPassword" name="newPassword" placeholder="Nouveau mot de passe..."
                   v-model="newPassword">
            <button type="button" @click="switchVisibility" id="eyes" class="border-0 abo">👀</button>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Changer ses informations</button>
      </form>
    </div>
    <customFooter></customFooter>
  </main>
</template>

<script>
import axios from "axios";

export default {
  middleware: 'auth',
  data() {
    return {
      passwordFieldType: 'password',
      email: this.$auth.user[0].email,
      oldPassword: '',
      newPassword: ''
    }
  },
  methods: {
    switchVisibility(){
      this.passwordFieldType = this.passwordFieldType === "password" ? "text" : "password";
    },
    async updateEmailAndPassword(){
      try {
        axios.post('http://lamatch.fr/api/user/update-informations', {
          'email': this.email, 'oldPassword': this.oldPassword, 'newPassword': this.newPassword, 'token' : process.env.secret, 'id': this.$auth.user[0].id
        }).then(function(response){
          console.log(response)
          alert(response.data.message)
        }).catch(function (error) {
          if (error.response) {
            alert(error.response.data.message);
          }
        });
      } catch (e){
        console.log(e)
      }
    },
  }
}
</script>

<style>
#eyes{
  position: absolute;
  margin-left: 970px;
  margin-top: 6px;
}
</style>
