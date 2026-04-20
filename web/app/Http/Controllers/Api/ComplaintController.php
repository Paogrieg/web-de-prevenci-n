<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Compalaint;

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
        $complaint = new Complaint();
        $complaint->title = $request->title;
        $complaint->description = $request->description;
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
