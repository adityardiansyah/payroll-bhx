@extends('layouts.app')
@section('title')
    Pengajuan Lembur
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pengajuan Lembur</h1>
    <a href="javascript:;" data-toggle="modal" data-target="#attendanceModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pengajuan</a>
    </div>
    @include('app.overtime.add_modal')   
    @include('app.overtime.edit_modal')

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
                      <th>Waktu</th>
                      <th>Deskripsi</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($data as $key => $value)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($value->date)) }}</td>
                            <td>{{ $value->employee->name }}</td>
                            <td>{{ $value->time_in }} - {{ $value->time_out }}</td>
                            <td>{{ $value->description }}</td>
                            <td>
                              <a href="javascript:;" onclick="editData({{ $value->id }})" class="btn btn-warning btn-sm btn-circle" title="Edit"><i class="fas fa-edit"></i></a>
                              <a href="javascript:;" onclick="deleteData({{ $value->id }}, 'delete_form')" class="btn btn-danger btn-sm btn-circle" title="Hapus"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
                <form action="{{ route('overtime.delete') }}" method="POST" id="delete_form">
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
<script>
  function editData(id){
    $('#editOvetimeModal').modal('show');
    $.get("{{ url('api/get_overtime/') }}/"+id, function(result){
      console.log(result);
      let res = result.data;
      $('#id_overtime').val(res.id);
      $('#employee_id').val([res.employee_id]).trigger('change');
      $('#date').val(res.date);
      $('#time_in').val(res.time_in);
      $('#time_out').val(res.time_out);
      $('#description').val(res.description);
    });
  }
</script>
@endpush