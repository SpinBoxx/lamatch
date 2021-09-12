<template>
  <main>
    <navbar></navbar>
    <div class="container">
      <div class="row">
        <div class="col-6">
          <h1>Matching</h1>
        </div>

        <div class="col-6 d-flex justify-content-end">
          <div class="launch-wrapper">
            <button class="button success launch btn btn-primary" @click="launchMatching">Lancer un nouveau Matching 🚀</button>
          </div>
        </div>
      </div>
    </div>

    <section id="intro" class="container">
      <div class="row">
        <div class="col-12">
          <p>Voici les employeurs qui correspondent à votre profil (d'après notre algorithme ultra sophistiqué 🧐) :</p>
          <p>Le pourcentage affiché correspond au taux de correspondance calculé entre votre profil et l'employeur.</p>
        </div>
      </div>
    </section>

    <section id="companies" class="container" >
      <div class="row" v-for="company in companies">
        <div class="col-12">
          <div class="card company p-0">
            <div class="row">
              <div class="col-2">
                <div class="image-wrapper">
                  <img :src="company.logo" alt="">
                </div>
              </div>

              <div class="col-7 company-infos-wrapper">
                <h3 class="card-title">
                  {{ company.name }}
                </h3>

                <div class="company-infos">
                  <ul>
                    <li class="workforce">
                      👨‍👩‍👧‍👦 1 à {{ company.headcount }} salariés
                    </li>

                    <li class="domain">
                      💼 {{ company.businessArea }}
                    </li>

                    <li class="regions-targeted">
                      🚩 Les regions recherchées :
                      <span v-for="region in company.soughtRegions">
                        {{ region.region }},
                      </span>
                    </li>
                  </ul>
                </div>

              </div>

              <div class="col-2 d-flex justify-content-center align-items-center">
                <div class="score-wrapper">
                  <div class="circle-progress p90">
                                        <span class="progress-left">
                                            <span class="progress-bar"></span>
                                        </span>
                    <span class="progress-right">
                                            <span class="progress-bar"></span>
                                        </span>
                    <div class="progress-value">{{ company.matchingPercentage }}%</div>
                  </div>
                </div>
              </div>

              <div class="col-1 show-company-wrapper">
                <a href="company.html" class="button show-company" title="Me rendre sur la fiche de l'employeur">
                  >
                </a>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-12 text-center show-more-wrapper">
          <a href="" class="button success" title="Charger plus d'employeurs">En voir plus +</a>
        </div>
      </div>
    </section>

  </main>

</template>

<script>
import axios from "axios";

export default {
  name: "index",
  data(){
    return {
      companies: '',
      logoCompany: '',
    }
  },
  methods: {
    async launchMatching(){
      let res = await axios.post('http://lamatch.fr/api/matching', {
        'token' : process.env.secret, 'id': this.$auth.user[0].id
      });
      alert(res.data.message);
      this.companies = res.data.companies;
      console.log(this.companies)
    }
  }
}
</script>

<style scoped>
#companies .company {
  max-height: 20rem;
}

#companies .company .image-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  padding: 1rem;
}

#companies .company .image-wrapper img {
  max-width: 100%;
  max-height: 12rem;
}

#companies .company .company-infos-wrapper {
  padding: 2rem 0;
}

.company .company-infos-wrapper .company-infos ul {
  list-style-type: none;
  padding: 0;
}
#companies .company .company-infos-wrapper .company-infos ul li {
  margin-bottom: 1rem;
}

#companies .company .show-company-wrapper {
  display: flex;
  align-items: center;
  padding-right: 2rem;
}

.show-more-wrapper {
  margin-top: 8rem;
}

</style>
