<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PasswordResetController extends Controller
{
    /**
     * Envía el correo con el enlace de recuperación de contraseña.
     * POST /api/forgot-password
     */
    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.exists' => 'No encontramos una cuenta con ese correo electrónico.',
        ]);

        // Eliminar tokens previos para ese email
        DB::table('password_resets')->where('email', $request->email)->delete();

        // Generar token seguro
        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email'      => $request->email,
            'token'      => Hash::make($token),
            'created_at' => Carbon::now(),
        ]);

        // Enviar correo
        Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));

        return response()->json([
            'message' => 'Te enviamos un enlace de recuperación a tu correo electrónico.',
        ]);
    }

    /**
     * Valida el token y actualiza la contraseña.
     * POST /api/reset-password
     */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token'                 => 'required|string',
            'email'                 => 'required|email|exists:users,email',
            'password'              => 'required|string|min:6|confirmed',
        ]);

        // Buscar el registro de reset
        $resetRecord = DB::table('password_resets')
            ->where('email', $request->email)
            ->latest('created_at')
            ->first();

        if (!$resetRecord) {
            return response()->json(['message' => 'Token inválido o expirado.'], 422);
        }

        // Verificar que el token no tenga más de 60 minutos
        if (Carbon::parse($resetRecord->created_at)->addMinutes(60)->isPast()) {
            DB::table('password_resets')->where('email', $request->email)->delete();
            return response()->json(['message' => 'El enlace de recuperación ha expirado.'], 422);
        }

        // Verificar que el token coincida
        if (!Hash::check($request->token, $resetRecord->token)) {
            return response()->json(['message' => 'Token inválido o expirado.'], 422);
        }

        // Actualizar contraseña
        User::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
        ]);

        // Eliminar el token usado
        DB::table('password_resets')->where('email', $request->email)->delete();

        return response()->json([
            'message' => 'Contraseña actualizada correctamente. Ya puedes iniciar sesión.',
        ]);
    }
}
