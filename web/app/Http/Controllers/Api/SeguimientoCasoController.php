<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SeguimientoCaso;

class SeguimientoCasoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seguimientos = SeguimientoCaso::all();
        return response()->json([
            "data"=>$seguimientos,
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
        'status' => 'required|in:in_process,open,close',
        'coments' => 'required|string',
        'complaint_id' => 'required|exists:complaints,id',
        'testimonial_id' => 'required|exists:testimonials,id',
        'advisor_id' => 'required|exists:advisors,id',
    ]);
        $seguimiento = new SeguimientoCaso();
        $seguimiento->status = $request->status;
        $seguimiento->coments = $request->coments;
        $seguimiento->complaint_id = $request->complaint_id;
        $seguimiento->testimonial_id = $request->testimonial_id;
        $seguimiento->advisor_id = $request->advisor_id;
        $seguimiento->save();

        return response()->json([
            "data"=>$seguimiento,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $seguimiento = SeguimientoCaso::find($id);
        if($seguimiento == null){
            return response()->json([
                "message"=>"Seguimiento no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$seguimiento,
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
            'status' => 'required|in:in_process,open,close',
            'coments' => 'required|string',
        ]);
        $up = SeguimientoCaso::find($id);
        $up->status = $request->status;
        $up->coments = $request->coments;
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
            $seguimiento = SeguimientoCaso::find($id);
        if($seguimiento == null){
            return response()->json([
                "error"=>"Seguimiento no encontrado",
                "status"=>"error"
            ],404);
        }
        $seguimiento->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
