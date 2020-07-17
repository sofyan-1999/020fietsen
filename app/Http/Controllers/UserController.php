<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function get()
    {
        return view('account.index');
    }

    public function getEditView()
    {
        return view('account.edit');
    }

    public function update(UserUpdate $request)
    {
        $user = User::where('id' , Auth::user()->id)->first();
        $user->firstname = $request['firstname'];
        $user->suffix = $request['suffix'];
        $user->lastname = $request['lastname'];
        $user->street = $request['street'];
        $user->house_number = $request['house_number'];
        $user->house_number_suffix = $request['house_number_suffix'];
        $user->zipcode = $request['zipcode'];
        $user->city = $request['city'];
        $user->email = $request['email'];

        $user->save();

        return back()->with('success' , 'Uw gegevens zijn succesvol gewijzigd');
    }
}
