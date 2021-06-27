@extends('layouts.app')
@section('title')
    Data Pegawai
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Pegawai</h1>
    <a href="{{ route('employee.info', ['tab' => 'new', 'id'=>'all']) }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pegawai</a>
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
                      <th>NIP</th>
                      <th>Nama</th>
                      <th>TTL</th>
                      <th>Jabatan</th>
                      <th>Gaji</th>
                      <th>Tunjangan</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $key => $value)
                        <tr>
                            <td>{{ $value->nip }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->place_birth }},{{ date('d-m-Y', strtotime($value->date_birth)) }}</td>
                            <td>{{ $value->position }}</td>
                            <td class="text-right">{{ number_format($value->salary,0,',','.') }}</td>
                            <td class="text-right">{{ number_format($value->allowance,0,',','.') }}</td>
                            <td>
                                <a href="{{ route('employee.info', ['tab'=>'edit', 'id'=> $value->id]) }}" class="btn btn-warning btn-sm btn-circle" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="javascript:;" onclick="deleteData({{ $value->id }}, 'delete_form')" class="btn btn-danger btn-sm btn-circle" title="Hapus"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach
                        
                  </tbody>
                </table>
                <form action="{{ route('employee.delete') }}" method="POST" id="delete_form">
                    @csrf
                    <input type="hidden" id="delete_id" name="id">
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

