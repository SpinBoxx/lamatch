<template>
  <div>
    <nav class="navbar navbar-inverse bg-dark">
      <div class="container-fluid">
        <div class="navbar-header">
          <NuxtLink class="navbar-brand text-white" to="/">🚀 Lamatch</NuxtLink>
          <NuxtLink v-if="$auth.loggedIn" class="navbar-brand text-white ml-3" to="/matching">⚡ Matching !</NuxtLink>
        </div>
        <ul class="nav text-center">
          <div v-if="$auth.loggedIn" class="d-flex gap-50">
            <li><NuxtLink to="/mon-cv" class="text-white">Mon CV</NuxtLink></li>
            <li><NuxtLink to="/mon-entreprise" class="text-white">Mon entreprise</NuxtLink></li>
          </div>
        </ul>
        <ul class="nav navbar-right">
          <div v-if="$auth.loggedIn" class="d-flex gap-50">
            <li><NuxtLink to="/profil" class="text-white btn">Mon profil</NuxtLink></li>
            <li><button @click="logout" class="text-white btn btn-secondary">Se déconnecter</button></li>
          </div>
          <div v-else class="d-flex gap-50">
            <li><NuxtLink to="/login" class="text-white btn btn-secondary">Se connecter</NuxtLink></li>
            <li><NuxtLink to="/signup" class="text-white btn">Créer un compte</NuxtLink></li>
          </div>
        </ul>
      </div>
    </nav>
  </div>
</template>

<script>
export default {
  name: "navbar.vue",
  methods: {
     async logout(){
        await this.$auth.logout();
       await this.$router.push('/login')
    }
  }
}
</script>

<style scoped>
  .gap-50{
    gap: 50px;
  }
</style>
