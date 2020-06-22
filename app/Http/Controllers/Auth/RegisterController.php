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
            'firstname' => ['required', 'string', 'max:100'],
            'surname' => ['required', 'string', 'max:100'],
            'city' => ['required', 'string', 'max:80'],
            'street' => ['required', 'string', 'max:80'],
            'zipcode' => ['required', 'string', 'max:6'],
            'street_number' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        $address = Address::create([
            'city' => $data['city'],
            'street' => $data['street'],
            'street_number' => $data['street_number'],
            'zipcode' => $data['zipcode'],
        ]);

        $user = User::create([
            'name' => $data['firstname'].' '.$data['surname'],
            'firstname' => $data['firstname'],
            'suffix' => $data['suffix'],
            'surname' => $data['surname'],
            'email' => $data['email'],
            'role_id' => '2',
            'address_id' => $address->id,
            'password' => Hash::make($data['password']),
        ]);

        return $user;
    }
}
