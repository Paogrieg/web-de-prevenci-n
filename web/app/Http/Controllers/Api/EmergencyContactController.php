<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmergencyContact;

class EmergencyContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emergencyContacts = EmergencyContact::all();
        return response()->json([
            "data"=>$emergencyContacts,
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
        $emergencyContact = new EmergencyContact();
        $emergencyContact->name = $request->name;
        $emergencyContact->phone = $request->phone;
        $emergencyContact->save();

        return response()->json([
            "data"=>$emergencyContact,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $emergencyContact = EmergencyContact::find($id);
        if($emergencyContact == null){
            return response()->json([
                "message"=>"Contacto de emergencia no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$emergencyContact,
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
            'name' => 'required|min:3|max:100',
            'phone_number' => 'required|min:10|max:13',
            'relationship' => 'required|min:10|max:30',
        ]);
        $up = EmergencyContact::find($id);
        $up->name = $request->name;
        $up->phone_number = $request->phone_number;
        $up->relationship = $request->relationship;
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
        $emergencyContact = EmergencyContact::find($id);
        if(!$emergencyContact){
            return response()->json([
                "error"=>"Contacto de emergencia no encontrado",
                "status"=>"error"
            ],404);
        }
        $emergencyContact->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
