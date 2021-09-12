<template>
  <main>
    <navbar></navbar>
    <h1>Home page</h1>
    <h2>Bonjour {{ $auth.user[0].username }}</h2>
    <h2>Derniere connexion : {{ $auth.user[0].lastActive }}</h2>
    <NuxtLink to="/">Home page</NuxtLink>
    <section id="intro" class="container">
      <div class="row">
        <div class="col-12">
          <h1 class="text-center">Bienvenue sur Lamatch !</h1>
        </div>
      </div>
    </section>

    <div id="stats" class="container">
      <div class="row">
        <div class="col-12 stats-wrapper">
          <div class="row">
            <div class="col-3"></div>

            <div class="col-3">
              <div class="card stat">
                <p class="stat-figure">{{ companiesNumber }}</p>
                <p class="stat-text">
                  Employeurs
                </p>
              </div>
            </div>

            <div class="col-3">
              <div class="card stat">
                <p class="stat-figure color-blue1">{{ applicantsNumber }}</p>
                <p class="stat-text">
                  Candidats
                </p>
              </div>
            </div>

            <div class="col-3"></div>
          </div>

          <div class="row">
            <div class="col-3"></div>

            <div class="col-3">
              <div class="card stat">
                <p class="stat-figure color-danger">{{ averageYear }} ans</p>
                <p class="stat-text">
                  Age moyen des demandeurs d'emploi 🎉
                </p>
              </div>
            </div>

            <div class="col-3">
              <div class="card stat">
                <p class="stat-figure color-success">Regions les plus recherchés par les candidats : </p>
<!--                DONT WORK AND I DONT KNOW WHY-->
<!--                <ul v-for="region in this.regions['regionsByApplicants']">-->
<!--                  <li>{{ region.region }}</li>-->
<!--                </span>-->
<!--                <span v-for="region in this.regions['regionsByCompanies']">-->
<!--                  <li>{{ region.region }}</li>-->
<!--                </span>-->
                <p class="stat-text">
                </p>
              </div>
            </div>

            <div class="col-3"></div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import axios from "axios";

export default {
  middleware: 'auth',
  data(){
    return {
      applicantsNumber: null,
      companiesNumber: null,
      averageYear: null,
      regions: null,
      email: '',
      password: '',
      message: null,
    }
  },
  mounted() {
    axios.get('http://lamatch.fr/api/applicants').then(response => this.applicantsNumber = response.data['hydra:totalItems'])
      .catch(function (error) {
        if (error.response) {
          alert(error.response);
        }
      });
    axios.get('http://lamatch.fr/api/companies').then(response => this.companiesNumber = response.data['hydra:totalItems'])
      .catch(function (error) {
        if (error.response) {
          alert(error.response);
        }
      });
    axios.post('http://lamatch.fr/api/get-average-age', {'token' : process.env.secret}).then(response => this.averageYear = response.data.averageYear)
      .catch(function (error) {
        if (error.response) {
          alert(error.response);
        }
      });
    axios.post('http://lamatch.fr/api/get-most-sought-regions', {'token' : process.env.secret})
      .then(response => this.regions = response.data.regions)
      .catch(function (error) {
        if (error.response) {
          alert(error.response);
        }
      });
  }

}
</script>
<style>
  #page-home #stats .stat {
    text-align: center;
  }

  #page-home #stats .stat .stat-figure {
    font-size: 4rem;
    font-weight: bold;
  }

  #page-home #stats .stat .stat-text {
    font-size: 2rem;
  }
</style>
