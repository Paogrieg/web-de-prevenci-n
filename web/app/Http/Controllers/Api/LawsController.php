<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laws;

class LawsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laws = Laws::all();
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
        $law = new Laws();
        $law->title = $request->title;
        $law->description = $request->description;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $law = Laws::find($id);
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
