@extends('layouts.app')
@section('title')
    Payroll
@endsection
@push('css')
<link rel="stylesheet" href="{{ url('../assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}">
@endpush

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Payroll</h1>
    <a href="javascript:;" data-toggle="modal" data-target="#attendanceModal" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Tarik Data Presensi</a>
    </div>
    @include('app.payroll.add_modal')   

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <form method="GET" class="w-25 ml-auto" action="">
                    <div class="input-group mb-3">
                      <input type="text" name="periode" id="" autocomplete="off" value="{{ $periode }}" placeholder="Pilih Periode" class="datepicker form-control">
                      <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama Pegawai</th>
                      <th>Jabatan</th>
                      <th>Gaji Diterima</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse ($pegawai as $item => $value)
                      <tr>
                          <td>{{ $value->name }}</td>
                          <td>{{ $value->position }}</td>
                          <td class="text-right">Rp {{ number_format($value->total_accepted,0,'.','.') }}</td>
                          <td>
                            @if ($value->is_verified == 0)
                              <span class="badge badge-warning">Belum di Verifikasi</span>
                            @else
                              <span class="badge badge-success">Sudah di Verifikasi</span>                                
                            @endif
                          </td>
                          <td>
                            @if (Auth::user()->role_id === 2)
                              @if ($value->is_verified == 0)
                                <a href="javascript:;" onclick="verifikasi({{ $value->id }}, 'verifikasi_form')" class="btn btn-primary btn-sm btn-circle" title="Verifikasi"><i class="fas fa-check"></i></a>
                              @endif
                            @else
                              <a href="{{ route('payroll.info', ['tab' => 'print_pdf', 'id' => $value->id]) }}" target="_blank" class="btn btn-warning btn-sm btn-circle" title="Export PDF"><i class="fas fa-print"></i></a>
                              <a href="{{ route('payroll.info', ['tab' => 'print_image', 'id' => $value->id]) }}" target="_blank" class="btn btn-warning btn-sm btn-circle" title="Export Gambar"><i class="fas fa-download"></i></a>
                            @endif
                          </td>
                      </tr>
                    @empty
                      <tr>
                        <td colspan="5" class="text-center">Tidak ada data / Pilih Periode lainnya</td>
                        <h5 class="text-center"></h5>
                      </tr>
                    @endforelse
                  </tbody>
                </table>
                <form action="{{ route('overtime.delete') }}" method="POST" id="delete_form">
                    @csrf
                    <input type="hidden" id="delete_id" name="id">
                </form>
                <form action="{{ route('payroll.proses', ['tab'=>'verifikasi','id'=>'all']) }}" method="POST" id="verifikasi_form">
                    @csrf
                    <input type="hidden" id="verifikasi_id" name="id">
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
<script src="{{ url('../assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
<script>
$(function() {
    $(".datepicker").datepicker( {
      format: "yyyy-mm",
      startView: "months", 
      minViewMode: "months"
  });
});
function verifikasi(id, target='verifikasi_form'){
    Swal.fire({
        title: 'Anda yakin?',
        text: "Data yang sudah diverifikasi tidak dapat dikembalikan!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Verifikasi!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.value) {
            $('#verifikasi_id').val(id)
            $('#'+target).submit();
        }
    });
}
</script>
@endpush