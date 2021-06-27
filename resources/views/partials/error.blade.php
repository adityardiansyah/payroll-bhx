@if(session('errors'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Terjadi kesalahan :
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
@endif