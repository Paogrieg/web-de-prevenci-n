<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Adviser;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advisers = Adviser::all();
        return response()->json([
            "data"=>$advisers,
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
        $adviser = new Adviser();
        $adviser->name = $request->name;
        $adviser->lastname = $request->lastname;
        $adviser->email = $request->email;
        $adviser->phone_number = $request->phone_number;
        $adviser->specialty = $request->specialty;
        $adviser->institution = $request->institution;
        $adviser->save();

        return response()->json([
            "data"=>$adviser,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $adviser = Adviser::find($id);
        if($adviser == null){
            return response()->json([
                "message"=>"Asesor no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$adviser,
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
            'email' => 'required|min:3|max:200',
            'phone_number' => 'required|min:10|max:13',
        ]);
        $up = Adviser::find($id);
        $up->email = $request->email;
        $up->phone_number = $request->phone_number;
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
        $adviser = Adviser::find($id);
        if($adviser == null){
            return response()->json([
                "error"=>"Asesor no encontrado",
                "status"=>"error"
            ],404);
        }
        $adviser  ->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
