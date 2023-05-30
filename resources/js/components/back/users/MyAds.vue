<template>
    <div class="container"  v-if="showSearch">
        <div class="row">
            <div class="search-bar">
                <label for="">Recherche par mot clé  <i class="bi bi-x bold"
                    @click="displayAll()"></i><br>
                    <input type="text" v-model="searchText">
                </label>
            </div>
        </div>

    </div>

    <div class=""  v-if='showAll'>
        <div class="row">
            <div class="col-sm-9">
                        <h1 class="text-blue text-left title">
                            Mes annonces <span @click="displaySearch()" v-if="showSearchBtn && ads.length >0">
                          <i class="bi bi-search"></i> </span>
                        </h1>
                </div>
           </div>


        <div class="row mt-2" v-if="ads.length > 0">
            <div class="col-sm-12 col-md-12">
                <div class="table-responsive">

                    <table class="table table-bordered table-hover">
                        <thead class="thead">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                                <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="ad in ads" :key="ad.id">
                                <td data-label='Date'>
                                {{ formatTheDate(ad.created_at) }}
                            </td>
                            <td data-label='Nom'>
                                    {{ ad.name }}
                            </td>

                            <td data-label='Id' scope="row">
                                <img :src='getImgUrl(ad.pic1)'   alt="" class="table-img">
                            </td>
                            <td data-label='Action'>
                                {{ ad.action }}
                            </td>

                            <td data-label='Prix'>
                             {{ format(ad.price) }} XOF
                            </td>
                            <td>
                                <i class="bi bi-eye-fill" @click='viewOnline(ad.id)'></i>
                                <i class="bi bi-pen-fill" @click='editAd(ad.id)'></i>
                                <i class="bi bi-trash" @click='deleteAd(ad.id)'></i>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-2" v-if="ads.length ==0">
            <div class="col-sm-12 col-md-10">
                <p class="text text-center">
                    Vous n'avez publié aucune annonce pour l'instant
                </p>
            </div>
        </div>
    </div>

    <div class="container "  v-if='showFiltered'>
        <div class="row">
            <div class="col-sm-9">
                        <h1 class="text-blue text-left">
                            Resultats de la recherche
                        </h1>


                </div>
        </div>

        <div class="row" v-if="filteredItems.length > 0">
            <div class="col-12">
                <div class="table-responsive">

                    <table class="table table-hover">
                        <thead class="thead">
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                                <th scope="col">Date</th>
                                <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="ad in filteredItems" :key="ad.id">
                            <td data-label='Nom'>
                                    {{ ad.name }}
                            </td>

                            <td data-label='Id' scope="row">
                                <img :src='getImgUrl(ad.pic1)'   alt="" class="table-img">
                            </td>
                            <td data-label='Action'>
                                {{ ad.action }}
                            </td>

                            <td data-label='Date'>
                                {{ formatTheDate(ad.created_at) }}
                            </td>

                            <td data-label='Prix'>
                             {{ format(ad.price) }} XOF
                            </td>
                            <td>
                                <i class="bi bi-eye-fill" @click='viewOnline(ad.id)'></i>
                                <i class="bi bi-pen-fill" @click='editAd(ad.id)'></i>
                                <i class="bi bi-trash" @click='deleteAd(ad.id)'></i>
                            </td>

                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row" v-if="filteredItems.length == 0">
            <div class="col-12">
                <p class="text">
                    Aucun résultat
                </p>
            </div>
        </div>
    </div>

</template>

<script>
import axios from "axios";

export default {

data(){
return{
    ads: [],
    showAll: false,
    showFiltered : false,
    showSearchBtn: true,
    showSearch: true,
    showDelete: false,
    searchText: ''
}
},
mounted: function(){
    this.displayAll();
},
computed: {
filteredItems() {
  return this.ads.filter(ad => {
    return (
      ad.name.toLowerCase().includes(this.searchText.toLowerCase())
    )
  });

}
},
methods: {
displayAll(){
        axios.get('/myAdsApi').then(
                response =>
                this.ads = response.data);
this.showAll = true;
this.showDelete = false;
this.showSearch = false;
this.showFiltered = false;
},
displaySearch(){
    this.showSearch = true;
    this.showAll = false;
  this.showFiltered = true;
},
viewOnline(id){
   window.location.replace('ad/' +id);
},
deleteAd(id){
   window.location.replace('deleteAdView/' +id);
},
editAd(id){
    window.location.replace('editAdView/' +id);
},
getImgUrl(img){
    return ('img/ads/'+img);
},
format(num){
            let res = new Intl.NumberFormat('fr-FR', { maximumSignificantDigits: 2 }).format(num);
            return res;
    },
    formatTheDate(theDate) {
    const date = new Date(theDate);
    const options = {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric'
    };
    return date.toLocaleDateString('fr-FR', options);
  }
  }
}

</script>
