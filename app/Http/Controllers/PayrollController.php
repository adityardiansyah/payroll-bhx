<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Employee;
use App\Overtime;
use App\Payroll;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index(Request $request)
    {
        $periode = $request->periode;
        if(!empty($periode)){
            $pegawai = Employee::select('payrolls.id', 'payrolls.is_verified','employees.name', 'employees.position','payrolls.total_accepted')
            ->leftJoin('payrolls', 'payrolls.employee_id','employees.id')
            ->where('payrolls.periode', $periode)
            ->where('active', 'ON')->get();
        }else{
            $pegawai = [];
        }


        return view('app.payroll.index', compact('pegawai','periode'));
    }

    public function info(Request $request, $tab = 'new', $id='all')
    {
        $data = Payroll::find($id);
        if($tab === 'print_pdf'){
            $pdf = PDF::loadview('app.payroll.print', ['data' => $data]);
            return $pdf->stream();
        }elseif($tab === 'print_image'){
            return view('app.payroll.print_image', compact('data'));
        }
    }

    public function proses(Request $request, $tab = 'new', $id = 'all')
    {
        if ($tab === 'get_payroll') {
            $periode = $request->periode;
            $result = [];
            $data = [
                'employee_id' => '',
                'date' => '',
                'flag_attendance' => '',
                'description' => ''
            ];
            $hadir = [];
            $tidak_hadir = [];
            
            // tarik data pegawai
            $pegawai = Employee::select('id','salary','allowance')->where('active','ON')->get();
            foreach ($pegawai as $key => $value) {
                //looping dengan bulan 
                for ($i=1; $i <= date('t', strtotime($periode)); $i++) { 
                    $absen = Attendance::select('id')->where('employee_id', $value->id)
                    ->where('date', $periode.'-'.$i)
                    ->first();
                    // jika tidak absen
                    if(empty($absen)){
                        // status tidak hadir
                        if(date('N', strtotime($periode . '-' . $i)) < 6){
                            $data['employee_id'] = $value->id;
                            $data['date'] = $periode . '-' . $i;
                            $data['description'] = 'Tidak Hadir';
                            $data['flag_attendance'] = 0;
                            array_push($tidak_hadir, $data);
                            array_push($result, $data);
                        }else{
                            // status libur
                            $data['employee_id'] = $value->id;
                            $data['date'] = $periode . '-' . $i;
                            $data['flag_attendance'] = 0;
                            $data['description'] = 'Libur';
                            array_push($result, $data);
                        }

                    }else{
                        // status hadir
                        $data['employee_id'] = $value->id;
                        $data['date'] = $periode . '-' . $i;
                        $data['flag_attendance'] = 1;
                        $data['description'] = 'Hadir';
                        array_push($hadir, $data);
                        array_push($result, $data);
                    }
                }
                $overtime = Overtime::where('employee_id', $value->id)
                ->where('date','LIKE', $periode.'-%')
                ->get();

                $total_overtime = [];
                $upah_lembur_per_jam = $value->salary / 173;

                foreach ($overtime as $key1 => $value1) {
                    $jml_time = strtotime($value1->time_out) - strtotime($value1->time_in);
                    $jml_hours = $jml_time / ( 60 * 60 );
                    if($jml_hours > 4){
                        $jml_hours = $jml_hours * 2;
                    }
                    array_push($total_overtime, $jml_hours);
                }
                $group_nwmp = $this->countNwnp($tidak_hadir, $value->id) * $value->salary / 30;
                $lembur = intval($upah_lembur_per_jam * array_sum($total_overtime));
                $bpjs = ($value->salary + $value->allowance) * 3 / 100;
                $final = [
                    'employee_id' => $value->id,
                    'periode' => $periode,
                ];

                $pay = Payroll::firstOrNew($final);
                $pay->total_basic_salary = $value->salary;
                $pay->total_allowance = $value->allowance;
                $pay->total_overtime = $lembur;
                $pay->total_bpjs = $bpjs;
                $pay->total_nwnp = $group_nwmp;
                $pay->total_accepted = $value->salary + $value->allowance + $lembur - $group_nwmp - $bpjs;
                $pay->save();
            }
        }elseif($tab === 'verifikasi'){
            $data = Payroll::find($request->id);
            $data->update(['is_verified' => 1]);
        }

        $message['type'] = 'success';
        $message['content'] = "Data Presensi berhasil ditarik";
        if($tab === 'verifikasi'){
            $message['content'] = "Verifikasi Data payroll berhasil";
            return redirect()->back()
            ->with('message', $message);
        }

        return redirect()->route('payroll.index')
            ->with('message', $message);
    }

    public function countNwnp($data, $employee_id)
    {
        $group = 0;
        foreach ($data as $key => $value) {
            if($value['employee_id'] === $employee_id){
                $group = $group + 1;
            }
        }
        return $group;
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
