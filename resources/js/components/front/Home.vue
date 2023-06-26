<template>
    <div class="content">
        <div class="hero">
                <div class="row">
                        <div class="col-sm-12 col-md-8 mx-auto">
                             <div class="hero__content animate__animated animate__backInLeft
                         animate__delay-1s">
                              <h1 class="">
                                 IMMOBILIER BENIN
                              </h1>

                              <p class="text text-white fw-bold">
                                Annonces gratuites vente et location de biens immobiliers
                              </p>
                                  <a class="btn btn-primary" href="/ads">
                                      Voir les annonces
                                  </a>

                              </div>
                        </div>
                        </div>
                </div>
        <section class="section">
            <div class="container">


                <div class="app" >
                        <div class="app__content">
                            <h2 class="element" v-bind:class="{ 'visible animate__animated animate__fadeInUp': isElementVisible }">
                            Des centaines d'annonces gratuites
                            </h2>


                            <p class="text" v-bind:class="{ 'visible animate__animated animate__fadeInUp': isElementVisible }">
                            Postez gratuitement vos annonces immobilières sur notre site
                            </p>

                            <div class="app__content__items">
                                <div class="item box" v-bind:class="{ '': isItemVisible }">
                                    <div class="icon">
                                        <i class="fas fa-money-bill"></i>

                                    </div>

                                    <h3>
                                        Economisez votre argent
                                    </h3>

                                    <p class="text">
                                        Auncun frais d'annonces ou de tenue de compte
                                    </p>
                                </div>

                                <div class="item box" v-bind:class="{ '': isItemVisible }">
                                    <div class="icon">
                                        <i class="fas fa-thumbs-up"></i>
                                    </div>

                                    <h3>
                                        Choisissez le meilleur partenaire
                                    </h3>

                                    <p class="text">
                                      Comparez parmi toutes les annonces laquelle vous convient
                                    </p>
                                </div>

                                <div class="item box" v-bind:class="{ '': isItemVisible }">
                                    <div class="icon">
                                        <i class="fas fa-question"></i>
                                    </div>

                                    <h3>
                                        Une question ?
                                    </h3>

                                    <p class="text">
                                        Toutes vos questions et préoccupations sont les bienvenues, notre objectif est de vous aider.
                                    </p>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="grey" id='about'>
                        <div class="grey__content">
                            <div class="grey__content__image about" v-bind:class="{ 'animate__animated animate__fadeInLeft': isAboutVisible }">
                                <img src="https://images.unsplash.com/photo-1586941962765-d3896cc85ac8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80" alt="location immobiliere benin">
                            </div>

                            <div class="grey__content__text about " v-bind:class="{ 'animate__animated animate__fadeInRight': isAboutVisible }">
                                <h2>
                                    Qui sommes nous ?
                                </h2>

                                <p class="text">
                                    Bienvenue sur immobilierbenin, votre site d'annonces de vente et de location de biens immobiliers au Bénin. Nous offrons un service gratuit d'annonces de vente et de location de biens immobiliers pour tous les utilisateurs. Vous pouvez publier vos annonces en quelques clics seulement et les mettre à jour à tout moment ...
                                </p>

                                <a href="/about" class="btn btn-primary mx-auto">
                                    En savoir plus
                                </a>
                            </div>
                        </div>
                </div>


            </div>
        </section>
    </div>
</template>

<script>
export default {
    data(){
        return{
            details:[
                {id:1, title: 'Comment établir un budget ?', image: 'https://images.unsplash.com/photo-1676313573207-f86cee030705?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80', extract: "Établir un budget est essentiel pour gérer efficacement ses finances personnelles. Cela permet de mieux contrôler ses dépenses, d'économiser pour les objectifs ... "},
                {id:2, title: 'Optimisez votre demande de prêt', image: 'https://plus.unsplash.com/premium_photo-1661420275396-eeba3d449225?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80', extract: "Demander un prêt est souvent une étape importante dans la réalisation de projets personnels ou professionnels. Pour maximiser vos chances d'obtenir un prêt"},
                {id:3, title: 'Comprendre les finances', image: 'https://images.unsplash.com/photo-1444653614773-995cb1ef9efa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80', extract: 'Comprendre les bases des finances est essentiel pour prendre des décisions éclairées et gérer efficacement ses ressources financières. Dans cet article, nous allons explorer... '}
            ],
            showStep1: false,
            showStep2: false,
            showStep3: false,
            showStep4: false,
            showStep5: false,
            showStep6: false,
            amount: '',
            own_amount: '',
            duration: '',
            type: '',
            situation: '',
            type: '',
            location: '',
            job: '',
            salary: '',
            other_salary: '',
            birth_date: '',
            current_loan: '',
            past_dues: '',
            co_debter: '',
            name: '',
            email: '',
            phone: '',
            isElementVisible: false,
            isItemVisible: false,
            isAboutVisible: false,
            isScreenVisible: false,
            isBlogVisible: false,
            showMain: false,
            showResults: false,
            showLoader: false,
            loaderPercentage: 0,
            message: ""

        }
    },
        mounted: function(){
            this.displayStep1();
        },
        created() {
                window.addEventListener('scroll', this.handleScroll);
            },
            destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
      },
methods: {
    handleScroll() {
  if (this.showMain && !this.showLoader) {
   this.isElementVisible = document.querySelector('.element').getBoundingClientRect().top <= (window.innerHeight || document.documentElement.clientHeight) * 0.9;
    this.isItemVisible = document.querySelector('.item').getBoundingClientRect().top <= (window.innerHeight || document.documentElement.clientHeight) * 0.9;
    this.isAboutVisible = document.querySelector('.about').getBoundingClientRect().top <= (window.innerHeight || document.documentElement.clientHeight) * 0.9;
    this.isScreenVisible = document.querySelector('.screen').getBoundingClientRect().top <= (window.innerHeight || document.documentElement.clientHeight) * 0.9;
    this.isBlogVisible = document.querySelector('.blog').getBoundingClientRect().top <= (window.innerHeight || document.documentElement.clientHeight) * 0.9;
   }
},

        displayStep1(){
            this.showMain = true;
            this.showResults = false;
              this.showStep1 = false;
              this.showStep2 = false;
              this.showStep3 = false;
              this.showStep4 = true;
              this.showStep5 = false;
              this.showStep6 = false;
        },
        displayStep2(){
              this.showStep1 = false;
              this.showStep2 = false;
              this.showStep3 = false;
              this.showStep4 = false;
              this.showStep5 = false;
              this.showStep6 = false;
        },
        displayStep3(){
              this.showStep1 = false;
              this.showStep2 = false;
              this.showStep3 = true;
              this.showStep4 = false;
              this.showStep5 = false;
              this.showStep6 = false;
        },
        displayStep4(){
              this.showStep1 = false;
              this.showStep2 = false;
              this.showStep3 = false;
              this.showStep4 = true;
              this.showStep5 = false;
              this.showStep6 = false;
        },
        displayStep5(){
              this.showStep1 = false;
              this.showStep2 = false;
              this.showStep3 = false;
              this.showStep4 = false;
              this.showStep5 = true;
              this.showStep6 = false;
        },
        displayStep6(){
              this.showStep1 = false;
              this.showStep2 = false;
              this.showStep3 = false;
              this.showStep4 = false;
              this.showStep5 = false;
              this.showStep6 = true;
        },
        proceed() {
  this.showMain = false;
  this.loaderPercentage = 0;
  this.showLoader = true;

  setTimeout(() => {
    this.showLoader = false;
    this.showResults = true;
  this.loaderPercentage = 0;

  }, 7500);

  this.startLoader();
},
startLoader() {
  const interval = setInterval(() => {
    if (this.loaderPercentage < 100) {
      this.loaderPercentage += 10;
    } else {
      clearInterval(interval);
    }
  }, 500);
},
format(num) {
            let res = new Intl.NumberFormat('fr-FR', {
                maximumSignificantDigits: 3
            }).format(num);
            return res;
        },
viewArticle(id){
    window.location.replace('/article/'+id)
}


  }
}
</script>
