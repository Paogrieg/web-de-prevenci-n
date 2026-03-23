<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmergencyContact;

class EmergencyContactController extends Controller
{
    public function emergency()
    {
        $contacts = EmergencyContact::all();
        return view('emergencia', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'lastname'     => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:10'],
            'relation'     => ['required', 'string'],
        ]);

        EmergencyContact::create([
            'name'         => $request->name,
            'lastname'     => $request->lastname,
            'phone_number' => $request->phone_number,
            'relation'     => $request->relation,
            'user_id'      => auth()->id(),
        ]);

        return redirect('/emergencia')->with('success', 'Contacto agregado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'lastname'     => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:10'],
            'relation'     => ['required', 'string'],
        ]);

        $contact = EmergencyContact::findOrFail($id);
        $contact->update($request->only('name', 'lastname', 'phone_number', 'relation'));

        return redirect('/emergencia')->with('success', 'Contacto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $contact = EmergencyContact::findOrFail($id);
        $contact->delete();
        return redirect('/emergencia')->with('success', 'Contacto eliminado correctamente.');
    }
}