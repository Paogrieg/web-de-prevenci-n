<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pay;

class PaymentController extends Controller
{
    public function Payment()
    {
        $payments = Pay::all();
        return view('pagos', compact('payments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cost'              => ['required', 'numeric'],
            'payment_method'    => ['required', 'string'],
            'payment_reference' => ['required', 'string'],
            'status'            => ['required', 'in:in_process,canceled,completed'],
            'payment_date'      => ['required', 'date'],
            'verification_id'   => ['required', 'exists:verification,id'],
        ]);

        Pay::create($request->only('cost', 'payment_method', 'payment_reference', 'status', 'payment_date', 'verification_id'));

        return redirect('/pagos')->with('success', 'Pago registrado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cost'              => ['required', 'numeric'],
            'payment_method'    => ['required', 'string'],
            'payment_reference' => ['required', 'string'],
            'status'            => ['required', 'in:in_process,canceled,completed'],
            'payment_date'      => ['required', 'date'],
        ]);

        $payment = Pay::findOrFail($id);
        $payment->update($request->only('cost', 'payment_method', 'payment_reference', 'status', 'payment_date'));

        return redirect('/pagos')->with('success', 'Pago actualizado correctamente.');
    }

    public function destroy($id)
    {
        $payment = Pay::findOrFail($id);
        $payment->delete();
        return redirect('/pagos')->with('success', 'Pago eliminado correctamente.');
    }
}