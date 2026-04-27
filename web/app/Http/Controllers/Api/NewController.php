<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return response()->json([
            "data"=>$news,
            "status"=>"success"
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'img' => 'nullable|string',
        'user_id' => 'required|exists:users,id',
    ]);
        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->img = $request->img;
        $news->user_id = $request->user_id;
        $news->save();

        return response()->json([
            "data"=>$news,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::find($id);
        if($news == null){
            return response()->json([
                "message"=>"Noticia no encontrada",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$news,
            "status"=>"success"
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $valideted = $request->validate([
            'img' => 'required|min:3|max:200',
        ]);
        $up = News::find($id);
        $up->img = $request->img;
        $up->save();
        return response()->json([
            "data"=>$up,
            "status"=>"success"
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $news = News::find($id);
        if($news == null){
            return response()->json([
                "error"=>"Noticia no encontrada",
                "status"=>"error"
            ],404);
        }
        $news->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
