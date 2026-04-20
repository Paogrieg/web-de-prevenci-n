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
        $verification = new Verification();
        $verification->user_id = $request->user_id;
        $verification->status = $request->status;
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
