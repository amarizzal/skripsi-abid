<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notulen;
use App\Models\Schedule;
use Barryvdh\DomPDF\Facade\Pdf;

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

    public function edit(Notulen $notulen)
    {
        return view('notulen.edit', compact('notulen'));
    }

    public function update(Request $request, Notulen $notulen)
    {
        $request->validate([
            'schedule_id' => 'required|string',
            'content' => 'required|string'
        ]);

        $data = $request->except('schedule_id');

        $notulen->update($data);

        return redirect()->route('notulens.index')->with('success', 'Notulen berhasil diubah.');
    }

    public function destroy(Notulen $notulen)
    {
        $notulen->delete();
        return redirect()->route('notulens.index')->with('success', 'Notulen berhasil dihapus');
    }

    public function downloadPDF(Notulen $notulen)
    {
        $notulen = Notulen::with('schedule')->find($notulen->id);
        $pdf = Pdf::loadView('notulen.pdf', compact('notulen'));
        return $pdf->download($notulen->schedule->content . ' - NOTULEN.pdf');
    }
}
