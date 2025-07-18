<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // quick info today and one month ahead schedules
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        $end = Carbon::tomorrow()->addMonth()->endOfDay();
        
        $schedules = Schedule::whereDate('date', $today)->orderBy('date', 'asc')->get();
        $schedulesNextMonth = Schedule::whereDate('date', '>', $today)
            ->whereDate('date', '<=', $end)
            ->orderBy('date', 'asc')
            ->get();
        $schedulesTomorrow = Schedule::whereDate('date', $tomorrow)->get();

        // graph data for 1 month
        $startDate = Carbon::now()->subDays(30)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        // Ambil jumlah agenda per tanggal
        $agendas = Schedule::selectRaw('DATE(date) as day, COUNT(*) as total')
            ->whereBetween('date', [$startDate, $endDate])
            ->groupBy(DB::raw('DATE(date)'))
            ->orderBy('day')
            ->get()
            ->pluck('total', 'day');

        // Siapkan array lengkap untuk grafik
        $chartData = [];
        $current = $startDate->copy();

         while ($current <= $endDate) {
            $originalDate = $current->format('Y-m-d'); // untuk kunci pencocokan
            $formattedDate = $current->format('d-m');  // untuk label grafik

            $chartData[] = [
                'x' => $formattedDate,
                'y' => $agendas[$originalDate] ?? 0
            ];

            $current->addDay();
        }

        return view('dashboard', compact('schedules', 'schedulesNextMonth', 'chartData', 'schedulesTomorrow'));
    }
    
    public function landingPage()
    {
        $today = Carbon::today()->startOfDay();
        $start = Carbon::tomorrow()->startOfDay();
        $end = Carbon::tomorrow()->addMonth()->endOfDay();
        
        $schedules = Schedule::whereDate('date', '=', Carbon::today())->where('access_level', 'PUBLIK')->get();
        $schedulesNextMonth = Schedule::whereDate('date', '>', $today)
            ->whereDate('date', '<=', $end)
            ->where('access_level', 'PUBLIK')
            ->orderBy('date', 'asc')
            ->get();
        $contacts = Contact::all();

        return view('landingPage', compact('schedules', 'schedulesNextMonth', 'contacts'));
    }
}
