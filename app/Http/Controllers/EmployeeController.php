<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use App\Overtime;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $data = Employee::latest()->get();

        return view('app.employee.index', compact('data'));
    }

    public function info($tab='new', $id='all')
    {
        $data = '';
        if($tab === 'edit'){
            $data = Employee::find($id);
        }

        return view('app.employee.info', compact('tab','id', 'data'));
    }

    public function proses(Request $request, $tab='new', $id='all')
    {
        $message_validation = [
            'nip.required' => 'NIP tidak boleh kosong',
            'nip.unique' => 'NIP sudah digunakan',
            'nip.max' => 'Karakter NIP melebihi 255',
            'name.required' => 'Nama tidak boleh kosong',
            'name.max' => 'Karakter nama melebihi 255',
        ];
        if($tab === 'new'){
            $this->validate($request,[
                'nip' => 'required|unique:employees|max:255',
                'name' => 'required|max:255',
            ], $message_validation);
            $field = Employee::create($request->all());
            $action = 'added';
        }elseif($tab === 'edit'){
            $field = Employee::find($id);
            $field->update($request->all());
            $action = 'edit';
        }

        $message['type'] = 'success';
        $message['content'] = "Pegawai berhasil ditambahkan";
        if($action == 'edit'){
            $message['content'] = "Pegawai berhasil diubah";
        }

        return redirect()->route('employee.index')
        ->with('message', $message);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if(!empty($id)){
            $data = Employee::find($id);
            if(!empty($data)){
                // Hapus data pegawai di absensi
                Attendance::where('employee_id', $id)->delete();

                // Hapus data pegawai di tabel lembur
                Overtime::where('employee_id', $id)->delete();

                // Hapus data pegawai
                $data->delete();
            }
        }
        $message['type'] = 'success';
        $message['content'] = "Pegawai berhasil dihapus";
        return redirect()->route('employee.index')
        ->with('message', $message);
    }
}
