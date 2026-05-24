<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class NewController extends Controller
{
    /**
     * Lista todas las noticias.
     */
    public function index()
    {
        $news = News::with('user')->orderBy('created_at', 'desc')->get();
        return response()->json([
            "data"   => $news,
            "status" => "success"
        ], 200);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        return response()->json([
        'PRUEBA' => 'SOY EL CONTROLADOR NUEVO',
        'auth_id' => \Illuminate\Support\Facades\Auth::id(),
        'request_data' => $request->all(),
        'authorization_header' => $request->header('Authorization') ? 'TIENE TOKEN' : 'NO TIENE TOKEN',
    ]);
        $validated = $request->validate([
            'title'          => 'required|string|max:255',
            'content'        => 'required|string',
            'img'            => 'nullable|string',
            'paypal_enabled' => 'nullable|boolean',
            'paypal_link'    => 'nullable|string|max:255|required_if:paypal_enabled,true',
        ]);

        // Creamos la noticia con mass assignment (más limpio y sin warnings del linter)
        $news = News::create([
            'title'          => $validated['title'],
            'content'        => $validated['content'],
            'img'            => $validated['img'] ?? 'default.jpg',
            'user_id'        => Auth::id(), // <- se toma del JWT, no del request
            'paypal_enabled' => $request->boolean('paypal_enabled', false),
            'paypal_link'    => $request->boolean('paypal_enabled', false)
                                    ? ($validated['paypal_link'] ?? null)
                                    : null,
        ]);

        // Cargamos la relación user para devolverla completa
        $news->load('user');

        return response()->json([
            "data"   => $news,
            "status" => "success"
        ], 201);
    }

    /**
     * Muestra una noticia específica.
     */
    public function show(string $id)
    {
        $news = News::with('user')->find($id);
        if ($news === null) {
            return response()->json([
                "message" => "Noticia no encontrada",
                "status"  => "error"
            ], 404);
        }
        return response()->json([
            "data"   => $news,
            "status" => "success"
        ], 200);
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Actualiza una noticia.
     */
    public function update(Request $request, string $id)
    {
        $news = News::find($id);
        if ($news === null) {
            return response()->json([
                "error"  => "Noticia no encontrada",
                "status" => "error"
            ], 404);
        }

        // Solo el autor puede editar su propia noticia
        if ($news->user_id !== Auth::id()) {
            return response()->json([
                "error"  => "No tienes permiso para editar esta noticia",
                "status" => "error"
            ], 403);
        }

        $validated = $request->validate([
            'title'          => 'sometimes|string|max:255',
            'content'        => 'sometimes|string',
            'img'            => 'sometimes|string|max:200',
            'paypal_enabled' => 'sometimes|boolean',
            'paypal_link'    => 'nullable|string|max:255',
        ]);

        $news->update($validated);

        return response()->json([
            "data"   => $news->fresh('user'),
            "status" => "success"
        ], 200);
    }

    /**
     * Elimina una noticia.
     */
    public function destroy(string $id)
    {
        $news = News::find($id);
        if ($news === null) {
            return response()->json([
                "error"  => "Noticia no encontrada",
                "status" => "error"
            ], 404);
        }

        // Solo el autor puede eliminar su propia noticia
        if ($news->user_id !== Auth::id()) {
            return response()->json([
                "error"  => "No tienes permiso para eliminar esta noticia",
                "status" => "error"
            ], 403);
        }

        $news->delete();
        return response()->json([
            "status"  => "success",
            "message" => "Registro eliminado correctamente"
        ], 200);
    }
}   