<template>
    <div class="content">
  <section class='section bg-light'>
     <div class="container pt-3">

          <div class="row mx-auto">
              <Tags class="col-sm-12 col-md-3">
                <div class="">
                     <div class="tags ">
                     <div class="tags__heading text-center">
                         <p class="span">
                             <i class="fas fa-list"></i> Type de biens
                         </p>
                     </div>

                     <div class="tags__body  text-center">
                         <div class="tag" @click="getByCategory('Appartement')" >
                                 <i class="bi bi-building"></i>  Appartements
                         </div>

                         <div class="tag" @click="getByCategory('Boutique')" >
                            <i class="fas fa-store"></i> Boutiques
                         </div>


                          <div class="tag" @click="getByCategory('Bureau')" >
                                  <i class="fas fa-building"></i>  Bureaux
                         </div>

                         <div class="tag" @click="getByCategory('Maison')" >
                            <i class="fas fa-house"></i> Maisons
                         </div>


                         <div class="tag"  @click="getByCategory('Terrain')" >
                                 <i class="bi bi-signpost"></i> Terrains
                         </div>
                     </div>

                     <div class="tags__btn">
                        <i class="bi bi-caret-down" onclick='showTag1'></i>
                     </div>
     </div>

     <br>

     <div class="tags ">
         <div class="tags__heading text-center">
                         <p class="span">
                             <i class="bi bi-geo-alt"></i> Localités
                         </p>
                     </div>

                     <div class="tags__body text-center">

                        <div class="tag" @click="getByLocation('Bohicon')" >
                                 <i class="bi bi-arrow-right"></i>Bohicon
                         </div>
                         <div class="tag" @click="getByLocation('Calavi')" >
                                 <i class="bi bi-arrow-right"></i> Calavi
                         </div>
                         <div class="tag" @click="getByLocation('Cotonou')" >
                                 <i class="bi bi-arrow-right"></i> Cotonou
                         </div>
                         <div class="tag">
                             <router-link to="/location?location=Porto-Novo" >
                                 <i class="bi bi-arrow-right"></i> Porto-Novo
                              </router-link>
                         </div>
                         <div class="tag">
                             <router-link to="/location?location=Parakou" >
                                 <i class="bi bi-arrow-right"></i> Parakou
                              </router-link>
                         </div>

                     </div>
     </div>
    </div>
              </Tags>

              <div class="col-sm-12 col-md-9">
                  <div class="list">
                    <!--show filters-->
                    <div class="container mb-4">
                        <div class='options mx-auto text text-center pt-3 ' v-if="showFilters">

                            <input type="range" v-model="rangeValue" min="0"
                            max="2000000" class="buttons__item"   @click="getRange()">

                                <div class="buttons__item">
                                    <button class="btn btn-primary m-1"  @click='getAds()'>
                                        Tout voir
                                    </button>
                                    <button @click='getToSell()' class="btn btn-primary m-1">
                                        A vendre
                                    </button>

                                    <button @click='getToRent()' class="btn btn-primary m-1 ">
                                        A louer
                                    </button>
                                </div>

                            <div class="buttons__item">
                                <i class="bi bi-search search-icon" @click="displaySearch()"></i>
                            </div>
                        </div>

                        <div class="mx-auto  text-center search-field pt-3" v-if="showSearch">
                                <input type="text" placeholder="Ecrivez quelque chose..."
                                 v-model="searchText" @click="getByName()">
                            <i class="bi bi-x ml-1" @click="getAds()"></i>
                        </div>
                    </div>
                    <!--end filters-->

                    <!--show all ads-->
                      <div class="container" v-if="showAds">
                          <div class="row">
                              <div class="list__heading text-center mb-3">
                                <h2 class='span text-center subtitle'>
                                      Toutes les annonces <span>({{ details.length }})</span>
                                  </h2>
                              </div>

                              <div class="list__body mt-1">
                                <div class="col-sm-12 col-md-10 box card mt-3 mb-4" v-for="detail in details" :key="detail.id" v-if="details.length > 0">
                                  <div class="box__img">
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

                              <div class="col-12" v-if="details.length == 0">
                                <p class="text text-center">
                                    Aucune annonce à afficher
                                </p>
                              </div>
                              </div>



                          </div>

                      </div>
                    <!--end show ads-->

                      <!--show to rent -->
                      <div class="container" v-if="showToRent">
                          <div class="row">
                              <div class="list__heading">
                                  <h2 class='span text-center subtitle'>
                                      Annonces de location <span>({{ details.length }})</span>
                                  </h2>
                              </div>

                              <div class="col-12 box card mb-4" v-for="detail in details" :key="detail.id" v-if="details.length > 0">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Action:</span> {{ detail.action }}</p>
                                  </div>

                                  <div class="box__infos" >
                                      <h2>
                                      {{ detail.name }}
                                      </h2>

                                      <span>
                                          <p class="text-grey">
                                              <i class="bi bi-geo-alt"></i>
                                              {{ detail.location }}, {{ detail.area }}
                                          </p>
                                              </span><br>

                                      <strong class="price">
                                          {{  format(detail.price) }} XOF
                                      </strong>

                                      <div class="icons" v-if="detail.action !== 'Terrain'">
                                          <div class="icon ">
                                              <i class="fas fa-bed"></i>
                                              {{ detail.rooms }} chambres
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-shower"></i>
                                              {{ detail.bathrooms }} douches
                                          </div>

                                          <div class="icon">
                                              <i class="bi-egg-fried"></i>
                                              {{ detail.kitchens }} cuisine
                                          </div>

                                          <div class="icon">
                                              <i class="bi bi-tv"></i>
                                              {{detail.living_rooms  }} salons
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-warehouse"></i>
                                              {{detail.living_rooms  }} magasins
                                          </div>
                                      </div>

                                      <div class="icons" v-if="detail.action === 'Terrain'">
                                        <div class="icon">
                                            <i class="fas fa-layer-group"></i>
                                            {{detail.size  }} m²
                                        </div>
                                      </div>

                                          <a v-bind:href="'/ad/'+ detail.id" class="btn btn-primary">
                                              Voir
                                          </a>
                                  </div>
                              </div>

                              <div class="col-12" v-if="details.length == 0">
                                <p class="text text-center">
                                    Aucune annonce à afficher
                                </p>
                              </div>

                          </div>

                      </div>
                    <!--end to rent-->

                      <!--show to sell -->
                      <div class="container" v-if="showToSell">
                          <div class="row">
                              <div class="list__heading">
                                  <h2 class='span text-center subtitle'>
                                      Annonces de vente <span>({{ details.length }})</span>
                                  </h2>
                              </div>

                              <div class="col-12 box card mb-4" v-for="detail in details" :key="detail.id" v-if="details.length > 0">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Action:</span> {{ detail.action }}</p>
                                  </div>

                                  <div class="box__infos" >
                                      <h2>
                                      {{ detail.name }}
                                      </h2>

                                      <span>
                                          <p class="text-grey">
                                              <i class="bi bi-geo-alt"></i>
                                              {{ detail.location }}, {{ detail.area }}
                                          </p>
                                              </span><br>

                                      <strong class="price">
                                          {{  format(detail.price) }} XOF
                                      </strong>

                                      <div class="icons" v-if="detail.action !== 'Terrain'">
                                          <div class="icon ">
                                              <i class="fas fa-bed"></i>
                                              {{ detail.rooms }} chambres
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-shower"></i>
                                              {{ detail.bathrooms }} douches
                                          </div>

                                          <div class="icon">
                                              <i class="bi-egg-fried"></i>
                                              {{ detail.kitchens }} cuisine
                                          </div>

                                          <div class="icon">
                                              <i class="bi bi-tv"></i>
                                              {{detail.living_rooms  }} salons
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-warehouse"></i>
                                              {{detail.living_rooms  }} magasins
                                          </div>
                                      </div>

                                      <div class="icons" v-if="detail.action === 'Terrain'">
                                        <div class="icon">
                                            <i class="fas fa-layer-group"></i>
                                            {{detail.size  }} m²
                                        </div>
                                      </div>

                                          <a v-bind:href="'/ad/'+ detail.id" class="btn btn-primary">
                                              Voir
                                          </a>
                                  </div>
                              </div>

                              <div class="col-12" v-if="details.length == 0">
                                <p class="text text-center">
                                    Aucune annonce à afficher
                                </p>
                              </div>

                          </div>

                      </div>
                    <!--end to sell-->


                      <!--show by name -->
                      <div class="container" v-if="showByName">
                          <div class="row">
                              <div class="list__heading">
                                  <h2 class='span text-center subtitle'>
                                      Résultats de la recherche <span>({{ searchItems.length }})</span>
                                  </h2>
                              </div>

                              <div class="col-12 box card mb-4" v-for="detail in searchItems" :key="detail.id"
                              v-if="searchItems.length > 0">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Action:</span> {{ detail.action }}</p>
                                  </div>

                                  <div class="box__infos" >
                                      <h2>
                                      {{ detail.name }}
                                      </h2>

                                      <span>
                                          <p class="text-grey">
                                              <i class="bi bi-geo-alt"></i>
                                              {{ detail.location }}, {{ detail.area }}
                                          </p>
                                              </span><br>

                                      <strong class="price">
                                          {{  format(detail.price) }} XOF
                                      </strong>

                                      <div class="icons" v-if="detail.action !== 'Terrain'">
                                          <div class="icon ">
                                              <i class="fas fa-bed"></i>
                                              {{ detail.rooms }} chambres
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-shower"></i>
                                              {{ detail.bathrooms }} douches
                                          </div>

                                          <div class="icon">
                                              <i class="bi-egg-fried"></i>
                                              {{ detail.kitchens }} cuisine
                                          </div>

                                          <div class="icon">
                                              <i class="bi bi-tv"></i>
                                              {{detail.living_rooms  }} salons
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-warehouse"></i>
                                              {{detail.living_rooms  }} magasins
                                          </div>
                                      </div>

                                      <div class="icons" v-if="detail.action === 'Terrain'">
                                        <div class="icon">
                                            <i class="fas fa-layer-group"></i>
                                            {{detail.size  }} m²
                                        </div>
                                      </div>

                                          <a v-bind:href="'/ad/'+ detail.id" class="btn btn-primary">
                                              Voir
                                          </a>
                                  </div>
                              </div>

                              <div class="col-12" v-if="searchItems.length == 0">
                                <p class="text text-center">
                                    Aucune annonce à afficher
                                </p>
                              </div>

                          </div>

                      </div>
                    <!--end by name-->

                    <!--show by category-->
                    <div class="container" v-if="showByCategory">
                          <div class="row">
                              <div class="list__heading">
                                  <h2 class='span text-center subtitle'>
                                      Annonces de la catégorie {{ category }} <span>({{ itemsByCategory.length }})</span>
                                  </h2>
                              </div>

                              <div class="col-12 box" v-for="detail in itemsByCategory" :key="detail.id" v-if="itemsByCategory.length > 0">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Action:</span> {{ detail.action }}</p>
                                  </div>

                                  <div class="box__infos" >
                                      <h2>
                                      {{ detail.name }}
                                      </h2>

                                      <span>
                                          <p class="text-grey">
                                              <i class="bi bi-geo-alt"></i>
                                              {{ detail.location }}, {{ detail.area }}
                                          </p>
                                              </span><br>

                                      <strong class="price">
                                          {{  format(detail.price) }} XOF
                                      </strong>

                                      <div class="icons" v-if="detail.action !== 'Terrain'">
                                          <div class="icon ">
                                              <i class="fas fa-bed"></i>
                                              {{ detail.rooms }} chambres
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-shower"></i>
                                              {{ detail.bathrooms }} douches
                                          </div>

                                          <div class="icon">
                                              <i class="bi-egg-fried"></i>
                                              {{ detail.kitchens }} cuisine
                                          </div>

                                          <div class="icon">
                                              <i class="bi bi-tv"></i>
                                              {{detail.living_rooms  }} salons
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-warehouse"></i>
                                              {{detail.living_rooms  }} magasins
                                          </div>
                                      </div>

                                      <div class="icons" v-if="detail.action === 'Terrain'">
                                        <div class="icon">
                <i class="fas fa-layer-group"></i>
                {{detail.size  }} m²
            </div>

                                      </div>

                                      <button class="btn btn-primary">
                                          <a v-bind:href="'/ad/'+ detail.id">
                                              Voir
                                          </a>
                                      </button>
                                  </div> <hr>
                              </div>

                              <div class="col-12" v-if="itemsByCategory.length == 0">
                                <p class="text text-center">
                                    Aucune annonce à afficher
                                </p>
                              </div>

                          </div>

                      </div>
                    <!--end  show by category-->

                     <!--show by location -->
                     <div class="container" v-if="showByLocation">
                          <div class="row">
                              <div class="list__heading">
                                  <h2 class='span text-center subtitle'>
                                      Annonces de {{  locationn }} <span>({{ itemsByLocation.length }})</span>
                                  </h2>
                              </div>

                              <div class="col-12 box" v-for="detail in itemsByLocation" :key="detail.id" v-if="itemsByLocation.length > 0">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Action:</span> {{ detail.action }}</p>
                                  </div>

                                  <div class="box__infos" >
                                      <h2>
                                      {{ detail.name }}
                                      </h2>

                                      <span>
                                          <p class="text-grey">
                                              <i class="bi bi-geo-alt"></i>
                                              {{ detail.location }}, {{ detail.area }}
                                          </p>
                                              </span><br>

                                      <strong class="price">
                                          {{  format(detail.price) }} XOF
                                      </strong>

                                      <div class="icons" v-if="detail.action !== 'Terrain'">
                                          <div class="icon ">
                                              <i class="fas fa-bed"></i>
                                              {{ detail.rooms }} chambres
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-shower"></i>
                                              {{ detail.bathrooms }} douches
                                          </div>

                                          <div class="icon">
                                              <i class="bi-egg-fried"></i>
                                              {{ detail.kitchens }} cuisine
                                          </div>

                                          <div class="icon">
                                              <i class="bi bi-tv"></i>
                                              {{detail.living_rooms  }} salons
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-warehouse"></i>
                                              {{detail.living_rooms  }} magasins
                                          </div>
                                      </div>

                                      <div class="icons" v-if="detail.action === 'Terrain'">
                                        <div class="icon">
                <i class="fas fa-layer-group"></i>
                {{detail.size  }} m²
            </div>

                                      </div>

                                      <button class="btn btn-primary">
                                          <a v-bind:href="'/ad/'+ detail.id">
                                              Voir
                                          </a>
                                      </button>
                                  </div>
                              </div>

                              <div class="col-12" v-if="itemsByLocation.length == 0">
                                <p class="text text-center">
                                    Aucune annonce à afficher
                                </p>
                              </div>

                          </div>

                      </div>
                    <!--end show ads-->

                    <!--show filtered-->
                    <div class="container" v-if="showFiltered">
                          <div class="row">
                              <div class="list__heading">
                                  <h2 class='span text-center subtitle'>
                                      Résultats du tri pour <strong>{{ format(rangeValue) }} XOF</strong> <span>({{ filteredItems.length }})</span>
                                  </h2>
                              </div>

                              <div class="col-12 box" v-for="detail in filteredItems" :key="detail.id" v-if="filteredItems.length > 0">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Action:</span> {{ detail.action }}</p>
                                  </div>

                                  <div class="box__infos" >
                                      <h2>
                                      {{ detail.name }}
                                      </h2>

                                      <span>
                                          <p class="text-grey">
                                              <i class="bi bi-geo-alt"></i>
                                              {{ detail.location }}, {{ detail.area }}
                                          </p>
                                              </span><br>

                                      <strong class="price">
                                          {{  format(detail.price) }} XOF
                                      </strong>

                                      <div class="icons" v-if="detail.action !== 'Terrain'">
                                          <div class="icon ">
                                              <i class="fas fa-bed"></i>
                                              {{ detail.rooms }} chambres
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-shower"></i>
                                              {{ detail.bathrooms }} douches
                                          </div>

                                          <div class="icon">
                                              <i class="bi-egg-fried"></i>
                                              {{ detail.kitchens }} cuisine
                                          </div>

                                          <div class="icon">
                                              <i class="bi bi-tv"></i>
                                              {{detail.living_rooms  }} salons
                                          </div>

                                          <div class="icon">
                                              <i class="fas fa-warehouse"></i>
                                              {{detail.living_rooms  }} magasins
                                          </div>
                                      </div>

                                      <div class="icons" v-if="detail.action === 'Terrain'">
                                        <div class="icon">
                <i class="fas fa-layer-group"></i>
                {{detail.size  }} m²
            </div>

                                      </div>

                                      <button class="btn btn-primary">
                                          <a v-bind:href="'/ad/'+ detail.id">
                                              Voir
                                          </a>
                                      </button>
                                  </div>
                              </div>

                              <div class="col-12" v-if="filteredItems.length == 0">
                                <p class="text text-center">
                                    Aucune annonce à afficher
                                </p>
                              </div>

                          </div>

                      </div>
                    <!--end show ads-->
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
      data() {
          return {
            details: [],
            showAds: false,
            showToRent: false,
            showToSell: false,
            showByCategory: false,
            showFilters: false,
            itemsByCategory: [],
            itemsByLocation: [],
            showSearch: false,
            showByName: false,
            rangeValue: '',
            showFiltered: false,
            rangeValue: '',
            category: '',
            searchText: '',
            locationn: '',
            price: '',
            city: ''
          };
      },
      mounted: function(){
            this.getAds();
        },
        computed: {
            itemsByCategory() {
                    return this.details.filter(detail => {
                        return detail.type === this.category;
                    });
                },
                itemsByLocation() {
                    return this.details.filter(detail => {
                        return detail.location === this.locationn;
                    });
                },

            filteredItems() {
                return this.details.filter(detail => {
                    return detail.price >= this.rangeValue;
                });

                },
            searchItems() {
                return this.details.filter(detail => {
    return (
        detail.name.toLowerCase().includes(this.searchText.toLowerCase()) ||
        detail.area.toLowerCase().includes(this.searchText.toLowerCase()) ||
        detail.description.toLowerCase().includes(this.searchText.toLowerCase())
    );
});

           },
        },
    methods:{
        getAds() {
            axios.get('/availableAdsApi').then(
              response =>
              this.details = response.data);
              this.showAds = true;
              this.showToRent = false;
              this.showToSell = false;
              this.showByLocation = false;
              this.showFiltered = false;
              this.showByType = false;
              this.showFilters = true;
              this.showByName = false;
              this.showSearch = false;

          },
          getToRent(){
            axios.get('/availableAdsApi').then(response => {
            this.details = response.data.filter(item => item.action === 'A louer');
            });
              this.showAds = false;
              this.showToRent = true;
              this.showToSell = false;
              this.showByCategory = false;
              this.showByLocation = false;
              this.showFilters = true;
              this.showFiltered = false;
              this.showByName = false;
              this.showSearch = false;
          },
          getToSell(){
            axios.get('/availableAdsApi').then(response => {
            this.details = response.data.filter(item => item.action === 'A vendre');
            });
              this.showAds = false;
              this.showToRent = false;
              this.showToSell = true;
              this.showByCategory = false;
              this.showByLocation = false;
              this.showFilters = true;
              this.showFiltered = false;
              this.showByName = false;
              this.showSearch = false;
          },
          getByName(){
              this.showAds = false;
              this.showToRent = false;
              this.showToSell = false;
              this.showByCategory = false;
              this.showByLocation = false;
              this.showFilters = false;
              this.showFiltered = false;
              this.showByName = true;
              this.showSearch = true;
          },

          getByCategory(category){
            this.category = category;
            this.showAds = false;
            this.showToRent = false;
              this.showToSell = false;
            this.showByCategory = true;
            this.showByLocation = false;
            this.showFiltered = false;
            this.showByName = false;
            this.showSearch = false;
          },
          getByLocation(locationn){
            this.locationn = locationn;
            this.showAds = false;
            this.showByCategory = false;
            this.showByLocation = true;
            this.showToRent = false;
              this.showToSell = false;
            this.showFiltered = false;
            this.showByName = false;
            this.showSearch = false;
          },
          getRange(){
            this.showAds = false;
              this.showToRent = false;
              this.showToSell = false;
              this.showByLocation = false;
              this.showFiltered = false;
              this.showByType = false;
            this.showFiltered = true;
            this.showSearch = false;
          },
          displaySearch(){
            this.showSearch = true;
            this.showFilters = false;
          },
          getImgUrl(pic) {
  return this.img_url + "/img/ads/" + pic;
    },
        format(num){
        let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 3 }).format(num);
        return res;
        }
        }
  }
  </script>


<style>
.tag{
    cursor: pointer;
}

.buttons{
    display: flex;
    flex-direction: row;
    margin: auto;
    text-align: center;
    width: 80%;
    padding-top: 5px;
}

.search-icon{
    cursor: pointer;
}
</style>

