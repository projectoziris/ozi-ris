<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesakit;
use App\Models\Modality;
use App\Models\Examination;
use App\Models\Appointment;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'pesakitCount' => Pesakit::count(),
            'modalityCount' => Modality::count(),
            'examinationCount' => Examination::count(),
            'todayAppointmentCount' => Appointment::whereDate('tarikh_temujanji', now()->toDateString())->count(),
            'statusCounts' => [
                'pending' => Appointment::where('status', 'pending')->count(),
                'confirmed' => Appointment::where('status', 'confirmed')->count(),
                'done' => Appointment::where('status', 'done')->count(),
                'cancelled' => Appointment::where('status', 'cancelled')->count(),
            ]
        ]);
    }
}
