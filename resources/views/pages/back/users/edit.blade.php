<x-app-layout>
    <main class="main">
        <div class="container">
            <div class="row dashboard">
                <div class="col-sm-12 col-md-3 dashboard__menu">
                    @include('pages/back/menu')
                </div>
                <div class="col-sm-12 col-md-9 dashboard__content">
                    <div class="row mt-4">
                        <div class="col-sm-12 col-md-10 left bg-light">
                            <form action='/editAd/{{$data->id}}' method="POST" class="form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="close text-left">
                                    <i class="bi bi-x"></i>back
                                </div> <br>
                                <h3 class="text-blue text-left">
                                    Editer {{ $data->name }}'
                                </h3>
                                <hr>
                                <div class="form-row mx-auto">
                                    <div class="form-group col-md-8">
                                        <label for="inputEmail4">Nom: </label>

                                        <input type="text" class="form-control" value='{{ $data->name }}'
                                            id="inputEmail4" placeholder="" name='name'>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputPassword4">Action: </label>
                                        <select type="text" class="form-control" name="action" id="inputPassword4"
                                            name='action' placeholder="" value='{{ $data->action }}'>
                                            <option value="">Veuillez sélectionner</option>
                                            <option value="A vendre">A vendre</option>
                                            <option value="A louer">A louer</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row mx-auto">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Prix: </label>
                                        <input type="number" class="form-control" name='price' id="inputEmail4"
                                            placeholder="" value='{{ $data->price }}'>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputPassword4">Localisation: </label>
                                        <select type="text" class="form-control" value='{{ $data->location }}'
                                            id="inputPassword4" placeholder="" name="location">
                                            <option value="">Veuillez selectionner</option>
                                            <option value="Bohicon">Bohicon</option>
                                            <option value="Cotonou">Cotonou</option>
                                            <option value="Calavi">Calavi</option>
                                            <option value="Parakou">Parakou</option>
                                            <option value="Porto-Novo">Porto Novo</option>

                                        </select>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="inputPassword4">Quartier: </label>
                                        <input type="text" class="form-control" value='{{ $data->area }}' name='area'
                                            id="inputPassword4" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Description: </label>
                                    <textarea class="form-control" name="area" id="exampleFormControlTextarea1" rows="3"
                                        name='description' value='{{ $data->description }}'> </textarea>
                                </div>
                                <div class="form-row mx-auto">
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Chambres: </label>
                                        <input type="number" class="form-control" id="inputEmail4"
                                            placeholder="Nbre de chambres à coucher" name='rooms' name="rooms"
                                            onkeyup="if(this.value<0){this.value= this.value * -1}"
                                            value='{{ $data->rooms }}'>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Salons: </label>
                                        <input type="number" class="form-control" id="inputEmail4"
                                            placeholder="Nbre de salons" name='living_rooms'
                                            onkeyup="if(this.value<0){this.value= this.value * -1}"
                                            value='{{ $data->living_rooms }}'>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Salles de bains: </label>
                                        <input type="number" class="form-control" id="inputEmail4"
                                            placeholder="Nbre de salles de bains" name="bathrooms"
                                            value='{{ $data->bathrooms }}'
                                            onkeyup="if(this.value<0){this.value= this.value * -1}">
                                    </div>
                                </div>

                                <div class="form-row mx-auto">
                                    <div class="form-group col-sm-4 col-md-4">
                                        <label for="inputEmail4">Image 1: </label>
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
                                    <button class="btn btn-primary" type="submit">
                                        Valider
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </main>
</x-app-layout>