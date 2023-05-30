<x-app-layout>

    <main class="main">
        <div class="container">
            <div class="row dashboard">
                <div class="col-sm-12 col-md-3 dashboard__menu">
                    @include('pages/back/menu')
                </div>
                <div class="col-sm-12 col-md-9 dashboard__content">
                    <div class="row">
                        <div class="col-sm-12 col-md-8 left">
                            <form action="" class="bg-light text-center">
                                <div class="form__close right">
                                    <i class="bi bi-x"></i>fermer
                                </div> <br>

                                <h1 class="text-blue">
                                    Suppression
                                </h1>
                                <p class="text-center">
                                    Voulez vous vraiment supprimer
                                    {{$data->name}} ?
                                </p>

                                <div class="text-center">
                                    <label for="" class="m-2">
                                        <a class="btn btn-success" href="{{url('deleteAd',$data->id)}}">
                                            Oui
                                        </a>
                                    </label>

                                    <label for="" class="m-2">
                                        <?php if (
                                            auth()->user()->role === 'admin'
                                        ) { ?>
                                        <a class="btn btn-danger" href="/allAds">
                                            Non
                                        </a>
                                        <?php } else { ?>
                                        <a class="btn btn-danger" href="/myAds">
                                            Non
                                        </a>
                                        <?php } ?>
                                    </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>