<!-- Modal -->
<div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tarik Data Presensi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form action="{{ route('payroll.proses', ['tab'=>'get_payroll', 'id' => 'all']) }}" method="POST">
        @csrf
        <div class="modal-body">
            <label for="">Pilih Periode</label>
            <input type="text" name="periode" id="" autocomplete="off" required placeholder="Pilih Periode" class="datepicker form-control">                
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Proses</button>
        </div>
    </form>
    </div>
</div>
</div>