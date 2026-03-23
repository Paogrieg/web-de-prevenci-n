<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/construccion';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'          => ['required', 'string', 'max:255'],
            'lastname'      => ['required', 'string', 'max:255'],
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'  => ['required', 'string', 'max:10'],
            'dateBirth'     => ['required', 'date'],
            'document_type' => ['required', 'string'],
            'document'      => ['required', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:5120'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name'         => $data['name'],
            'lastname'     => $data['lastname'],
            'email'        => $data['email'],
            'phone_number' => $data['phone_number'],
            'dateBirth'    => $data['dateBirth'],
            'password'     => Hash::make($data['password']),
            'avatar_id'    => 1,
            'rol'          => 'user',
            'verificated'  => 0,
        ]);

        if (request()->hasFile('document')) {
            $path = request()->file('document')->store('verificaciones', 'public');
            \App\Models\GenderVerification::create([
                'user_id'       => $user->id,
                'document_path' => $path,
                'document_type' => $data['document_type'],
                'state'         => 'pendiente',
            ]);
        }

        return $user;
    }
}