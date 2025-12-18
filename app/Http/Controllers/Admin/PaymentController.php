<?php

namespace App\Http\Controllers\Admin;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::where('status', 'en_verificacion')
            ->with(['appointment.user', 'appointment.doctor.user'])
            ->orderBy('created_at', 'asc')
            ->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function update(Request $request, Payment $payment)
    {
        $request->validate([
            'status' => 'required|in:paid,rechazado',
        ]);

        if ($request->status === 'paid') {
            $payment->update([
                'status' => 'paid',
                'paid_at' => now(),
            ]);
            // Also confirm appointment
            $payment->appointment->update(['status' => 'confirmed']);
            
            return redirect()->back()->with('success', 'Pago aprobado y cita confirmada.');
        } else {
            $payment->update([
                'status' => 'rechazado',
            ]);
            
            return redirect()->back()->with('success', 'Pago rechazado.');
        }
    }
}
