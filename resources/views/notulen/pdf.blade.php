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
  </head>

<body>
  <div class="header" style="text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px;">
        <img src="{{ public_path('img/logo.png') }}" alt="Logo" style="width: 100px; height: auto;">
        
        <div style="display: inline-block; vertical-align: top; margin-left: 20px; text-align: left;">
            <h2 style="margin: 0;">PEMERINTAH KABUPATEN MALANG</h2>
            <h3 style="margin: 0; font-size: 16px;">SEKRETARIAT DAERAH KABUPATEN MALANG</h3>
            <p style="margin: 0; font-size: 12px;">Jalan Panji No. 158 Kepanjen, Kabupaten Malang, Telp 0341 392024, Website Malangkab.go.id</p>
        </div>
    </div>
    <h2>Notulen: {{ $notulen->schedule->content }}</h2>
    <h4 class="text-primary">{{ \Carbon\Carbon::parse($notulen->schedule->date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($notulen->schedule->date)->format('H:i') }}</h4>
    <h4 class="text-secondary">
        <strong>Tempat:</strong> {{ $notulen->schedule->place ?? 'Tempat tidak ditentukan' }}
    </h4>

    <br><br>



<p>{{ $notulen->content }}</p>

<br><br>

<p>Dokumen ini dibuat oleh sistem e-schedule pada <strong>{{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</strong> oleh <strong>{{ auth()->user()->name }}</strong></p>
</body>
</html>