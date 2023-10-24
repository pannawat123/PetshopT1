<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pettype;
use App\Models\Pet;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function viewCart()
    {
        $cart_items = Session::get('cart_items');
        return view('cart/index', compact('cart_items'));
    }

    public function addToCart($id)
    {
        $pet = Pet::find($id);
        $cart_items = Session::get('cart_items');
        if (is_null($cart_items)) {
            $cart_items = array();
        }

        $qty = 0;
        if (array_key_exists($pet->id, $cart_items)) {
            $qty = $cart_items[$pet->id]['qty'];
        }

        $cart_items[$pet['id']] = array( 
        'id' => $pet->id,
        'name' => $pet->petname,
        'gender' => $pet->gender,
        'price' => $pet->price,
        'qty' => $qty + 1,
        'image_url' => $pet->image_url
    );
    Session::put('cart_items', $cart_items);
    // return compact('cart_items');
    return redirect('cart/view');
    }

    public function deleteCart($id)
    {
        $cart_items = Session::get('cart_items');
        unset($cart_items[$id]);
        Session::put('cart_items', $cart_items);
        return redirect('cart/view');
    }

    public function updateCart($id, $qty)
    {
        $pet = Pet::find($id);

        $cart_items = Session::get('cart_items');
        $cart_items[$id]['qty'] = $qty;
        $cart_items[$id]['price'] = $qty * $pet->price;
        Session::put('cart_items', $cart_items);
        return redirect('cart/view');
    }


}
