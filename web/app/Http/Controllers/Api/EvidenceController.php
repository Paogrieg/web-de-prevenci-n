<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Evidence;

class EvidenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evidences = Evidence::all();
        return response()->json([
            "data"=>$evidences,
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
            'file_type' => 'required|string|max:50',
            'complaint_id' => 'required|numeric|exists:complaints,id',
        ]);
        $evidence = new Evidence();
        $evidence->file_type = $request->file_type;
        $evidence->complaint_id = $request->complaint_id;
        
        $evidence->save();

        return response()->json([
            "data"=>$evidence,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evidence = Evidence::find($id);
        if($evidence == null){
            return response()->json([
                "message"=>"Evidencia no encontrada",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$evidence,
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evidence = Evidence::find($id);
        if($evidence == null){
            return response()->json([
                "error"=>"Evidencia no encontrada",
                "status"=>"error"
            ],404);
        }
        $evidence->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
