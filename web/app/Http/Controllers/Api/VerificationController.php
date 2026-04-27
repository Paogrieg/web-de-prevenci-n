<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Verification;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $verifications = Verification::all();
        return response()->json([
            "data"=>$verifications,
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
            'state' => 'required|in:pendiente,aprobada,rechazada',
            'date_verification' => 'required|date',
            'new_id' => 'required|numeric|exists:news,id',
        ]);
            $verification = new Verification();
            $verification->state = $request->state;
            $verification->date_verification = $request->date_verification;
            $verification->new_id = $request->new_id;
            $verification->save();

        return response()->json([
            "data"=>$verification,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $verification = Verification::find($id);
        if($verification == null){
            return response()->json([
                "message"=>"Verificación no encontrada",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$verification,
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
            'state' => 'required|in:pendiente,aprobada,rechazada',
            'date_verification' => 'required|date',
        ]);
        $up = Verification::find($id);
        $up->state = $request->state;
        $up->date_verification = $request->date_verification;
        $up->save();
        return response()->json([
            "data"=>$up,
            "status"=>"success"
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $verification = Verification::find($id);
        if($verification == null){
            return response()->json([
                "error"=>"Verificación no encontrada",
                "status"=>"error"
            ],404);
        }
        $verification->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
