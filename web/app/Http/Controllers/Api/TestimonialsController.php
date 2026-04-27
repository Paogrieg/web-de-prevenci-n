<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimony;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonies = Testimony::all();
        return response()->json([
            "data"=>$testimonies,
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
         $validated = $request->validate([
        'content' => 'required|string',
        'anonymous' => 'required|boolean',
        'user_id' => 'required|exists:users,id',
        'complaint_id' => 'required|exists:complaints,id',
    ]);
        $testimony = new Testimony();
        $testimony->content = $request->content;
        $testimony->anonymous = $request->anonymous;
        $testimony->user_id = $request->user_id;
        $testimony->complaint_id = $request->complaint_id;
        $testimony->save();

        return response()->json([
            "data"=>$testimony,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $testimony = Testimony::find($id);
        if($testimony == null){
            return response()->json([
                "message"=>"Testimonio no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$testimony,
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
            'content' => 'required|string',
        ]);
        $up = Testimony::find($id);
        $up->content = $request->content;
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
            $testimony = Testimony::find($id);
        if($testimony == null){
            return response()->json([
                "error"=>"Testimonio no encontrado",
                "status"=>"error"
            ],404);
        }
        $testimony->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
