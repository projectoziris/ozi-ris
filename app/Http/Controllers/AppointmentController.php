<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Modality;
use App\Models\Pesakit;
use Illuminate\Http\Request;
use App\Helpers\SlotHelper;

class AppointmentController extends Controller
{
    public function create()
    {
        $modalities = Modality::all();
        $pesakits = Pesakit::all();
        $defaultDate = now()->toDateString();
        $slots = [];

        return view('appointments.create', compact('modalities', 'pesakits', 'defaultDate', 'slots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesakit_id' => 'required',
            'modality_id' => 'required',
            'tarikh_temujanji' => 'required|date',
            'masa_mula' => 'required',
        ]);

        $masaTamat = date("H:i", strtotime($request->masa_mula) + (30 * 60));

        Appointment::create([
            'pesakit_id' => $request->pesakit_id,
            'modality_id' => $request->modality_id,
            'tarikh_temujanji' => $request->tarikh_temujanji,
            'masa_mula' => $request->masa_mula,
            'masa_tamat' => $masaTamat,
            'status' => 'pending',
        ]);

        return redirect()->route('appointments.index')->with('success', 'Temujanji berjaya disimpan.');
    }

    public function index(Request $request)
    {
        $query = Appointment::with(['pesakit', 'modality'])->latest();
    
        // Carian ikut nama pesakit
        if ($request->filled('nama')) {
            $query->whereHas('pesakit', function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->nama . '%');
            });
        }
    
        // Carian ikut modality
        if ($request->filled('modality_id')) {
            $query->where('modality_id', $request->modality_id);
        }
    
        // Filter tarikh
        if ($request->filled('tarikh')) {
            $query->whereDate('tarikh_temujanji', $request->tarikh);
        }
    
        // Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
    
        $appointments = $query->paginate(10)->withQueryString();
        $modalities = \App\Models\Modality::all();
    
        return view('appointments.index', compact('appointments', 'modalities'));
    }
    

}
