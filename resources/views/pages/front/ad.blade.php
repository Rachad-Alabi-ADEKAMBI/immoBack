<x-app-layout>

    <div class="content">
        <section class='section bg-light'>
            <div class="container">
                <div class="row mx-auto pt-5">
                    <div class="col-sm-12 col-md-3">
                        <div class="tags ">
                            <div class="tags__heading text-center">
                                <p class="span">
                                    <i class="fas fa-list"></i> Localisation
                                </p>
                            </div>

                            <div class="iframe">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2990.274257380938!2d-70.56068388481569!3d41.45496659976631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e52963ac45bbcb%3A0xf05e8d125e82af10!2sDos%20Mas!5e0!3m2!1sen!2sus!4v1671220374408!5m2!1sen!2sus"
                                    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                                </iframe>
                            </div>
                        </div>

                        <div class="tags ">

                            <div class="tags__body  text-center">
                                <?php if (
                                    $data->type == 'Maison' or
                                    $data->type == 'Appartement'
                                ) { ?>
                                <div class="tag">
                                    <i class="fas fa-shower"></i> Douches:{{ $data->bathrooms }}
                                </div>

                                <hr>

                                <div class="tag">
                                    <i class="bi bi-tv"></i>salons: {{ $data->living_rooms }}
                                </div>

                                <hr>
                                <div class="tag">
                                    <i class="fas fa-warehouse"></i> Magasins: {{ $data->warehouses }}
                                </div>

                                <hr>
                                <div class="tag">
                                    <i class="bi bi-car-front"></i> Garages: {{ $data->parkings }}
                                </div>

                                <hr>
                                <?php } elseif (
                                    $data->type == 'Terrain' ||
                                    $data->type == 'Magasin'
                                ) { ?>
                                <div class="">
                                    <hr>
                                    <div class="tag">
                                        <i class="bi bi-arrows-angle-expand"></i> Superficie:
                                        {{ number_format($data->size, 0, '', ' ') }} m²

                                    </div>
                                    <hr>
                                </div>
                                <?php } else { ?>
                                <div class="tag">
                                    <i class="fas fa-layer-group"></i> Superficie: {{ $data->size }} m²
                                </div>
                                <?php } ?>

                            </div>

                            <div class="tags__btn text-center">
                                <i class="bi bi-caret-down mx-auto" onclick='showTag1()'></i>
                            </div>
                        </div> <br>

                        <Tags>

                        </Tags>
                    </div>

                    <div class="col-sm-12 col-md-9">
                        <div class="ad">
                            <div class="container">
                                <div class="row">
                                    <div class="ad__heading">
                                        <h2 class='text-left'>
                                            {{ $data->name }}
                                        </h2>

                                        <span class="price">
                                            {{ number_format($data->price, 0, '', ' ') }} XOF
                                        </span>
                                    </div>

                                    <div class="ad__body">
                                        <div class="ad__body__img">
                                            <img src="{{ asset('img/ads/'.$data->pic1) }}" alt='immobilier benin'
                                                class="images_ad mt-3">
                                        </div>

                                        <div class="ad__body__images">

                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-sm-6 col-md-3">
                                                        @if(!empty($data->pic3))
                                                        <img src="{{ asset('img/ads/'.$data->pic2) }}"
                                                            alt='immobilier benin' class="images_ad mt-3">
                                                    </div>
                                                    @else
                                                    <img src="{{ asset('img/ads/logo.jpg') }}"
                                                        alt='acheter maison au benin' class="images_ad mt-3">
                                                    @endif

                                                    <div class="col-sm-6 col-md-3">
                                                        @if(!empty($data->pic3))
                                                        <img src="{{ asset('img/ads/'.$data->pic2) }}"
                                                            alt='immobilier benin' class="images_ad mt-3">
                                                    </div>
                                                    @else
                                                    <img src="{{ asset('img/ads/logo.jpg') }}"
                                                        alt='acheter maison au benin' class="images_ad mt-3">
                                                    @endif

                                                    <div class="col-sm-6 col-md-3">
                                                        @if(!empty($data->pic3))
                                                        <img src="{{ asset('img/ads/'.$data->pic2) }}"
                                                            alt='immobilier benin' class="images_ad mt-3">
                                                    </div>
                                                    @else
                                                    <img src="{{ asset('img/ads/logo.jpg') }}"
                                                        alt='acheter maison au benin' class="images_ad mt-3">
                                                    @endif


                                                    <div class="col-sm-6 col-md-3">
                                                        @if(!empty($data->pic3))
                                                        <img src="{{ asset('img/ads/'.$data->pic2) }}"
                                                            alt='immobilier benin' class="images_ad mt-3">
                                                    </div>
                                                    @else
                                                    <img src="{{ asset('img/ads/logo.jpg') }}"
                                                        alt='acheter maison au benin' class="images_ad mt-3">
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                        <div class="ad__body__text">
                                            <h3>
                                                Description
                                            </h3>
                                            <p class="text text-grey text-left">
                                                <i class="bi-bookmark-fill"></i> En vente <br> <br>

                                                {{$data->description }}
                                            </p>
                                        </div>

                                        <hr>

                                        <div class="ad__body__more-infos">
                                            <h3 class="">
                                                Informations supplémentaires
                                            </h3>

                                            <div class="infos">
                                                <div class="info">
                                                    <i class="fas fa-calendar"></i>
                                                    {{ \Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}
                                                </div>

                                                <div class="info">
                                                    <i class="bi bi-eye"></i> {{ $data->views }} vues
                                                </div>
                                            </div>
                                        </div>

                                        <hr>

                                        <div class="agent">
                                            <div class="agent__heading">
                                                <h3>
                                                    Annonceur
                                                </h3>
                                            </div>
                                            <div class="agent__infos">
                                                <div class="agent__infos__list">
                                                    <h4>
                                                        {{ $data->seller_name}}
                                                    </h4>

                                                    <div class="agent-contact">


                                                        <div class="share-btn phone">
                                                            <i class="bi bi-phone"></i>
                                                        </div>

                                                        {{  $data->users_phone }}

                                                    </div>
                                                </div>
                                            </div>
                                        </div> <br>
                                        <div class="agent">
                                            <div class="agent__heading">
                                                <h3>
                                                    Partager cette annonce
                                                </h3>
                                            </div>
                                            <div class="agent__infos">
                                                <div class="agent__infos__list">
                                                    <div class="agent-contact">

                                                        <div class="share-btn whatsapp">
                                                            <a
                                                                :href="'https://wa.me/?text=Bonjour,%votre%annonce%sur%Immobilier%Bénin%...'">
                                                                <i class="fab fa-whatsapp"></i>
                                                            </a>
                                                        </div>

                                                        <div class="share-btn mail">
                                                            <a href="">
                                                                <i class="bi bi-facebook"></i>
                                                            </a>
                                                        </div>

                                                        <div class="share-btn mail">
                                                            <a href="">
                                                                <i class="bi bi-envelope"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>

                        <hr>


                    </div>
                </div>
            </div>
        </section>
    </div>
</x-app-layout>