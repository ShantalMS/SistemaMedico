<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $doctor = \Illuminate\Support\Facades\Auth::user()->doctor;
        
        if (!$doctor) {
            abort(403, 'User is not associated with a doctor profile.');
        }

        $schedules = $doctor->schedules;
        return view('doctor.schedules.index', compact('schedules'));
    }
}
