<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Law;

class LawsController extends Controller
{
    public function law()
    {
        $laws = Law::all();
        return view('leyes', compact('laws'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'state'       => ['required', 'string', 'max:100'],
            'url'         => ['nullable', 'url'],
        ]);

        Law::create($request->only('title', 'description', 'state', 'url'));

        return redirect('/leyes')->with('success', 'Ley agregada correctamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'state'       => ['required', 'string', 'max:100'],
            'url'         => ['nullable', 'url'],
        ]);

        $law = Law::findOrFail($id);
        $law->update($request->only('title', 'description', 'state', 'url'));

        return redirect('/leyes')->with('success', 'Ley actualizada correctamente.');
    }

    public function destroy($id)
    {
        $law = Law::findOrFail($id);
        $law->delete();
        return redirect('/leyes')->with('success', 'Ley eliminada correctamente.');
    }
}