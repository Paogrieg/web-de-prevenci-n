<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Law;

class LawsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laws = Law::all();
        return response()->json([
            "data"=>$laws,
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
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'state' => 'required|string|max:100', 
            'url' => 'required|url', 
        ]);
        $law = new Law();
        $law->title = $request->title;
        $law->description = $request->description;
        $law->state = $request->state;
        $law->url = $request->url;
        
        $law->save();

        return response()->json([
            "data"=>$law,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $law = Law::find($id);
        if($law == null){
            return response()->json([
                "message"=>"Ley no encontrada",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$law,
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
            'description' => 'required|min:3|max:200',
            'state' => 'required|max:100',
        ]);
        $up = Law::find($id);
        $up->description = $request->description;
        $up->state = $request->state;
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
            $law = Law::find($id);
        if($law == null){
            return response()->json([
                "error"=>"Ley no encontrada",
                "status"=>"error"
            ],404);
        }
        $law->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
