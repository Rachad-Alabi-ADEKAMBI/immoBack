<template>
    <div class="content">
  <section class='section bg-light'>
     <div class="container">

          <div class="row mx-auto pt-5">
              <Tags class="col-sm-12 col-md-12 col-lg-3">
                <div class="">
                     <div class="tags ">
                     <div class="tags__heading text-center">
                         <p class="span">
                             <i class="fas fa-list"></i> Type de biens
                         </p>
                     </div>
                     <hr>

                     <div class="tags__body  text-center">
                         <div class="tag" @click="getByCategory('Appartement')" >
                                 <i class="bi bi-building"></i>  Appartments
                         </div>

                         <hr>
                         <div class="tag" @click="getByCategory('Maison')" >
                                <i class="bi bi-house"></i> Maisons
                         </div>

                         <hr>

                         <div class="tag"  @click="getByCategory('Terrain')" >
                                 <i class="bi bi-signpost"></i> Terrains
                         </div>

                         <hr>
                     </div>

                     <div class="tags__btn">
                        <i class="bi bi-caret-down onclick='showTag1'"></i>
                     </div>
     </div>

     <br>

     <div class="tags ">
         <div class="tags__heading text-center">
                         <p class="span">
                             <i class="bi bi-geo-alt"></i> Localités
                         </p>
                     </div>
                     <hr>

                     <div class="tags__body text-center">
                        <div class="tag">
                            <select id="" @click="getByLocation()" v-model="location">
                                    <option value="" disabled selected>Veuillez sélectionner</option>
                                    <option value="Cotonou">Cotonou</option>
                                    <option value="Abomey-Calavi">Abomey-Calavi</option>
                                    <option value="Porto-Novo">Porto-Novo</option>
                                    <option value="Parakou">Parakou</option>
                                    <option value="Bohicon">Bohicon</option>
                                    <option value="Ouidah">Ouidah</option>
                                    <option value="Abomey">Abomey</option>
                                    <option value="Malanville">Malanville</option>
                                    <option value="Natitingou">Natitingou</option>
                                </select>
                        </div>

                         <div class="tag" @click="getByLocation('Bohicon')" >
                                 <i class="bi bi-arrow-right"></i>Bohicon
                         </div>

                         <hr>
                         <div class="tag" @click="getByLocation('Calavi')" >
                                 <i class="bi bi-arrow-right"></i> Calavi
                         </div>

                         <hr>

                         <div class="tag" @click="getByLocation('Cotonou')" >
                                 <i class="bi bi-arrow-right"></i> Cotonou
                         </div>

                         <hr>

                         <div class="tag">
                             <router-link to="/location?location=Porto-Novo" >
                                 <i class="bi bi-arrow-right"></i> Porto-Novo
                              </router-link>
                         </div>

                         <hr>
                         <div class="tag">
                             <router-link to="/location?location=Parakou" >
                                 <i class="bi bi-arrow-right"></i> Parakou
                              </router-link>
                         </div>
                     </div>
     </div>
    </div>
              </Tags>

              <div class="col-sm-12 col-md-12 col-lg-9">
                  <div class="list">

                    <!--show filters-->
                    <div class="container">
                        <div class='buttons mx-auto text text-center' v-if="showFilters">

                            <input type="range" v-model="rangeValue" min="0"
                            max="2000000" class="buttons__item"   @click="getRange()">

                                <div class="buttons__item">
                                    <button class="btn btn-primary m-1"  @click='getAllCars()'>
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
                                S
                            </div>
                        </div>
                        <hr>

                        <div class="mx-auto text-center search-field pt-3" v-if="showSearch">
                                <input type="text" placeholder="Nom ou modèle" v-model="searchText">
                            <i class="bi bi-x" @click="getAllCars()"></i>
                        </div>
                    </div>
                    <!--end filters-->

                    <!--show ads-->
                      <div class="container" v-if="showAds">
                          <div class="row">
                              <div class="list__heading">
                                  <h2 class='span text-center subtitle'>
                                      TOUTES LES ANNONCES
                                  </h2>
                              </div>

                              <div class="col-12 box" v-for="detail in details" :key="detail.id" v-if="details.length > 0">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Etat:</span> En vente</p>
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

                                      <div class="icons" v-if="detail.type !== 'Terrain'">
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

                                      <div class="icons" v-if="detail.type === 'Terrain'">
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

                              <div class="col-12" v-if="details.length == 0">
                                <p class="text">
                                    Aucune annonce à afficher
                                </p>
                              </div>

                          </div>

                      </div>
                    <!--end show ads-->

                    <!--show by category-->
                    <div class="container" v-if="showByCategory">
                          <div class="row">
                              <div class="list__heading">
                                  <h2 class='span text-center subtitle'>
                                      ANNONCES DE LA CATEGORIE {{ category }}
                                  </h2>
                              </div>

                              <div class="col-12 box" v-for="detail in itemsByCategory" :key="detail.id" v-if="itemsByCategory.length > 0">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Etat:</span> En vente</p>
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

                                      <div class="icons" v-if="detail.type !== 'Terrain'">
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

                                      <div class="icons" v-if="detail.type === 'Terrain'">
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

                              <div class="col-12" v-if="itemsByCategory.length == 0">
                                <p class="text">
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
                                      ANNONCES DE {{  location }}
                                  </h2>
                              </div>

                              <div class="col-12 box" v-for="detail in itemsByLocation" :key="detail.id" v-if="itemsByLocation.length > 0">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Etat:</span> En vente</p>
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

                                      <div class="icons" v-if="detail.type !== 'Terrain'">
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

                                      <div class="icons" v-if="detail.type === 'Terrain'">
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
                                <p class="text">
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
                                      RESULTATS DU TRI POUR {{ rangeValue }} XOF
                                  </h2>
                              </div>

                              <div class="col-12 box" v-for="detail in filteredItems" :key="detail.id" v-if="filteredItems.length > 0">
                                  <div class="box__img">
                                      <img :src='getImgUrl(detail.pic1)'>
                                      <p class="text text-grey"><span><i class="bi bi-tag"></i>Etat:</span> En vente</p>
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

                                      <div class="icons" v-if="detail.type !== 'Terrain'">
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

                                      <div class="icons" v-if="detail.type === 'Terrain'">
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
                                <p class="text">
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
      data() {
          return {
            details: [],
            showAds: false,
            showByCategory: false,
            showFilters: false,
            itemsByCategory: [],
            itemsByLocation: [],
            showSearch: false,
            rangeValue: '',
            showFiltered: false,
            rangeValue: '',
            category: '',
            searchKey: '',
            location: '',
            price: '',
            city: ''
          };
      },
      mounted: function(){
            this.getAds();
        },
        computed: {
             /*   itemsByCategory() {
            return this.details.filter(detail => {
                return detail.type = this.category;
            });
            },
            */
            filteredItems() {
                return this.details.filter(detail => {
                    return detail.price >= this.rangeValue;
                });
                },
            searchItems() {
                    return this.details.filter(detail => {
                                    return detail.name.toLowerCase().includes(this.searchText.toLowerCase())
                                })
           },
        },
    methods:{
        getAds() {
              axios.get('/allAdsApi').then(
              response =>
              this.details = response.data);
              this.showAds = true;
              this.showByCategory = false;
              this.showByLocation = false;
              this.showFilters = true;
          },
          getByCategory(category){
            this.category = category;
            this.showAds = false;
            this.showByCategory = true;
            this.showByLocation = false;
            this.itemsByCategory = this.details.filter(detail => {
                return detail.type = this.category;
            });
          },
          getByLocation(){
            this.showAds = false;
            this.showByCategory = false;
            this.showByLocation = true;
            this.itemsByLocation = this.details.filter(detail => {
                return detail.location = this.location;
            });
          },
          getRange(){
            this.showAds = false;
            this.showFiltered = true;
          },
          displaySearch(){
            this.showSearch = true;
            this.showFilters = false;
          },
          getImgUrl(pic) {
  return "/img/ads/" + pic;
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

