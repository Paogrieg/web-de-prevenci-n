<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GenderVerification;

class GenderVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genderVerifications = GenderVerification::all();
        return response()->json([
            "data"=>$genderVerifications,
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
        $genderVerification = new GenderVerification();
        $genderVerification->name = $request->name;
        $genderVerification->result = $request->result;
        $genderVerification->save();

        return response()->json([
            "data"=>$genderVerification,
            "status"=>"success"
        ],200);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genderVerification = GenderVerification::find($id);
        if($genderVerification == null){
            return response()->json([
                "message"=>"Verificación de género no encontrada",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$genderVerification,
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
            'state' => 'required|enum:pendiente,aprobada,rechazada',
            'notes' => 'required|string',
        ]);
        $up = GenderVerification::find($id);
        $up->state = $request->state;
        $up->notes = $request->notes;
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
        $genderVerification = GenderVerification::find($id);
        if($genderVerification == null){
            return response()->json([
                "error"=>"Verificación de género no encontrada",
                "status"=>"error"
            ],404);
        }
        $genderVerification->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
