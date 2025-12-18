<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Doctor;

class BookingController extends Controller
{
    public function create()
    {
        $doctors = Doctor::with('user')->get();
        return view('patient.appointments.create', compact('doctors'));
    }

    public function showSchedule(Doctor $doctor)
    {
        $schedules = $doctor->schedules;
        
        // Generate next 14 days of available slots based on schedules
        $dates = [];
        $startDate = \Carbon\Carbon::now();
        
        for ($i = 0; $i < 14; $i++) {
            $date = $startDate->copy()->addDays($i);
            $dayName = $date->format('l'); // e.g., Monday
            
            foreach ($schedules as $schedule) {
                if ($schedule->day_of_week === $dayName) {
                    $dates[] = [
                        'date' => $date->format('Y-m-d'),
                        'day_name' => $dayName,
                        'start_time' => $schedule->start_time,
                        'end_time' => $schedule->end_time,
                        'schedule_id' => $schedule->id,
                    ];
                }
            }
        }

        return view('patient.appointments.schedule', compact('doctor', 'dates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'schedule_id' => 'required|exists:schedules,id',
            'appointment_date' => 'required|date',
        ]);

        // Check for duplicate appointments
        $exists = \App\Models\Appointment::where('doctor_id', $request->doctor_id)
            ->where('appointment_date', $request->appointment_date)
            ->exists();

        if ($exists) {
            return back()->with('error', 'This slot is already booked.');
        }

        $appointment = \App\Models\Appointment::create([
            'user_id' => \Illuminate\Support\Facades\Auth::id(),
            'doctor_id' => $request->doctor_id,
            'schedule_id' => $request->schedule_id,
            'appointment_date' => $request->appointment_date,
            'status' => 'pending', 
        ]);

        // Create PENDING payment
        $doctor = Doctor::find($request->doctor_id);
        $appointment->payment()->create([
            'amount' => $doctor->consultation_price,
            'status' => 'pending',
            'payment_method' => 'pending', 
        ]);

        return redirect()->route('patient.payments.index')->with('success', 'Cita solicitada. Por favor realice el pago para confirmar.');
    }

    public function confirmed($id)
    {
        $appointment = \App\Models\Appointment::with(['doctor.user', 'payment'])->findOrFail($id);
        
        // Ensure the user owns this appointment
        if ($appointment->user_id !== \Illuminate\Support\Facades\Auth::id()) {
            abort(403);
        }

        return view('patient.appointments.confirmed', compact('appointment'));
    }
}
