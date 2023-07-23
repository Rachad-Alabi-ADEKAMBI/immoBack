<x-app-layout>

    <main class="main">
        <div class="container">
            <div class="row dashboard">
                <div class="col-sm-12 col-md-3 dashboard__menu">
                    @include('pages/back/menu')
                </div>
                <div class="col-sm-12 col-md-9 dashboard__content">
                    <my-ads :img_url="'{{ env('IMG_URL') }}'" />
                </div>
            </div>
        </div>
    </main>
</x-app-layout>