<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
    {
        $pegawai = Employee::where('active', 'ON')->get();
        $data = Attendance::latest()->get();

        return view('app.attendance.index', compact('data','pegawai'));
    }

    public function proses(Request $request, $tab = 'new', $id = 'all')
    {
        $message_validation = [
            'employee_id.required' => 'Pegawai belum dipilih',
            'hari_kerja.required' => 'Hari Kerja belum dipilih',
        ];
        if ($tab === 'new') {
            $this->validate($request, [
                'employee_id' => 'required',
                'hari_kerja' => 'required',
            ], $message_validation);
            
            $this->generate_absen($request);
            
            $action = 'added';
        } elseif ($tab === 'edit') {
            $field = Attendance::find($id);
            $field->update($request->all());
            $action = 'edit';
        }

        $message['type'] = 'success';
        $message['content'] = "Absen berhasil digenerate";
        if ($action == 'edit') {
            $message['content'] = "Absen berhasil diubah";
        }

        return redirect()->route('attendance.index')
        ->with('message', $message);
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        if (!empty($id)) {
            $data = Attendance::find($id);
            $data->delete();
        }
        $message['type'] = 'success';
        $message['content'] = "Absen berhasil dihapus";
        return redirect()->route('attendance.index')
        ->with('message', $message);
    }

    public function generate_absen($request)
    {
        $slice_hari = explode('-', $request->hari_kerja);
        $date_mounth = date('Y-m', strtotime($slice_hari[0]));
        $day_start = date('d', strtotime($slice_hari[0]));
        $day_end = date('d', strtotime($slice_hari[1]));

        $int_day_start = intval($day_start);
        $int_day_end = intval($day_end);
        
        for($int_day_start; $int_day_start<= $int_day_end; $int_day_start++){
            $date_week = $date_mounth.'-'. $int_day_start;
            if(date('N', strtotime($date_week)) < 6){
                $pegawai = Attendance::firstOrNew([
                    'employee_id' => $request->employee_id,
                    'date' => $date_mounth.'-'. $int_day_start
                ]);
                $pegawai->time_in = $request->time_in;
                $pegawai->time_out = $request->time_out;
                $pegawai->flag_attendance = 1;
                $pegawai->description = 'Hadir';
                $pegawai->save();
            }
        }
    }
}
