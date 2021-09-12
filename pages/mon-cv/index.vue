<template>
  <main>
    <navbar></navbar>

    <div v-if="$auth.user[0].applicant">
      <div class="container">
        <h1>Détail Candidat {{ $auth.user[1].id }}</h1>
      </div>

      <section id="intro" class="container">
        <div class="row">
          <div class="col-5 photo">
            <div class="img-wrapper card p-0">
              <img :src="srcPictureProfil" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-7 candidate-infos d-flex align-items-center">
            <ul>
              <li class="name">
                😎 {{ $auth.user[1].firstname }} {{ $auth.user[1].lastname }}
              </li>

              <li class="status" v-if="$auth.user[1].lookingFor">
                ✔ En recherche d'emploi
              </li>
              <li class="status" v-else>
                ❌ N'est plus en recherche
              </li>

              <li class="age">
                👶 {{ $auth.user[1].birthday }}
              </li>

              <li class="level-of-study">
                🎓 {{ $auth.user[1].educationLevel }}
              </li>

              <li class="linkedin">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                  <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                </svg>

                <a :href="linkedin" target="_blank">
                  Profil LinkedIn
                </a>
              </li>

              <li class="email">
                📧
                <a href="mailto:jean-eudes@gmail.com">
                  {{ $auth.user[1].email }}
                </a>
              </li>

              <li class="regions-targeted">
                🚩 Ou je cherche du travail :
                <span v-for="region in $auth.user[5]">
                  {{ region.region }},
                </span>
              </li>

              <li class="skills">
                💪 Compétences :
                <ul>
                  <li v-for="skill in $auth.user[2]">
                    <span >{{skill.name}} ({{skill.category}}) - niveau {{skill.level}}</span>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </section>

      <section id="studies" class="container">
        <div class="row">
          <div class="col-12 mb-5">
            <h2 class="section-title">Formations</h2>
          </div>
        </div>

        <div class="row" v-for="formation in $auth.user[3]">
          <div class="col-12 card study">
            <p class="card-title">
              {{ formation.schoolName }} - {{ formation.formationTitle }}
            </p>

            <div class="study-infos infos-inline">
              <span class="date">📅 {{ formation.startDate }} - {{ formation.endDate }}</span>
              <span class="level">👨‍🎓 Bac + 2</span>
              <span class="city">🚩 {{ formation.location }} (44) - {{ formation.country }}</span>
            </div>

            <p class="description mt-5">
              Une licence qui m'a permis de voir plein de choses intéressantes en droit des sociétés oulala
            </p>
          </div>
        </div>
      </section>

      <section id="experiences" class="container">
        <div class="row">
          <div class="col-12 mb-5">
            <h2 class="section-title">Expériences professionnelles</h2>
          </div>
        </div>

        <div class="row" v-for="proExperience in $auth.user[4]">
          <div class="col-12 card study">
            <p class="card-title">
              {{ proExperience.title }}
            </p>

            <div class="experience-infos infos-inline">
              <span class="date">📅 {{ proExperience.startDate }} - {{ proExperience.endDate }}</span>
              <span class="contract-type">📝 {{ proExperience.contractType }}</span>
              <span class="city">🚩 {{ proExperience.location }} (44) - {{ proExperience.country }}</span>
              <span class="company">🏢 {{ proExperience.company }}</span>
            </div>

            <p class="description mt-5">
              {{ proExperience.description }} ❤
            </p>
          </div>
        </div>
      </section>

      <section id="contact" class="container">
        <div class="row">
          <div class="col-12 d-flex justify-content-center">
            <a href="mailto:jean-eudes@gmail.com" class="button">
              📧 Contacter Jean-Eudes
            </a>
          </div>
        </div>
      </section>
    </div>
    <div v-else class="container">
      <h1 class="text-center mt-4">Ajouter mon cv</h1>
    </div>

  </main>
</template>

<script>

export default {
  name: "index",
  data() {
    return {
      srcPictureProfil : this.$auth.user[1].profilPicture,
      linkedin : this.$auth.user[1].linkedin,
    }
  },
}
</script>

<style scoped>

</style>
