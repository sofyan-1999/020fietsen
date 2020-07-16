<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class ShoppingCartController extends Controller
{
    // aan cart toevoegen
    public static function addToCart($id, $quantity = 1)
    {
        if(isset($_SESSION['cart']['products'][$id])) {
            $_SESSION['cart']['products'][$id]['quantity'] += $quantity;
        }
        else {
            $product = DB::table('products')->where('id', '=', $id)->get();

            $_SESSION['cart']['products'][$id] = [
                'quantity' => 1,
                'title' => $product[0]->title,
                'price' => $product[0]->price,
                'image' => $product[0]->image,
                'id' => $product[0]->id
            ];
        }
        // bereken
        self::calculate();

        return redirect()->back()->with('message', 'Artikel is succesvol toegevoegd in de winkelwagen');
    }

    // van cart verwijderen
    public static function removeFromCart($id)
    {
        if($_SESSION['cart']['products'][$id]['quantity'] > 1) {
            $_SESSION['cart']['products'][$id]['quantity']--;
        }
        else {
            unset($_SESSION['cart']['products'][$id]);
        }
        // bereken
        self::calculate();

        return redirect()->back()->with('message', 'Artikel is succesvol verwijderd uit de winkelwagen');
    }

    // return cart
    public static function get()
    {
        return $_SESSION['cart'];
    }

    // bereken prijs etc
    private static function calculate()
    {
        $totalPrice = 0;
        foreach($_SESSION['cart']['products'] as $key => $value) {
            $totalPrice += $value['price'] * $value['quantity'];
        }

        $_SESSION['cart']['total'] = $totalPrice;
    }


    public function address(Request $request, $id){


        $request->validate([
            'straat' => ['required', 'regex:/^[a-zA-Z ]+$/', 'max:80'],
            'huisnummer' => ['required', 'numeric'],
            'toevoeging' => ['nullable', 'max:10', 'regex:/^[a-zA-Z1-9 ]+$/'],
            'postcode' => ['required', 'regex:/^[1-9]{1}[0-9]{3}( |)[a-zA-z]{2}$/'],
            'stad' => ['required', 'regex:/^[a-zA-Z ]+$/', 'max:80'],
        ]);

        $user = User::find($id);
        $user->street = ucwords($request->input('straat'));
        $user->house_number = trim($request->input('huisnummer'));
        $user->house_number_suffix = strtoupper(trim($request->input('toevoeging')));
        $user->zipcode = strtoupper($request->input('postcode'));
        $user->city = ucfirst(trim($request->input('stad')));

        $user->save();

        return redirect("/shoppingCart/confirm");

    }

    // reset cart(leegmaken)
    public static function reset()
    {
        // default cart create
        $_SESSION['cart'] = [
            'products' => [],
            'total' => 0.00,
        ];
    }
}
