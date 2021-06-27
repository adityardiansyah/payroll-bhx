<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payroll PDF</title>
    <link href="{{ asset('../assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        body{
            color: #000;
        }
    </style>
</head>
<body>
    <div id="capture" style="width: 30%; margin:auto; padding:16px;">
        <h3 style="text-align: center"><b>PT. Mekar Jaya</b></h3>
        <div  style="padding-top: 16px; margin:auto;">
            <p style="margin:0;">Nama : {{ $data->employee->name }}</p>
            <p style="margin:0;">Jabatan : {{ $data->employee->position }}</p>
            <p style="margin:0;">Periode : {{ $data->periode }}</p>
        </div>
        <table style="padding-top: 16px; width:100%; margin-top:16px">
            <tr>
                <td colspan="3">A. Upah Tetap</td>
            </tr>
            <tr>
                <td width="160">- Gaji Pokok</td>
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
    </div>
    <div class="text-center mt-5">
        <button class="btn btn-primary" id="cetak">Download</button>
    </div>
    
    <script src="{{ asset('../assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('../assets/vendor/html2canvas.min.js') }}"></script>
    <script>
        setUpDownloadPageAsImage();

        function setUpDownloadPageAsImage() {
        document.getElementById("cetak").addEventListener("click", function() {
            html2canvas(document.getElementById('capture')).then(function(canvas) {
            simulateDownloadImageClick(canvas.toDataURL(), 'file-name.png');
            });
        });
        }

        function simulateDownloadImageClick(uri, filename) {
        var link = document.createElement('a');
        if (typeof link.download !== 'string') {
            window.open(uri);
        } else {
            link.href = uri;
            link.download = filename;
            accountForFirefox(clickLink, link);
        }
        }

        function clickLink(link) {
            link.click();
        }

        function accountForFirefox(click) { 
            let link = arguments[1];
            document.body.appendChild(link);
            click(link);
            document.body.removeChild(link);
        }
    </script>
</body>
</html>