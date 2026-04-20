<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pay;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payments = Pay::all();
        return response()->json([
            "data"=>$payments,
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
        $payment = new Pay();
        $payment->amount = $request->amount;
        $payment->method = $request->method;
        $payment->save();

        return response()->json([
            "data"=>$payment,
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
            $payment = Pay::find($id);
        if($payment == null){
            return response()->json([
                "error"=>"Pago no encontrado",
                "status"=>"error"
            ],404);
        }
        $payment->delete();
        return response()->json([
            "status"=>"success",
            "message"=>"Registro eliminado correctamente"
        ],200);
    }
}
