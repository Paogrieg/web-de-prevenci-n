<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Complaint;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $complaints = Complaint::all();
        return response()->json([
            "data"=>$complaints,
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|string|max:100',
            'status' => 'required|in:pendiente,revision,resuelto',
            'lat' => 'required|numeric', 
            'lng' => 'required|numeric',
            'date' => 'required|date',
            'user_id' => 'required|numeric|exists:users,id',
        ]);
        $complaint = new Complaint();
        $complaint->title = $request->title;
        $complaint->description = $request->description;
        $complaint->type = $request->type;
        $complaint->status = $request->status;
        $complaint->lat = $request->lat;
        $complaint->lng = $request->lng;
        $complaint->date = $request->date;
        $complaint->user_id = $request->user_id;
        $complaint->save();
        return response()->json([
            "data"=>$complaint,
            "status"=>"success"
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $complaint = Complaint::find($id);
        if($complaint == null){
            return response()->json([
                "message"=>"Queja no encontrada",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$complaint,
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
            'description' => 'required|min:3|max:300',
            'status' => 'required|in:pendiente,revision,resuelto',
            'date' => 'required|date',
        ]);
        $up = Complaint::find($id);
        $up->description = $request->description;
        $up->status = $request->status;
        $up->date = $request->date; 
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
        $complaint = Complaint::find($id);
        if (!$complaint) {
            return response()->json([
                "message"=>"Complaint not found",
                "status"=>"error"
            ],404);
        }
        $complaint->delete();
        return response()->json([
            "message"=>"Complaint deleted successfully",
            "status"=>"success"
        ],200);
    }
}
