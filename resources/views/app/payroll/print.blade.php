<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payroll PDF</title>
</head>
<body>
    <h3 style="text-align: center"><b>PT. Mekar Jaya</b></h3>
    <div  style="padding-top: 16px; width:50%; margin:auto;">
        <p style="margin:0;">Nama : {{ $data->employee->name }}</p>
        <p style="margin:0;">Jabatan : {{ $data->employee->position }}</p>
        <p style="margin:0;">Periode : {{ $data->periode }}</p>
    </div>
    <table style="padding-top: 16px; width:50%; margin:auto;">
        <tr>
            <td colspan="3">A. Upah Tetap</td>
        </tr>
        <tr>
            <td>- Gaji Pokok</td>
            <td>:</td>
            <td style="text-align: right;">Rp. {{ number_format($data->total_basic_salary,0,'.','.') }}</td>
        </tr>
        <tr>
            <td>- Tunjangan</td>
            <td>:</td>
            <td style="text-align: right;">Rp. {{ number_format($data->total_allowance,0,'.','.') }}</td>
        </tr>
        <tr>
            <td colspan="3">B. Upah Tidak Tetap</td>
        </tr>
        <tr>
            <td>- Lembur</td>
            <td>:</td>
            <td style="text-align: right;">Rp. {{ number_format($data->total_overtime,0,'.','.') }}</td>
        </tr>
        <tr>
            <td colspan="3">C. Potongan</td>
        </tr>
        <tr>
            <td>- BPJS</td>
            <td>:</td>
            <td style="text-align: right;">Rp. {{ number_format($data->total_bpjs,0,'.','.') }}</td>
        </tr>
        <tr>
            <td>- NWNP</td>
            <td>:</td>
            <td style="text-align: right;">Rp. {{ number_format($data->total_nwnp,0,'.','.') }}</td>
        </tr>
        <tr>
            <td colspan="3" style="padding-top:26px;"></td>
        </tr>
        <tr>
            <td>- Total Penerimaan</td>
            <td>:</td>
            <td style="text-align: right;">Rp. {{ number_format($data->total_accepted,0,'.','.') }}</td>
        </tr>
    </table>
</body>
</html>