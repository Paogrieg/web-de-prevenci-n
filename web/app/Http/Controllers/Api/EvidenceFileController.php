<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EvidenceFile;

class EvidenceFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evidenceFiles = EvidenceFile::all();
        return response()->json([
            "data"=>$evidenceFiles,
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
            'rute' => 'required|string|max:255',
            'description' => 'required|string',
            'evidences_id' => 'required|numeric|exists:evidences,id',
        ]);
        $evidenceFile = new EvidenceFile();
        $evidenceFile->rute = $request->rute;
        $evidenceFile->description = $request->description;
        $evidenceFile->evidences_id = $request->evidences_id;
        $evidenceFile->save();

        return response()->json([
            "data"=>$evidenceFile,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $evidenceFile = EvidenceFile::find($id);
        if($evidenceFile == null){
            return response()->json([
                "message"=>"Archivo de evidencia no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$evidenceFile,
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
            'rute' => 'required|min:3|max:200',
            'description' => 'required|min:3|max:300',
        ]);
        $up = EvidenceFile::find($id);
        $up->rute = $request->rute;
        $up->description = $request->description;
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
        $evidenceFile = EvidenceFile::find($id);
        if($evidenceFile == null){
            return response()->json([
                "error"=>"Archivo de evidencia no encontrado",
                "status"=>"error"
            ],404);
        }
        $evidenceFile->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
