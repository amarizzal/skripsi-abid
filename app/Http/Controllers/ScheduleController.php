<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
class ScheduleController extends Controller
{
    public function index(Request $request)
    {
        // Default start & end date = hari ini
       $startDate = $request->input('start_date', Carbon::today()->toDateString());
        $endDate   = $request->input('end_date'); // boleh null

    $schedules = Schedule::query()
        ->when(
            $request->filled('filter') && $request->filter !== 'all',
            fn ($query) => $query->where('disposition', $request->filter)
        )
        ->where('date', '>=', Carbon::parse($startDate)->startOfDay())
        ->when(
            $endDate,
            fn ($query) => $query->where(
                'date',
                '<=',
                Carbon::parse($endDate)->endOfDay()
            )
        )
        ->orderBy('date', 'asc')
        ->paginate(10)
        ->withQueryString();
        return view('schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('schedules.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'place' => 'required|string',
            'description' => 'nullable|string',
            'content' => 'required|string',
            'dresscode' => 'required|string',
            'audience' => 'required|in:INTERNAL,EKSTERNAL',
            // 'disposition' => 'required|in:AGENDAKAN,DIWAKILI,DITUNDA,DIBATALKAN',
            'access_level' => 'required|in:PUBLIK,RAHASIA',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'file' => 'nullable|file',
        ]);

        $data = $request->except(['file', 'date', 'time', 'disposition']);

        // Gabungkan menjadi datetime string
        $data['date'] = $request->date . ' ' . $request->time;
        $data['disposition'] = 'MENUNGGU DIKONFIRMASI'; // Default disposition

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('schedules', 'public');
        } else {
            // $data['file'] = null;
        }

        
        try {
            Schedule::create($data);
        } catch (\Exception $e) {
            return redirect()->route('schedules.index')->with('error', 'Agenda gagal ditambahkan. ' . $e->getMessage());
        }


        return redirect()->route('schedules.index')->with('success', 'Agenda berhasil ditambahkan.');
    }

    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }

    public function edit(Schedule $schedule)
    {
        return view('schedules.edit', compact('schedule'));
    }

    public function update(Request $request, Schedule $schedule)
    {
        $request->validate([
            'place' => 'required|string',
            'content' => 'required|string',
            'dresscode' => 'required|string',
            'audience' => 'required|in:INTERNAL,EKSTERNAL',
            'disposition' => 'required|in:MENUNGGU DIKONFIRMASI,AGENDAKAN,DIWAKILI,DITUNDA,DIBATALKAN',
            'access_level' => 'required|in:PUBLIK,RAHASIA',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'file' => 'nullable|file',
        ]);

        $data = $request->except('file', 'date', 'time', 'disposition');

        // Gabungkan menjadi datetime string
        $data['date'] = $request->date . ' ' . $request->time;
        $data['disposition'] = $request->disposition;

        if ($request->hasFile('file')) {
            if ($schedule->file) {
                Storage::delete($schedule->file);
            }
            $data['file'] = $request->file('file')->store('schedules');
        }

        $schedule->update($data);
        // dd($data);

        return redirect()->route('schedules.index')->with('success', 'Agenda berhasil diubah.');
    }

    public function updateDisposition(Request $request, Schedule $schedule)
    {
        $request->validate([
            'disposition' => 'required|in:MENUNGGU DIKONFIRMASI,AGENDAKAN,DIWAKILI,DITUNDA,DIBATALKAN',
        ]);

        $data = $request->except('disposition');

        // Gabungkan menjadi datetime string
        $data['disposition'] = $request->disposition;
        $data['ket_dispo'] = $request->ket_dispo;

        $schedule->update($data);

        return redirect()->route('schedules.index')->with('success', 'Disposisi agenda berhasil diubah.');
    }

    public function destroy(Schedule $schedule)
    {
        if ($schedule->file) {
            Storage::delete($schedule->file);
        }

        $schedule->delete();

        return redirect()->route('schedules.index')->with('success', 'Agenda berhasil dihapus.');
    }

    public function downloadPDF(Request $request)
    {
        $startDate = $request->start_date ?? now()->format('Y-m-d');
        $endDate   = $request->end_date   ?? now()->format('Y-m-d');

        $schedules = Schedule::when($request->filter && $request->filter != 'all', function($q) use ($request) {
                $q->where('disposition', $request->filter);
            })
            ->whereBetween('date', [$startDate.' 00:00:00', $endDate.' 23:59:59'])
            ->orderBy('date', 'asc')
            ->get();

        $pdf = Pdf::loadView('schedules.pdf', compact('schedules', 'startDate', 'endDate'));

        return $pdf->download('agenda_'.$startDate.'_to_'.$endDate.'.pdf');
    }
}
