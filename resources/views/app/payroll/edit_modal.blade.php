<!-- Modal -->
<div class="modal fade" id="editOvetimeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Lembur</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ route('overtime.proses', ['tab'=>'edit', 'id' => 'all']) }}" method="POST">
        @csrf
        <input type="hidden" id="id_overtime" name="id">
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pegawai</label>
                        <select name="employee_id" class="select2" id="employee_id" required>
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
                <input type="date" name="date" class="form-control" id="date">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Waktu Masuk</label>
                        <input type="time" name="time_in" id="time_in" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Waktu Keluar</label>
                        <input type="time" name="time_out" id="time_out" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Deskripsi</label>
                <textarea name="description" class="form-control" id="description" cols="30" rows="5"></textarea>
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