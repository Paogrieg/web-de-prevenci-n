<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collaboration;

class CollaborationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collaborations = Collaboration::all();
        return response()->json([
            "data"=>$collaborations,
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
        $collaboration = new Collaboration();
        $collaboration->name = $request->name;
        $collaboration->description = $request->description;
        $collaboration->save();

        return response()->json([
            "data"=>$collaboration,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $collaboration = Collaboration::find($id);
        if($collaboration == null){
            return response()->json([
                "message"=>"Collaboration no encontrada",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$collaboration,
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
        ]);
        $up = Collaboration::find($id);
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
        $collaboration = Collaboration::find($id);
        if (!$collaboration) {
            return response()->json([
                "message"=>"Collaboration not found",
                "status"=>"error"
            ],404);
        }
        $collaboration->delete();
        return response()->json([
            "message"=>"Collaboration deleted successfully",
            "status"=>"success"
        ],200);
    }
}
