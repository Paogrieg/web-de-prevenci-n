<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('user')->get();
        return response()->json([
            "data"=>$users,
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
            'name' => 'required|min:3|max:30',
            'lastname' => 'required|min:3|max:30',
            'phone_number' => 'required|numeric',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
            'dateBirth' => 'required|date',
            'avatar_id' => 'required|numeric',
            'rol' => 'required|numeric',
            'verificated' => 'required|boolean',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->dateBirth = $request->dateBirth;
        $user->avatar_id = $request->avatar_id;
        $user->rol = $request->rol;
        $user->verificated = $request->verificated;
        
        $user->save();
        return response()->json([
            "data"=>$user,
            "status"=>"success"
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        if($user == null){
            return response()->json([
                "message"=>"Usuario no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$user,
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
            'name' => 'required|min:3|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4',
        ]);
        $user =  User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();
        return response()->json([
            "data"=>$user,
            "status"=>"success"
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if($user == null){
            return response()->json([
                "error"=>"Usuario no encontrado",
                "status"=>"error"
            ],404);
        }
        $user->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
