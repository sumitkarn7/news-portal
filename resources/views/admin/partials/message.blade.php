
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Success!</strong>{{ session('success') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>Error!</strong>{{ session('error') }}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
@endif
