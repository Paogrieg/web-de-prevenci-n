<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimony;

class TestimonialsController extends Controller
{
    public function testimonials()
    {
        $testimonials = Testimony::with('user')->get();
        return view('testimonios', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'content'      => ['required', 'string'],
            'anonymous'    => ['required', 'boolean'],
            'complaint_id' => ['required', 'exists:complaints,id'],
        ]);

        Testimony::create([
            'content'      => $request->content,
            'anonymous'    => $request->anonymous,
            'complaint_id' => $request->complaint_id,
            'user_id'      => auth()->id(),
        ]);

        return redirect('/testimonios')->with('success', 'Testimonio registrado correctamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content'   => ['required', 'string'],
            'anonymous' => ['required', 'boolean'],
        ]);

        $testimony = Testimony::findOrFail($id);
        $testimony->update($request->only('content', 'anonymous'));

        return redirect('/testimonios')->with('success', 'Testimonio actualizado correctamente.');
    }

    public function destroy($id)
    {
        $testimony = Testimony::findOrFail($id);
        $testimony->delete();
        return redirect('/testimonios')->with('success', 'Testimonio eliminado correctamente.');
    }
}