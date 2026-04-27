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
        $request->validate([
            'name' => 'required|string|max:100',
            'lastname' => 'required|string|max:100',
            'phone_number' => 'required|numeric',
            'relation' => 'required|string|max:50',
            'user_id' => 'required|numeric|exists:users,id',
        ]);
        $contact = new EmergencyContact();
        $contact->name = $request->name;
        $contact->lastname = $request->lastname;
        $contact->phone_number = $request->phone_number;
        $contact->relation = $request->relation;
        $contact->user_id = $request->user_id;
        $contact->save();
        return response()->json([
            "data"=>$contact,
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
            'relation' => 'required|max:50',
        ]);
        $up = EmergencyContact::find($id);
        $up->name = $request->name;
        $up->phone_number = $request->phone_number;
        $up->relation = $request->relation;
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
