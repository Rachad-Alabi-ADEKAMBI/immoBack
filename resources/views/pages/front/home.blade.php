<x-app-layout>

    <div class="">
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
        <Home />
    </div>
</x-app-layout>