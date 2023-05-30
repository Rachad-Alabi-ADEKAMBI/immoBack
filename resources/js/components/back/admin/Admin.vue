<template>

    <div class="container" v-if="successMsg != ''">
        <div class="row">
            <div class="col-12">
                <div class="close text text-right mr-0">
                    fermer
                </div>

                <p class="text text-success">
                    {{ successMsg }}
                </p>
            </div>
        </div>
    </div>

    <div class="container" v-if="errorMsg != ''">
        <div class="row">
            <div class="col-12">
                <div class="close text text-right mr-0">
                    fermer
                </div>

                <p class="text text-danger">
                    {{ errorMsg }}
                </p>
            </div>
        </div>
    </div>

     <!--show my ads-->
    <div class="container" v-if="showAds">


        <div class="row mt-2" v-if="showSearch">
            <div class="search-bar mx-auto text-center">
                <label for="">Recherche par mot clé <i class="bi bi-x ml-1 pt-7 bold" @click="closeSearch()"></i><br>
                    <input type="text" v-model="searchKey">
                </label>
            </div> <br>
        </div>


        <!--show ads-->
        <div class="row" >
                            <h1 class="text-blue text-center col-12">
                                Annonces <span  @click="displaySearch()">
                                    <i class="bi bi-search"></i> se</span>
                            </h1>
            <div class="col-sm-12 mt-4 col-md-10 mx-auto">
                <div class="table-responsive-md">
                    <table class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Image</th>
                                <th scope="col">Prix</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="ad in details" :key="ad.id">
                                <td data-label='Id'>
                                        {{ ad.id }}
                                </td>
                                <td data-label='Nom'>
                                        {{ ad.name }}
                                </td>

                                <td data-label='Id' scope="row">
                                    <img :src='getImgUrl(ad.pic1)'   alt="" class="table-img">
                                </td>
                                <td data-label='Prix'>
                                 {{ format(ad.price) }} XOF
                                </td>
                                <td>
                                    <i class="fas fa-eye" @click='goToAd(ad.id)'>see</i>
                                    <i class="fas fa-trash" @click='deleteAd(ad.id)'>delete</i>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end show ads-->


    </div>
    <!--end -->

</template>

<script>
export default {
    name: 'User',
    props: {

    },
    data() {
        return {
            showAds: false,
            details: [],
            searchKey: '',
            showSearch: false,
            showResults: false,
            showAdd: false,
            showAll: false,
            showResults: false,
            showSearchForm: false,
            showSearchBtn: false,
            showOptions: false,
            showAddForm: false,
            successMsg: '',
            errorMsg: '',

        }
    },
    mounted: function() {
        this.getAds();
    },
    computed: {
        filteredItems()  {
            this.showResults = true;
                   return this.details.filter(detail => {
                    return detail.name.toLowerCase().includes(this.searchKey.toLowerCase())
                })
            }
    },

    methods: {
        getAds() {
            axios.get('/allAdsApi')
                .then(response => {
                    this.details = response.data;
                });
            this.showAddBtn = true;
            this.showAds = true;
            this.showResults = false;
            this.showSearchBtn = true;
            this.showAdd = false;
            this.showAll = true;
            this.showSearch = false;
        },
        displaySearch(){
            this.showSearchForm = true;
            this.showSearchBtn = false;
            this.showMyAds = false;
            this.showResults = true;
        },
        displaySearch() {
            this.showAll = false;
            this.showSearch = true;
            this.showMyAds = false;
            this.showAddBtn = false;
            this.showResults = true;
        },
        closeSearch() {
            this.showMyAds = true;
            this.showSearch = false;
            this.showResults = false;
            this.showAddBtn = true;
        },
        edit(id) {
            window.location.replace('editView/' + id)
        },
        deleteAd(id){
            window.location.replace('deleteView/' + id)
        },

        goToAd(id) {
            window.location.replace('/ad/' + id);
        },

        format(num) {
            let res = new Intl.NumberFormat('fr-FR', {
                maximumSignificantDigits: 3
            }).format(num);
            return res;
        },
        getImgUrl(pic) {
            return "img/" + pic ;
        },
    }
}
</script>