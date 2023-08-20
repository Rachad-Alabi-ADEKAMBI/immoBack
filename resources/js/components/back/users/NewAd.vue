<template>

    <div class="container" v-if="showSuccessMsg">
        <div class="row bg-light">
            <div class="col-sm-12 col-md-8 mx-auto">
                <div class="text text-right mr-0" @click="closeSuccessMsg()">
                    Fermer
                </div>

                <p class="text text-success fw-bold">
                    {{ successMsg }}
                </p>
            </div>
        </div>
    </div>

    <div class="container" v-if="showErrorMsg">
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

    <div class=" text-center mx-auto fw-bold ">
        <div class="row text-left" v-if="showOptions" >
                <div class="col-12 text-left">
                            <h1 class="text-blue title ml-0">
                                Nouvelle annonce
                            </h1>
                            <div class="buttons text-left">

                                <button class='btn btn-primary' @click='displayAddForm("Appartement")'>
                                    Appartement
                                </button>

                                <button class='btn btn-primary'  @click="displayAddForm('Boutique')">
                                    Boutique
                                </button>

                                <button class='btn btn-primary'  @click="displayAddForm('Bureau')">
                                    Bureau
                                </button>

                                <button class='btn btn-primary'  @click="displayAddForm('Maison')">
                                    Maison
                                </button>

                                <button class='btn btn-primary'  @click="displayAddForm('Terrain')">
                                    Terrain
                                </button>
                          </div>
                </div>
        </div>

        <div class="row" v-if="showAddForm" >
            <div class="col-sm-12 col-md-10 left bg-light">
                <form action="newAd" method="POST" enctype="multipart/form-data" class="mx-auto">
                    <div class="text-left" @click='displayOptions()'>
                    <i class="bi bi-x" ></i>
                      </div>  <br>
                    <h3 class=" text-blue text-center">
                        Nouvelle annonce catégorie {{ category }}
                    </h3>
                    <hr>
                    <div class="form-row mx-auto">
                        <div class="form-group col-md-8">
                            <label for="inputEmail4">Nom: <span class="required">*</span></label>

                            <input type="text" class="form-control" name='name' id="inputEmail4" placeholder=""
                             v-model='name'>

                             <input type="hidden" class="form-control" name='type' id="inputEmail4" placeholder=""
                             v-model='type'>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputPassword4">Action: <span class="required">*</span></label>
                            <select type="text" class="form-control" v-model="action" id="inputPassword4" name='action' placeholder=""
                            >
                                <option value="">Veuillez sélectionner</option>
                                <option value="A vendre">A vendre</option>
                                <option value="A louer">A louer</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-row mx-auto">
                        <div class="form-group col-md-3">
                            <label for="inputEmail4">Prix: <span class="required">*</span></label>
                            <input type="number" class="form-control"
                            name='price' v-model="price" id="inputEmail4" placeholder="">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Localisation: <span class="required">*</span></label>
                            <select type="text" class="form-control" name='location' id="inputPassword4" placeholder=""
                             v-model="location" required>
                                <option value="">Veuillez selectionner</option>
                                <option value="Bohicon">Bohicon</option>
                                <option value="Cotonou">Cotonou</option>
                                <option value="Calavi">Calavi</option>
                                <option value="Parakou">Parakou</option>
                                <option value="Porto-Novo">Porto Novo</option>

                            </select>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputPassword4">Quartier: <span class="required">*</span></label>
                            <input type="text" class="form-control" v-model="area" name='area' id="inputPassword4" placeholder=""  required>
                        </div>
                    </div>

                    <div class="form-row mx-auto" v-if="">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Chambres: <span class="required">*</span></label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="Nbre de chambres à coucher"
                                name='rooms' v-model="rooms"  required onkeyup="if(this.value<0){this.value= this.value * -1}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inbputEmail4">Salons: <span class="required">*</span></label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="Nbre de salons"
                                name='living_rooms' v-model="living_rooms"  required onkeyup="if(this.value<0){this.value= this.value * -1}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Salles de bains: <span class="required">*</span></label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="Nbre de salles de bains"
                                name='bathrooms'  v-model="bathrooms" required onkeyup="if(this.value<0){this.value= this.value * -1}">
                        </div>
                    </div>

                    <div class="form-row mx-auto">
                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Cuisines: <span class="required">*</span></label>
                            <input type="number" class="form-control" id="inputEmail4" placeholder="Nbre de cuisines"
                                name='kitchens' v-model="kitchens"  required onkeyup="if(this.value<0){this.value= this.value * -1}">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Garage: <span class="required">*</span></label>
                            <select name="parkings" id="" v-model="parkings">
                                <option value="">Veuillez sélectionner</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                           </select>

                        </div>

                        <div class="form-group col-md-4">
                            <label for="inputEmail4">Magasin: <span class="required">*</span></label>
                            <select name="parkings" id="" v-model="warehouses">
                                <option value="">Veuillez sélectionner</option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                           </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Description: <span class="required">*</span></label>
                        <textarea class="form-control" v-model="description" id="exampleFormControlTextarea1"  rows="3" name='description'></textarea>
                    </div>


                    <div class="form-row mx-auto">
                        <div class="form-group col-sm-4 col-md-4">
                            <label for="inputEmail4">Image 1: <span class="required">*</span></label>
                            <input type="file" class="form-control" id="inputEmail4" name='pic1'>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="inputEmail4">Image 2: </label>
                            <input type="file" class="form-control" id="inputEmail4" name='pic2'>
                        </div>

                        <div class="form-group col-sm-4 col-md-4">
                            <label for="inputEmail4">Image 3: </label>
                            <input type="file" class="form-control" id="inputEmail4" name='pic3'>
                        </div>


                    </div>

                    <div class="form-row mx-auto">
                        <div class="form-group col-sm-4 col-md-3">
                            <label for="inputEmail4">Image 4: </label>
                            <input type="file" class="form-control" id="inputEmail4" name='pic4'>
                        </div>

                        <div class="form-group col-sm-4 col-md-3">
                            <label for="inputEmail4">Image 5: </label>
                            <input type="file" class="form-control" id="inputEmail4" name='pic5'>
                        </div>

                        <div class="form-group col-sm-4 col-md-3">
                            <label for="inputEmail4">Image 6: </label>
                            <input type="file" class="form-control" id="inputEmail4" name='pic6'>
                        </div>

                        <div class="form-group col-sm-4 col-md-3">
                            <label for="inputEmail4">Image 7: </label>
                            <input type="file" class="form-control" id="inputEmail4" name='pic7'>
                        </div>
                    </div>

                    <div class="form-group col-sm-4 col-md-3 mx-auto">
                        <button class="btn btn-primary" @click="proceed()" type="submit">
                            Valider
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    data() {
        return {
            csrfToken: '',
            showOptions: true,
            showAddForm: false,
            successMsg: '',
            showSuccessMsg: false,
            showErrorMsg: false,
            errorMsg: '',
            name: 'ytigum',
            price: '54000',
            location: 'ctn',
            area: 'vodje',
            rooms: '2',
            living_rooms: '1',
            bathrooms: '2',
            kitchens: '2',
            description: 'ffwa',
            category: 'Appartement',
            action: 'A louer',
            warehouses: 'Oui',
            parkings: 'Non',
            pic1: '',
            pic2: '',
            pic3: '',
            pic4: '',
            pic5: '',
            pic6: '',
            pic7: ''


        }
    },
    mounted() {
    this.csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  },

    methods: {
        displayOptions(){
            this.showOptions = true;
            this.showAddForm = false;
        },
        displayAddForm(category){
            this.type = category;
            this.showOptions = false;
            this.showAddForm = true;
        },
        closeSuccessMsg(){
            this.showSuccessMsg = false;
        },
        closeErrorMsg(){
            this.showErrorMsg = false;
        },
        proceed() {
  const formData = new FormData();
  formData.append('name', this.name);
  formData.append('price', this.price);
  formData.append('category', this.category);
  formData.append('description', this.description);
  formData.append('location', this.location);
  formData.append('area', this.area);
  formData.append('rooms', this.rooms);
  formData.append('living_rooms', this.living_rooms);
  formData.append('bathrooms', this.bathrooms);
  formData.append('description', this.description);
  formData.append('action', this.action);
  formData.append('kitchens', this.kitchens);
  formData.append('warehouses', this.warehouses);
  formData.append('type', this.type);
  formData.append('parkings', this.parkings);

  this.images.forEach((image, index) => {
    formData.append(`pic${index + 1}`, image);
  });

  axios.post('/newAd', formData, {
    headers: {
      'Content-Type': 'multipart/form-data',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    }
  })
  .then(response => {
    console.log(response.data);
    this.showSuccessMsg = true;
    this.successMsg = "Nouvelle annonce enregistrée avec succès !";
    window.location.replace('#app');
  })
  .catch(error => {
    console.error(error);
    this.showErrorMsg = true;
    this.errorMsg = 'Une erreur est survenue, merci de réessayer ultérieurement.';
    window.location.replace('#app');
  });
},

        handleImageUpload(event) {
          const file = event.target.files[0];
          const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];

          if (file && allowedTypes.includes(file.type)) {
            this.image = file;
          } else {
            this.image = null;
            // Display an error message for invalid file type
            alert('Invalid file type. Only JPEG, PNG, JPG and GIF images are allowed.');
          }
        },

        format(num) {
            let res = new Intl.NumberFormat('fr-FR', {
                maximumSignificantDigits: 3
            }).format(num);
            return res;
        },
    }
}
</script>