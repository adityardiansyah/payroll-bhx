@extends('layouts.app')
@section('title')
    Role
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Role</h1>
    {{-- <a href="{{ route('user.info', ['tab' => 'new', 'id'=>'all']) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Role</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th width="30px">No</th>
                      <th>Nama</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $key => $value)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $value->name }}</td>
                        </tr>
                      @endforeach
                        
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

