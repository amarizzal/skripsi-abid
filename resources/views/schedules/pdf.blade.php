<!DOCTYPE html>
<html>
<head>
    <title>Daftar Agenda</title>
    <style>
        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #000; padding:5px; text-align:left; }
        th { background-color:#eee; }
    </style>
</head>
<body>
    <h3>Daftar Agenda ({{ $startDate }} s/d {{ $endDate }})</h3>
    <table>
        <thead>
            <tr>
                <th>Tanggal & Waktu</th>
                <th>Agenda</th>
                <th>Tempat & Dresscode</th>
                <th>Disposisi</th>
                <th>Level Akses & Peserta</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
            <tr>
                <td>{{ \Carbon\Carbon::parse($schedule->date)->format('d/m/Y H:i') }}</td>
                <td>{{ $schedule->content }}</td>
                <td>{{ $schedule->place }} - {{ $schedule->dresscode }}</td>
                <td>{{ $schedule->disposition }}</td>
                <td>{{ $schedule->access_level }} - {{ $schedule->audience }}</td>
                <td>{{ $schedule->description ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Dokumen ini dibuat oleh sistem e-schedule pada <strong>{{ \Carbon\Carbon::now()->format('d-m-Y H:i:s') }}</strong> oleh <strong>{{ auth()->user()->name }}</strong></p>
</body>
</html>
