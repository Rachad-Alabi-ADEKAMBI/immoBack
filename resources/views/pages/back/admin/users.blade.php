<x-app-layout>
    <section>
        @if(session('success'))
        <div class="alert alert-success successMsg">
            <div class="top">
                <i class="fas fa-xmark" onclick="closeSuccessMsg()"></i>
            </div>
            <p class="text text-center">
                {{ session('success') }}
            </p>
        </div>
        @endif
    </section>
    <main class="main">
        <div class="container">
            <div class="row dashboard">
                <div class="col-sm-12 col-md-3 dashboard__menu">
                    @include('pages/back/menu')
                </div>
                <div class="col-sm-12 col-md-9 dashboard__content">
                    <users />
                </div>
            </div>
        </div>
    </main>
</x-app-layout>