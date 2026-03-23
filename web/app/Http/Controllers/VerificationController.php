<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Verification;

class VerificationController extends Controller
{
    public function Verification()
    {
        $verifications = Verification::all();
        return view('verificaciones', compact('verifications'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state'             => ['required', 'in:pendiente,aprobada,rechazada'],
            'date_verification' => ['required', 'date'],
            'new_id'            => ['required', 'exists:news,id'],
        ]);

        Verification::create($request->only('state', 'date_verification', 'new_id'));

        return redirect('/verificaciones')->with('success', 'Verificación creada correctamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'state'             => ['required', 'in:pendiente,aprobada,rechazada'],
            'date_verification' => ['required', 'date'],
        ]);

        $verification = Verification::findOrFail($id);
        $verification->update($request->only('state', 'date_verification'));

        return redirect('/verificaciones')->with('success', 'Verificación actualizada correctamente.');
    }

    public function destroy($id)
    {
        $verification = Verification::findOrFail($id);
        $verification->delete();
        return redirect('/verificaciones')->with('success', 'Verificación eliminada correctamente.');
    }
}