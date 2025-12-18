<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::whereHas('appointment', function($query) {
            $query->where('user_id', Auth::id());
        })->with(['appointment.doctor.user'])->orderBy('created_at', 'desc')->get();

        return view('patient.payments.index', compact('payments'));
    }

    public function showRegister(Payment $payment)
    {
        if ($payment->appointment->user_id !== Auth::id()) {
            abort(403);
        }
        return view('patient.payments.pay', compact('payment'));
    }

    public function register(Request $request, Payment $payment)
    {
        if ($payment->appointment->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'payment_method' => 'required|in:yape,bcp',
            'operation_number' => 'required|string',
            'payment_date' => 'required|date',
            'payment_proof' => 'required|image|max:2048', // 2MB max
        ]);

        $path = $request->file('payment_proof')->store('payments', 'public');

        $payment->update([
            'payment_method' => $request->payment_method,
            'operation_number' => $request->operation_number,
            'paid_at' => $request->payment_date, // Using paid_at as the user-claimed date
            'payment_proof' => $path,
            'status' => 'en_verificacion',
        ]);

        return redirect()->route('patient.payments.index')->with('success', 'Pago registrado correctamente. Pendiente de validación por administración.');
    }
}
