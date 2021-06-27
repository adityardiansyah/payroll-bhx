@extends('layouts.app')
@section('title')
    Data Absensi
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endpush
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Absensi</h1>
    <a href="javascript:;" data-toggle="modal" data-target="#attendanceModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Absensi</a>
    </div>
    @include('app.attendance.add_modal')

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Nama Pegawai</th>
                      <th>Waktu Masuk</th>
                      <th>Waktu Keluar</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $key => $value)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                            <td>{{ $value->employee->name }}</td>
                            <td>{{ $value->time_in }}</td>
                            <td>{{ $value->time_out }}</td>
                            <td class="text-center">
                              <a href="javascript:;" onclick="deleteData({{ $value->id }}, 'delete_form')" class="btn btn-danger btn-sm btn-circle" title="Hapus"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                <form action="{{ route('attendance.delete') }}" method="POST" id="delete_form">
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

@push('js')
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
  $('.daterange').daterangepicker();
</script>
@endpush