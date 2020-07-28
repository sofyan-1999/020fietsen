<?php

namespace App\Http\Controllers\Auth;

use App\Address;
use App\Http\Controllers\Controller;
use App\User;
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
    protected $redirectTo = '/';

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
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'voornaam' => ['required', 'regex:/^[a-zA-Z ]+$/', 'max:100'],
            'tussenvoegsel' => ['nullable', 'regex:/^[a-zA-Z ]+$/'],
            'achternaam' => ['required', 'regex:/^[a-zA-Z ]+$/', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'wachtwoord' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'firstname' => ucwords(trim($data['voornaam'])),
            'suffix' => ucwords(trim($data['tussenvoegsel'])),
            'lastname' => ucwords(trim($data['achternaam'])),
            'email' => trim($data['email']),
            'password' => Hash::make($data['wachtwoord']),
            'role_id' => '2',
        ]);

        return $user;
    }
}
