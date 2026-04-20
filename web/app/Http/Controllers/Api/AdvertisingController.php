<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertising;

class AdvertisingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $advertising = Advertising::all();
        return response()->json([
            "data"=>$advertising,
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
        $valideted = $request->validate([
            'title' => 'required|min:3|max:255',
            'image' => 'required|min:3|max:255',
            'link' => 'required|min:3|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'active' => 'required|boolean',
            'company_id' => 'required|numeric',
        ]);
        $advertising = new Advertising();
        $advertising->title = $request->title;
        $advertising->image = $request->image;
        $advertising->link = $request->link;
        $advertising->start_date = $request->start_date;
        $advertising->end_date = $request->end_date;
        $advertising->active = $request->active;
        $advertising->company_id = $request->company_id;
        
        $advertising->save();
        return response()->json([
            "data"=>$advertising,
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
                $advertising = Advertising::find($id);
        if($advertising == null){
            return response()->json([
                "error"=>"Publicidad no encontrada",
                "status"=>"error"
            ],404);
        }
        $advertising->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
