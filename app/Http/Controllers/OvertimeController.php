<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Overtime;
use Illuminate\Http\Request;

class OvertimeController extends Controller
{
    public function index(Request $request)
    {
        $pegawai = Employee::where('active', 'ON')->get();
        $data = Overtime::latest()->get();

        return view('app.overtime.index', compact('data', 'pegawai'));
    }

    public function proses(Request $request, $tab = 'new', $id = 'all')
    {
        $message_validation = [
            'employee_id.required' => 'Pegawai belum dipilih',
            'date.required' => 'Tanggal belum dipilih',
            'time_in.required' => 'Jam Mulai belum dipilih',
            'time_out.required' => 'Jam Selesai belum dipilih',
        ];
        if ($tab === 'new') {
            $this->validate($request, [
                'employee_id' => 'required',
                'date' => 'required',
                'time_in' => 'required',
                'time_out' => 'required',
            ], $message_validation);

            $field = Overtime::create($request->all());

            $action = 'added';
        } elseif ($tab === 'edit') {
            $id_overtime = $request->id;
            $field = Overtime::find($id_overtime);
            $field->update($request->all());
            $action = 'edit';
        }

        $message['type'] = 'success';
        $message['content'] = "Lembur berhasil ditambahkan";
        if ($action == 'edit') {
            $message['content'] = "Lembur berhasil diubah";
        }

        return redirect()->route('overtime.index')
        ->with('message', $message);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (!empty($id)) {
            $data = Overtime::find($id);
            $data->delete();
        }
        $message['type'] = 'success';
        $message['content'] = "Absen berhasil dihapus";
        return redirect()->route('overtime.index')
        ->with('message', $message);
    }

}
