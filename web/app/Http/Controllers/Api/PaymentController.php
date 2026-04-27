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
         $validated = $request->validate([
        'cost' => 'required|numeric',
        'payment_method' => 'required|string|max:255',
        'payment_reference' => 'required|string|max:255',
        'status' => 'required|in:in_process,canceled,completed',
        'payment_date' => 'required|date',
        'verification_id' => 'required|exists:verification,id',
    ]);
        $payment = new Pay();
        $payment->cost = $request->cost;
        $payment->payment_method = $request->payment_method;
        $payment->payment_reference = $request->payment_reference;
        $payment->status = $request->status;
        $payment->payment_date = $request->payment_date;
        $payment->verification_id = $request->verification_id;
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
        $payment = Pay::find($id);
        if($payment == null){
            return response()->json([
                "message"=>"Pago no encontrado",
                "status"=>"error"
            ],404);
        }
        return response()->json([
            "data"=>$payment,
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
            'cost' => 'required|decimal:0,2',
            'payment_method' => 'required|min:3|max:255',
            'status' => 'required|in:in_process,canceled,completed',
        ]);
        $up = Pay::find($id);
        $up->cost = $request->cost;
        $up->payment_method = $request->payment_method;
        $up->status = $request->status;
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
