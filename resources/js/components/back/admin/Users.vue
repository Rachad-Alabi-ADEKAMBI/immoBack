<template>
    <div class="container"  v-if="showSearch">
            <div class="row">
                <div class="search-bar">
                    <label for="">Recherche par mot clé  <i class="bi bi-x bold"
                        @click="displayAll()">close</i><br>
                        <input type="text" v-model="searchText">
                    </label>
                </div>
            </div>

        </div>

   <div class="container" v-if='showAll'>
        <div class="row">
                <div class="col-9">
                            <h1 class="text-blue text-left">
                                Liste des utilisateurs
                            </h1>
                    </div>

                    <div class="col-3 text-left search-icon" @click="displaySearch()" v-if="showSearchBtn">
                                <i class="bi bi-search"></i>
                                <p class="text text-grey">Chercher</p>
                    </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-10">
                    <div class="table-responsive-md">

                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col" >Date inscription</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Annonces</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in users" :key="user.id">
                                <td data-label='Nom'>
                                    {{ user.name }}
                                </td>

                                <td data-label="Date inscription">
                                    {{ formatTheDate(user.created_at)  }}
                                </td>

                                <td data-label='Id' scope="row">
                                    <img :src='getImgUrl(user.profile_photo_path)'   alt="" class="table-img">
                                </td>
                                <td data-label='ads'>
                                 {{ user.ads }}
                                </td>

                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>

    <div class="container" v-if='showFiltered'>
        <div class="row">
                <div class="col-9">
                            <h1 class="text-blue text-left">
                                Resultats de la recherche
                            </h1>
                    </div>
            </div>

            <div class="row" v-if="filteredItems.length > 0">
                <div class="col-sm-12 col-md-10">
                    <div class="table-responsive-md">

                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col" >Date inscription</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Annonces</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="user in filteredItems" :key="user.id">
                                <td data-label='Nom'>
                                    {{ user.name }}
                                </td>

                                <td data-label="Date inscription">
                                    {{ formatTheDate(user.created_at)  }}
                                </td>

                                <td data-label='Id' scope="row">
                                    <img :src='getImgUrl(user.profile_photo_path)'   alt="" class="table-img">
                                </td>
                                <td data-label='ads'>
                                 {{ user.ads }}
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
      name: 'Users',
      props: {

      },
  data(){
        return{
            showAll : true,
        showDelete : false,
        users: [],
        details: [],
        searchText: '',
        showSearchBtn: true,
        showEdit: false,
        id: '',
        showSearch: false,
        showFiltered: false
        }
  },
  mounted: function(){
    this.displayAll();
  },
  computed: {
filteredItems() {
  return this.users.filter(detail => {
    return (
        detail.name.toLowerCase().includes(this.searchText.toLowerCase())
    )
  });

}
},
  methods:{
    displayAll(){
            axios.get('/usersApi').then(
                    response =>
                    this.users = response.data);
        this.showAll = true;
        this.showFiltered = false;
        this.showSearch = false
    },
    getImgUrl(img){
        return '/img/agents/' + img;
    },
    displaySearch(){
        this.showSearch = true;
        this.showAll = false;
        this.showFiltered = true;
    },
    deleteUser(id){
        axios.get('/userApi/'+id).then(
                    response =>
                    this.details = response.data);
        this.showAll = false;
        this.showDelete = true;
        this.showEdit = false;
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