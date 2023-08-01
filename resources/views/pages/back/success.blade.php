<div class="row success">
    <div class="col-sm-12 col-md-10 mx-auto">
        @if(session('success'))
        <div class="alert alert-success successMsg">
            <div class="top">
                <i class="fas fa-xmark right" onclick="closeSuccessMsg()"></i>
            </div>
            <p class="text text-center">
                {{ session('success') }}
            </p>
        </div>
        @endif
    </div>
</div>