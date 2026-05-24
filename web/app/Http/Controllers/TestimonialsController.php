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
        $validated = $request->validate([
            'content' => 'required|string',
            'anonymous' => 'required|boolean',
            'user_id' => 'required|exists:users,id',
            'complaint_id' => 'required|exists:complaints,id',
        ]);

        $testimony = new Testimony();
        $testimony->content = $request->content;
        $testimony->anonymous = $request->anonymous;
        $testimony->user_id = $request->user_id;
        $testimony->complaint_id = $request->complaint_id;
        $testimony->save();

        $user = \App\Models\User::find($request->user_id);
        $puntosAntes = $user ? $user->empathy_points : 'Usuario no encontrado';

        if ($user) {
            $user->empathy_points = ($user->empathy_points ?? 0) + 10;
            $user->save();
            $user->refresh();
        }

        $puntosDespues = $user ? $user->empathy_points : 'Usuario no encontrado';

        return response()->json([
            "status" => "success",
            "data" => $testimony,
            "debug" => [
                "id_recibido_de_react" => $request->user_id,
                "id_encontrado_en_laravel" => $user ? $user->id : null,
                "puntos_antes_de_guardar" => $puntosAntes,
                "puntos_despues_de_guardar" => $puntosDespues
            ],
            "message" => "Testimonio publicado con éxito."
        ], 200);
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