<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        
        $schedules = Schedule::whereDate('date', $today)->get();
        $schedulesTomorrow = Schedule::whereDate('date', $tomorrow)->count();

        return view('dashboard', compact('schedules', 'schedulesTomorrow'));
    }
}
