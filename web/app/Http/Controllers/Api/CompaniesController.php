<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::all();
        return response()->json([
            "data"=>$companies,
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
        $company = new Company();
        $company->name = $request->name;
        $company->description = $request->description;
        $company->save();

        return response()->json([
            "data"=>$company,
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
        $valideted = $request->validate([
            'description' => 'required|min:3|max:200',
            'phone_number' => 'required|min:10|max:13',
        ]);
        $up = Company::find($id);
        $up->description = $request->description;
        $up->phone_number = $request->phone_number;
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
        $company = Company::find($id);
        if (!$company) {
            return response()->json([
                "message"=>"Company not found",
                "status"=>"error"
            ],404);
        }
        $company->delete();
        return response()->json([
            "message"=>"Company deleted successfully",
            "status"=>"success"
        ],200);
    }
}
