@extends('layouts.app')
@section('title')
    Tambah Pegawai
@endsection

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">@if($tab === 'new') Tambah @else Ubah  @endif Pegawai</h1>
    <a href="{{ route('employee.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-light shadow-sm"><i class="fas fa-arrow-left fa-sm"></i> Kembali</a>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    @include('partials.error')
                    <form method="POST" action="{{ route('employee.proses', ['tab'=>$tab, 'id'=>$id]) }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">NIP</label>
                                    <input type="number" class="form-control" name="nip" id="nip" value="{{ ($tab==='edit')? $data->nip : old('nip') }}" required placeholder="Enter nip">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{ ($tab==='edit')? $data->name : old('name') }}" required placeholder="Enter nama">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Tempat Lahir</label>
                                    <input type="text" class="form-control" name="place_birth" id="place_birth" value="{{ ($tab==='edit')? $data->place_birth : old('place_birth') }}" required placeholder="Enter tempat lahir">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="name" name="date_birth" value="{{ ($tab==='edit')? $data->date_birth : old('date_birth') }}" required placeholder="Enter tanggal lahir">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="jk">Jenis Kelamin</label>
                                    <select name="gender" class="form-control" id="">
                                        <option value="-">Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki" @if($tab == 'edit') {{ ($data->gender === 'Laki-Laki')? 'selected' : '' }} @endif>Laki-Laki</option>
                                        <option value="Perempuan" @if($tab == 'edit') {{ ($data->gender === 'Perempuan')? 'selected' : '' }} @endif>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Jabatan</label>
                                    <input type="text" class="form-control" id="position" name="position" value="{{ ($tab==='edit')? $data->position : old('position') }}" required placeholder="Enter jabatan">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Gaji Pokok</label>
                                    <input type="text" class="form-control" id="salary" name="salary" value="{{ ($tab==='edit')? $data->salary : old('salary') }}" required placeholder="Enter gaji pokok">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tunjangan</label>
                                    <input type="text" class="form-control" id="allowance" name="allowance" value="{{ ($tab==='edit')? $data->allowance : old('allowance') }}" required placeholder="Enter tunjangan">
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
          </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection

      