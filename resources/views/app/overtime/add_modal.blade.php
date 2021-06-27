<!-- Modal -->
<div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Formulir Lembur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ route('overtime.proses', ['tab'=>'new', 'id' => 'all']) }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pegawai</label>
                        <select name="employee_id" class="select2" required>
                            <option value="-">Pilih Pegawai</option>
                            @foreach ($pegawai as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tanggal</label>
                <input type="date" name="date" class="form-control" value="{{ date('d/m/Y')}}" id="">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Waktu Masuk</label>
                        <input type="time" name="time_in" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Waktu Keluar</label>
                        <input type="time" name="time_out" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="description" class="form-control" cols="30" rows="5"></textarea>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
    </div>
</div>
</div>