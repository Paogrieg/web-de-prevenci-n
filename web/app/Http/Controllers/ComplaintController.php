<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    public function complaint()
    {
        $complaints = Complaint::with('user')->get();
        return view('denuncias', compact('complaints'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'type'        => ['required', 'string'],
            'status'      => ['required', 'in:pendiente,revision,resuelto'],
            'date'        => ['required', 'date'],
            'lat'         => ['required', 'numeric'],
            'lng'         => ['required', 'numeric'],
        ]);

        Complaint::create([
            'title'       => $request->title,
            'description' => $request->description,
            'type'        => $request->type,
            'status'      => $request->status,
            'date'        => $request->date,
            'lat'         => $request->lat,
            'lng'         => $request->lng,
            'user_id'     => auth()->id(),
        ]);

        return redirect('/denuncias')->with('success', 'Denuncia registrada correctamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'type'        => ['required', 'string'],
            'status'      => ['required', 'in:pendiente,revision,resuelto'],
            'date'        => ['required', 'date'],
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->update($request->only('title', 'description', 'type', 'status', 'date'));

        return redirect('/denuncias')->with('success', 'Denuncia actualizada correctamente.');
    }

    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();
        return redirect('/denuncias')->with('success', 'Denuncia eliminada correctamente.');
    }
}