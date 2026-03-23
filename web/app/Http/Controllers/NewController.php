<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewController extends Controller
{
    public function news()
    {
        $news = News::with('user')->get();
        return view('noticias', compact('news'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        News::create([
            'title'   => $request->title,
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return redirect('/noticias')->with('success', 'Noticia creada correctamente.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title'   => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
        ]);

        $noticia = News::findOrFail($id);
        $noticia->update($request->only('title', 'content'));

        return redirect('/noticias')->with('success', 'Noticia actualizada correctamente.');
    }

    public function destroy($id)
    {
        $noticia = News::findOrFail($id);
        $noticia->delete();
        return redirect('/noticias')->with('success', 'Noticia eliminada correctamente.');
    }
}