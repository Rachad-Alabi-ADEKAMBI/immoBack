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
                            <h2 class="element subtitle" v-bind:class=" { 'visible animate__animated animate__fadeInUp': isElementVisible }">
                            Annonces gratuites
                            </h2>


                            <p class="text" v-bind:class="{ 'visible animate__animated animate__fadeInUp': isElementVisible } ">
                            Postez gratuitement vos annonces immobilières sur notre site
                            </p>

                            <div class="app__content__items">
                                <div class="item box" v-bind:class="{ '': isItemVisible }">
                                    <div class="icon">
                                        <i class="fas fa-money-bill"></i>

                                    </div>

                                    <h3 class="text text-center">
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

                                    <h3 class="text text-center">
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

                                    <h3 class="text text-center">
                                        Posez nous vos questions
                                    </h3>

                                    <p class="text">
                                        Toutes vos questions et préoccupations sont les bienvenues.
                                    </p>
                                </div>
                            </div>
                        </div>
                </div>

                <div class="grey" id='about'>
                        <div class="grey__content">
                            <div class="grey__content__image about" v-bind:class="{ 'animate__animated animate__fadeInLeft': isAboutVisible }">
                                <img src="img/home1.jpeg" alt="location immobiliere benin">

                            </div>

                            <div class="grey__content__text about " v-bind:class="{ 'animate__animated animate__fadeInRight': isAboutVisible }">
                                <h2 class="subtitle">
                                    Qui sommes nous ?
                                </h2>

                                <p class="text">
                                    Bienvenue sur immobilierbenin, votre site d'annonces de vente et de location de biens
                                     immobiliers au Bénin. Nous offrons un service gratuit d'annonces de vente et de location
                                     de biens immobiliers pour tous les utilisateurs. Vous pouvez publier vos annonces en quelques
                                      clics seulement et les mettre à jour à tout moment ...
                                </p>

                                <a href="/about" class="btn btn-primary mx-auto">
                                    En savoir plus
                                </a>
                            </div>
                        </div>
                </div>

                <hr>
                <div class="ads mt-5">
                    <h2 class="subtitle">
                                Dernières annonces
                                </h2>

                    <div class="row">
                        <div class="col-sm-12 col-md-10 mx-auto box card mb-4 bg-light p-2" v-for="detail in ads"
                         :key="detail.id" v-if="details.length > 0">
                                <div class="box__img mt-2">
                                    <img :src='getImgUrl(detail.pic1)'>
                                    <p class="text text-grey"><span><i class="bi bi-tag"></i>Action:</span> {{ detail.action }}</p>
                                </div>

                                <div class="box__infos" >
                                    <h3>
                                    {{ detail.name }}
                                    </h3>

                                    <span>
                                        <p class="text-grey">
                                            <i class="bi bi-geo-alt"></i>
                                            {{ detail.location }}, {{ detail.area }}
                                        </p>
                                            </span><br>

                                    <strong class="price">
                                        {{  format(detail.price) }} XOF
                                    </strong>

                                    <div class="icons" v-if="detail.type === 'Maison' || detail.type === 'Appartement'">
                                        <div class="icon ">
                                            <i class="fas fa-bed"></i>
                                            Chambres: {{ detail.rooms }}
                                        </div>

                                        <div class="icon">
                                            <i class="fas fa-shower"></i>
                                            Douches: {{ detail.bathrooms }}
                                        </div>

                                        <div class="icon">
                                            <i class="bi-egg-fried"></i>
                                            Cuisines: {{ detail.kitchens }}
                                        </div>

                                        <div class="icon">
                                            <i class="bi bi-tv"></i>
                                            Salons: {{detail.living_rooms  }}
                                        </div>

                                        <div class="icon">
                                            <i class="fas fa-warehouse"></i>
                                            Magasins: {{detail.living_rooms  }}
                                        </div>
                                    </div>

                                    <div class="icons" v-if="detail.type === 'Terrain' || detail.type === 'Magasin'">
                                        <div class="icon">
                                            <i class="fas fa-layer-group"></i>
                                        Superficie: {{ format(detail.size)  }} m²
                                        </div>
                                    </div>

                                    <div class="icons" v-if="detail.type === 'Bureau'">
                                        <div class="icon">
                                            <i class="fas fa-layer-group"></i>
                                        Bureaux: {{ format(detail.offices)  }}
                                        </div>
                                    </div>

                                        <a v-bind:href="'/ad/'+ detail.id" class="btn btn-primary">
                                            Voir
                                        </a>
                                </div>
                        </div>
                    </div>

                </div>
                <hr>

                <div class="images">
                    <div class="row">
                        <div class="col-sm-12 col-md-4 p-2">
                            <img src="img/home7.jpeg"
                             alt="louer appartement au Bénin" class="img-fluid">
                        </div>

                        <div class="col-sm-12 col-md-4 p-2">
                            <img src="img/home4.jpeg"
                             alt="louer appartement au Bénin" class="img-fluid">
                        </div>

                        <div class="col-sm-12 col-md-4 p-2">
                            <img src="img/home6.jpg"
                             alt="louer appartement au Bénin" class="img-fluid">
                        </div>
                    </div>
                </div>


                <div class="faq" id='faq'>
                    <div class="faq__content">
                        <h2 class="subtitle">
                            FAQ
                        </h2>

                        <div class="faq__content__drops">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">Comment puis-je publier une annonce immobilière sur votre site ?
                                            <b class="btn btn-hidden" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="false" aria-controls="collapseOne">
                                                V
                                            </b>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text text-grey">
                                                Pour publier une annonce immobilière, vous devez créer un compte sur notre site,
                                            puis accéder à la section "Publier une annonce"
                                            où vous pourrez saisir les détails de votre bien immobilier, ajouter des photos et publier votre annonce.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            Est-ce que la publication d'une annonce est payante ?

                                            <b class="btn btn-hidden" data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                V
                                            </b>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text text-grey">
                                                Non, notre site propose un service d'annonces immobilières gratuites.
                                                Vous pouvez publier votre annonce et la mettre à jour sans aucun frais.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            Comment puis-je contacter un vendeur ?
                                            <b class="btn btn-hidden" data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseTwo">
                                                V
                                            </b>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text text-grey">
                                                Sur chaque annonce, vous trouverez les informations de contact du vendeur. Vous pouvez utiliser le
                                                formulaire de contact ou les coordonnées fournies
                                                pour entrer en communication directe avec le vendeur et discuter des détails de l'annonce.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header" id="headingFour">
                                        <h5 class="mb-0">
                                            Comment puis-je signaler une annonce suspecte ou frauduleuse ?

                                            <b class="btn btn-hidden" data-toggle="collapse" data-target="#collapseFour"
                                                aria-expanded="false" aria-controls="collapseFour">
                                                V
                                            </b>
                                        </h5>
                                    </div>
                                    <div id="collapseFour" class="collapse" aria-labelledby="collapseFour"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <p class="text text-grey">
                                                Si vous trouvez une annonce suspecte ou frauduleuse, nous vous encourageons à utiliser le lien
                                                "Signaler cette annonce" qui se trouve sur chaque annonce.
                                                Nous examinerons rapidement votre signalement et prendrons les mesures nécessaires.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="updates" id='blog'>
                    <div class="updates__content">
                        <h2 class="subtitle">
                            Articles de blog
                        </h2>

                        <p class="text text-grey">
                            lisez nos articles pour en savoir un peu plus sur l'immobilier au Bénin
                        </p>

                        <div class="updates__content__articles">
                            <div class="article blog" v-for="detail in details"
                            :key="detail.id" v-bind:class="{ 'animate__animated animate__fadeInLeft': isBlogVisible }">

                                <img :src="detail.image" />

                                <h4 class="text text-center mt-2">
                                    {{detail.title}}
                                </h4>

                                <p class="text text-left">
                                {{ detail.extract }}
                                </p>

                                <button class="btn btn-primary" @click="viewArticle(detail.id)">
                                    Lire article
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="contact" id="contact">
                    <div class="contact__content row">
                        <div class="contact__content__form col-sm-12 col-md-6">
                            <form class="form" method='POST' action=''>
                                <div class="form-group">
                                    <label for="inputAddress">Email: </label> <span class="red">*</span>
                                    <input type="Email" class="form-control" id="inputAddress" placeholder=""
                                        name='email' >
                                </div>

                                <div class="form-group">
                                    <label for="inputAddress">Nom complet: </label> <span class="red">*</span>
                                    <input type="text" class="form-control" id="inputAddress" placeholder=""
                                        name='full name' >
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Message: </label> <span class="red">*</span>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3 "></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">
                                        <input type="checkbox" > Oui, j'accepte que vous gardiez ces informations pour me
                                        recontacter <span class="red">*</span>
                                    </label>
                                </div>

                                <button class="btn btn-primary">Envoyer</button>
                            </form>
                        </div>

                        <div class="contact__content__infos col-sm-12 col-md-6">
                            <h2 class="subtitle">
                                Informations de contact
                            </h2> <br>

                            <p class="text text-purple fw-bold">
                                <i class="fas fa-envelope"></i>
                                contact@immobilierbenin.com <br>
                                <i class="fab fa-whatsapp"></i>
                            +229 41 59 76 42
                            </p><br>

                            <p class="text text-grey">
                                Si vous avez une question ou une préoccupation,
                                n'hésitez pas, écrivez nous, nous vous répondrons.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {

 name: 'Ads',
 props: {
   img_url: String
 },
    data(){
        return{
            details:[
                {id:1, title: 'Conseils pratiques pour acheter votre première maison au Bénin',
                image: 'https://images.unsplash.com/photo-1549918004-678df400b5fb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80', extract: "L'achat d'une première maison est une étape majeure dans la vie de nombreux Béninois. Pour garantir que cette expérience soit  ... "},
                {id:2, title: "Investir dans l'immobilier locatif au Bénin : avantages et considérations",
                image: 'https://plus.unsplash.com/premium_photo-1680792417458-86f150769d54?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                extract: "Investir dans l'immobilier locatif est une stratégie d'investissement populaire qui offre de nombreux avantages ..."},
                {id:3, title: `Les documents nécessaires pour finaliser l'achat d'une maison`,
                 image: 'https://images.unsplash.com/photo-1583521214690-73421a1829a9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80',
                 extract: `Finaliser l'achat d'une maison implique la préparation et la présentation de divers documents techniques...`}
            ],
            isElementVisible: false,
            isItemVisible: false,
            isAboutVisible: false,
            isScreenVisible: false,
            isBlogVisible: false,
            showMain: false,
            showResults: false,
            showLoader: false,
            loaderPercentage: 0,
            message: "",
            ads: []

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
              axios.get('/lastAvailableAdsApi').then(
              response =>
              this.ads = response.data);
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
getImgUrl(pic) {
  return this.img_url + "/img/ads/" + pic;
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


<style>
</style>