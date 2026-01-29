<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('img/logo.png')}}">
    <title>
      E-Schedule
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />

     <style>
        body {
            font-family: "Arial", sans-serif;
            font-size: 12pt;
            margin: 40px;
        }

        .kop-wrapper {
            position: relative;
            text-align: center;
            line-height: 1.4;
        }

        .kop-wrapper img {
            position: absolute;
            left: 0;
            top: 0;
        }

        .kop-wrapper h3,
        .kop-wrapper h4,
        .kop-wrapper p {
            margin: 0;
        }

        .divider {
            border-top: 1px solid #000;
            margin: 15px 0 30px 0;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 6px 4px;
            vertical-align: top;
        }

        .isi {
            margin-top: 30px;
            text-align: justify;
            white-space: pre-line;
        }
    </style>
  </head>

<body>
 <table width="100%" style="border-collapse: collapse;">
    <tr>
        <td width="15%" style="vertical-align: top;">
            <img src="{{ public_path('img/logo.png') }}" alt="Logo" style="width: 85px; height: auto;">
        </td>
        <td width="85%" style="text-align: center; vertical-align: top;">
            <h3 style="margin: 0; font-size: 12pt;">PEMERINTAH KABUPATEN MALANG</h3>
            <h4 style="margin: 0; font-size: 16pt;">SEKRETARIAT DAERAH</h4>
            <p style="margin: 0; font-size: 11pt;">
                Jalan Raden Panji Nomor 158 Kepanjen, Kabupaten Malang, Jawa Timur<br>
                Telepon/Faksimile (0341) 392024 &nbsp; Laman: malangkab.go.id<br>
                Pos-el: sekda@malangkab.go.id, Kode Pos 65163
            </p>
        </td>
    </tr>
</table>

    <hr style="border: 1px solid #000; margin: 15px 0 30px 0;">
    <!-- JUDUL -->
<div class="judul">
    NOTULA
</div>

<!-- IDENTITAS RAPAT -->
<table>
    <tr>
        <td width="30%">Hari/Tanggal</td>
        <td width="2%">:</td>
        <td>
            {{ \Carbon\Carbon::parse($notulen->schedule->date)
              ->locale('id')
              ->translatedFormat('l, d F Y') }}
        </td>
    </tr>
    <tr>
        <td>Waktu Sidang/Rapat</td>
        <td>:</td>
        <td>
            {{ \Carbon\Carbon::parse($notulen->schedule->date)->format('H:i') }} WIB
        </td>
    </tr>
    <tr>
        <td>Kegiatan Sidang/Rapat</td>
        <td>:</td>
        <td>
            {{ $notulen->schedule->content }}
        </td>
    </tr>
</table>



<p>{{ $notulen->content }}</p>

<br><br>

<p>Dokumen ini dibuat oleh sistem e-schedule pada <strong>{{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</strong> oleh <strong>{{ auth()->user()->name }}</strong></p>
</body>
</html>