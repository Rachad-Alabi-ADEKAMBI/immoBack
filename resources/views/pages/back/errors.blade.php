<div class="row error">
    <div class="col-sm-12 col-md-10 mx-auto">
        @if(session('error'))
        <div class="alert alert-error errorMsg">
            <div class="top">
                <i class="fas fa-xmark right" onclick="closeerrorMsg()">close</i>
            </div>
            <p class="text text-center">
                {{ session('error') }}
            </p>
        </div>
        @endif
    </div>
</div>