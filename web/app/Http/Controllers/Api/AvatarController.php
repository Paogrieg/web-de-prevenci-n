<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Avatar;

class AvatarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $avatars = Avatar::all();
        return response()->json([
            "data"=>$avatars,
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
        $avatar = new Avatar();
        $avatar->name = $request->name;
        $avatar->image = $request->image;
        $avatar->save();

        return response()->json([
            "data"=>$avatar,
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
        $avatar = Avatar::find($id);
        if (!$avatar) {
            return response()->json([
                "message"=>"Avatar not found",
                "status"=>"error"
            ],404);
        }
        $avatar->delete();
        return response()->json([
            "message"=>"Avatar deleted successfully",
            "status"=>"success"
        ],200);
    }
}
