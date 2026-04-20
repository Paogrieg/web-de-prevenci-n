<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Record;

class RecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::all();
        return response()->json([
            "data"=>$records,
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
        $record = new Record();
        $record->title = $request->title;
        $record->description = $request->description;
        $record->save();

        return response()->json([
            "data"=>$record,
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
            $record = Record::find($id);
        if($record == null){
            return response()->json([
                "error"=>"Registro no encontrado",
                "status"=>"error"
            ],404);
        }
        $record->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
