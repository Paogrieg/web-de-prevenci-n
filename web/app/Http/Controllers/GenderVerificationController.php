<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GenderVerification;

class GenderVerificationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'document_type' => ['required', 'string'],
            'document'      => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
        ]);

        $path = $request->file('document')->store('verificaciones', 'public');

        GenderVerification::create([
            'user_id'       => auth()->id(),
            'document_path' => $path,
            'document_type' => $request->document_type,
            'state'         => 'pendiente',
        ]);

        return redirect('/')->with('success', 'Documento enviado. Tu cuenta será verificada pronto.');
    }
}