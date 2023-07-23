<x-app-layout>
    <main class="main">
        <div class="container">
            @include('pages/back/success')
            @include('pages/back/errors')
            <div class="row dashboard">
                <div class="col-sm-12 col-md-3 dashboard__menu">
                    @include('pages/back/menu')
                </div>
                <div class="col-sm-12 col-md-9 dashboard__content">
                    <p>
                        Bonjour <strong> {{ Auth::user()->name }}</strong>
                    </p>

                    <?php if (auth()->user()->role === 'user') { ?>
                    <user :img_url="'{{ env('IMG_URL') }}'" />
                    <?php } elseif (auth()->user()->role === 'admin') { ?>
                    <admin :img_url="'{{ env('IMG_URL') }}'" />
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>