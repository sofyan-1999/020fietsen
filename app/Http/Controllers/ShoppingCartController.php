<?php

namespace App\Http\Controllers;

use App\Mail\OrderConfirmation;
use Illuminate\Http\Request;
use DB;
use App\User;
use App\Order;
use App\OrderProduct;
use App\Product;
use Auth;
use Illuminate\Support\Facades\Mail;
use Mollie\Laravel\Facades\Mollie;

class ShoppingCartController extends Controller
{
    // aan cart toevoegen
    public static function addToCart($id, $quantity = 1)
    {
        if(isset($_SESSION['cart']['products'][$id])) {
            $_SESSION['cart']['products'][$id]['quantity'] += $quantity;

            $artikelen = "artikelen";
            if($_SESSION['cart']['products'][$id]['stock'] < $_SESSION['cart']['products'][$id]['quantity']){
                $_SESSION['cart']['products'][$id]['quantity']--;

                if($_SESSION['cart']['products'][$id]['stock'] == 1){
                    $artikelen = "artikel";
                }
                return redirect()->back()->with('message_alert', 'Helaas, we hebben niet meer dan ' . $_SESSION['cart']['products'][$id]['stock'] . ' ' . $artikelen .' op voorraad');
            }

        }
        else {
            $product = DB::table('products')
                ->join('images', 'products.image_id', '=', 'images.id')
                ->select('products.title', 'products.price', 'products.id', 'images.first_resized_image', 'products.stock')
                ->where('products.id', '=', $id)
                ->get();

            if($product[0]->stock == 0){
                return redirect()->back()->with('message_alert', 'Helaas, we hebben geen artikelen meer op voorraad');
            }


            $_SESSION['cart']['products'][$id] = [
                'quantity' => 1,
                'title' => $product[0]->title,
                'price' => $product[0]->price,
                'image' => $product[0]->first_resized_image,
                'id' => $product[0]->id,
                'stock' => $product[0]->stock,
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



    public function preparePayment()
    {
        $doublePrice = number_format($_SESSION['cart']['total'], 2, '.', '');
        $totalPrice = strval($doublePrice);

        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "EUR",
                "value" => $totalPrice
            ],
            "description" => "020 Fietsen",
            "redirectUrl" => route('order.success'),
        ]);

        $payment = Mollie::api()->payments->get($payment->id);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function paymentSuccess() {

        $orderConfirmationData = null;
        $orderProductData = [];
        $totalPrice = null;

        foreach($_SESSION['cart']['products'] as $cartProduct){
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->save();

            $orderProduct = new OrderProduct;
            $orderProduct->quantity = $cartProduct['quantity'];
            $orderProduct->price = $cartProduct['price'];
            $orderProduct->product_id = $cartProduct['id'];
            $orderProduct->order_id = $order->id;
            $orderProduct->save();

            $orderConfirmationData = $orderProduct;
            $orderProductData[] = Product::findOrFail($orderProduct->product_id);
            $totalPrice += $orderProduct->price;

            $product = Product::find($cartProduct['id']);
            $product->stock = $product->stock - $cartProduct['quantity'];
            $product->save();
        }

        Mail::send(new OrderConfirmation($orderConfirmationData, $orderProductData, $totalPrice));

        self::reset();

        return redirect("/success");
    }
}
