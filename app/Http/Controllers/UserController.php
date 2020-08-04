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
        $user->firstname = ucwords(trim($request['voornaam']));
        $user->suffix = trim($request['tussenvoegsel']);
        $user->lastname = ucwords(trim($request['achternaam']));
        $user->email = trim($request['email']);

        $user->save();

        return back()->with('success' , 'Uw gegevens zijn succesvol gewijzigd');
    }
}
