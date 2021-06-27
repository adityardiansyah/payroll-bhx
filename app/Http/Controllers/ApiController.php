<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use App\Overtime;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function get_overtime($id)
    {
        if(!empty($id)){
            try {
                $data = Overtime::find($id);
    
                return response()->json([
                    'error' => false,
                    'data' => $data
                ], 200);
            } catch (\Throwable $th) {
                return response()->json([
                    'error' => true,
                    'data' => $th->getMessage()
                ], 500);
            }
        }
    }

    public function get_nwnp(Request $request)
    {
        $periode = $request->periode;
        $data = [
            'employee_id' => '',
            'date' => '',
            'flag_attendance' => '',
            'description' => ''
        ];
        $tidak_hadir = [];

        // tarik data pegawai
        $pegawai = Employee::select('id', 'salary', 'allowance')->where('active', 'ON')->get();
        foreach ($pegawai as $key => $value) {
            //looping dengan bulan 
            for ($i = 1; $i <= date('t', strtotime($periode)); $i++) {
                $absen = Attendance::select('id')->where('employee_id', $value->id)
                    ->where('date', $periode . '-' . $i)
                    ->first();
                // jika tidak absen
                if (empty($absen)) {
                    // status tidak hadir
                    if (date('N', strtotime($periode . '-' . $i)) < 6) {
                        $data['employee_id'] = $value->id;
                        $data['date'] = $periode . '-' . $i;
                        $data['description'] = 'Tidak Hadir';
                        $data['flag_attendance'] = 0;
                        array_push($tidak_hadir, $data);
                    } 
                }
            }
        
        }
        return $tidak_hadir;
    }
}
