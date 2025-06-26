<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        
        $schedules = Schedule::whereDate('date', $today)->orderBy('date', 'asc')->get();
        $schedulesTomorrow = Schedule::whereDate('date', $tomorrow)->count();
        
        return view('dashboard', compact('schedules', 'schedulesTomorrow'));
    }
    
    public function landingPage()
    {
        $today = Carbon::today();
        $tomorrow = Carbon::tomorrow();
        
        $schedules = Schedule::whereDate('date', $today)->orderBy('date', 'asc')->get();
        $schedulesTomorrow = Schedule::whereDate('date', $tomorrow)->orderBy('date', 'asc')->get();
        $contacts = Contact::all();

        return view('landingPage', compact('schedules', 'schedulesTomorrow', 'contacts'));
    }
}
