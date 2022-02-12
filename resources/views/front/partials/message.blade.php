
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
        <strong>Success!</strong>{{ session('success') }}.
        
    </div>
@endif


@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
        <strong>Error!</strong>{{ session('error') }}.
        
    </div>
@endif
