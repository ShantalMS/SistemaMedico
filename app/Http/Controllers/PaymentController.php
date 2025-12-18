<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = \App\Models\Payment::whereHas('appointment', function ($query) {
            $query->where('user_id', auth()->id());
        })->with('appointment.doctor.user')->get();

        return view('patient.payments.index', compact('payments'));
    }

    public function update(Request $request, $id)
    {
        $payment = \App\Models\Payment::findOrFail($id);

        // Simulate successful payment
        $payment->update([
            'status' => 'paid',
            'paid_at' => now(),
            'payment_method' => 'Simulated',
        ]);

        // Update appointment status
        $payment->appointment->update(['status' => 'confirmed']);

        return redirect()->back()->with('success', 'Payment successful! Appointment confirmed.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
