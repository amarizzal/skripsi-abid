<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notulen;
use App\Models\Schedule;

class NotulenController extends Controller
{
    public function index()
    {
        $notulens = Notulen::with('schedule')->orderBy('created_at', 'desc')->get();   
        $schedules = Schedule::whereDate('date', today())->get();
        return view('notulen.index', compact('notulens', 'schedules'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'schedule_id' => 'required|exists:schedules,id',
            'content' => 'required|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        ]);

        $notulen = new Notulen();   
        $notulen->schedule_id = $request->schedule_id;
        $notulen->content = $request->content;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/notulen', $filename);
            $notulen->file = $filename;
        }
        $notulen->save();

        return redirect()->route('notulens.index')->with('success', 'Notulen berhasil ditambahkan');
    }

    public function destroy(Notulen $notulen)
    {
        $notulen->delete();
        return redirect()->route('notulens.index')->with('success', 'Notulen berhasil dihapus');
    }
}
