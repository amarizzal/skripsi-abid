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
    <h2>Notulen: {{ $notulen->schedule->content }}</h2>
    <h4 class="text-primary">{{ \Carbon\Carbon::parse($notulen->schedule->date)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($notulen->schedule->date)->format('H:i') }}</h4>

    <br><br>



<p>{{ $notulen->content }}</p>

<br><br>

<p>Dokumen ini dibuat oleh sistem e-schedule pada <strong>{{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</strong> oleh <strong>{{ auth()->user()->name }}</strong></p>
</body>
</html>