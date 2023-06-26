<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Annonces gratuites de vente et location immobilier au Benin') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.bunny.net">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href=" {{ asset('scss/main.css') }} " />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/x-icon" href="{{ asset('/img/logo.ico')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <meta name='description'
        content="site web d'annonces gratuites de vente et location de biens immobiliers au benin" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="robots" content='index, follow'>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo-transparent.png') }}" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav  mx-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">{{ __('Accueil') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/ads">{{ __('Annonces') }}</a>
                        </li>
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">{{ __('Tableau de bord') }}</a>
                        </li>
                        @endauth

                        <li class="nav-item">
                            <a class="nav-link" href="/sellers">{{ __('Agents') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/contact">{{ __('Contact') }}</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                        @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                        </li>
                        @endif

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 main">
            {{ $slot}}
        </main>

        <footer class="footer mt-5">
            <div class=" container ">
                <div class="row pt-3 text-left text-white fw-bold">
                    <div class="col-sm-12 col-md-4">
                        <img src="/img/logo-transparent.png" alt=""> <br>

                        <p>
                            <i class="fas fa-envelope"></i>
                            contact@immobilierbenin.com
                        </p>
                    </div>

                    <div class="col-sm-12 col-md-4">
                        <h4>CATEGORIES</h4>

                        <p>
                            <a href="/appartments" class="">
                                <i class="bi bi-building"></i> Appartements
                            </a>
                            <br>
                            <a href="/houses" class="">
                                <i class="bi bi-house"></i> Maisons
                            </a> <br>
                            <a href="/lands" class="">
                                <i class="bi bi-signpost"></i> Terrains
                            </a> <br>

                            <a href="/ads" class="">
                                <i class="fas fa-arrow-right"></i> Tout voir
                            </a>

                        </p>
                    </div>

                    <div class="col-sm-12 col-md-4 ml-0">
                        <p>
                        <h4 class=" ml-0 text-left">LIENS </h4>


                        <a href="/about" class="">
                            <i class="fas fa-arrow-right"></i> A-propos
                        </a> <br>
                        <a href="/contact">
                            <i class="fas fa-arrow-right"></i> Contact
                        </a><br>
                        <a href="/terms">
                            <i class="fas fa-arrow-right"></i>CGU
                        </a> <br>
                        <a href="/policy">
                            <i class="fas fa-arrow-right"></i> Politique de confidentialité
                        </a>

                        </p>
                    </div>
                </div>

                <hr>

                <div class="row">
                    <div class="col-6">
                        <p>2022 ImmobilierBenin - Tous droits réservés</p>
                    </div>

                    <div class="col-6">
                        <a href="#app">
                            <div class="up">

                                <i class="fas fa-caret-up"></i>

                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </footer>
    </div>
    <script src="{{asset('js/script.js') }}"></script>
</body>

</html>