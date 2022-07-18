<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartController extends Controller
{
    use CartTrait;

    public function index()
    {
        $cart = Cart::where('uuid', $this->getCartId())
            ->orWhere('user_id', Auth::id())
            ->get();
        $total = $cart->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

//        foreach ($cart as $item) {
//            $total += $item->quantity * $item->product->price;
//        }
        return view('store.cart', ['cart' => $cart, 'total' => $total]);
    }
    public function checkout()
    {
        $cart = Cart::where('uuid', $this->getCartId())
            ->orWhere('user_id', Auth::id())
            ->get();
        if ($cart->count() == 0){
            abort(404);
        }
        $total = $cart->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

//        foreach ($cart as $item) {
//            $total += $item->quantity * $item->product->price;
//        }
        return view('store.checkout', ['cart' => $cart, 'total' => $total]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|min:1',
        ]);

        $cart = Cart::where('uuid', $this->getCartId())
            ->where('product_id', $request->product_id)->first();
        $quantity = $request->post('quantity', 1);
        if ($cart) {
            $cart->increment('quantity', $quantity);
        } else {
            $cart = Cart::create([
                'uuid' => $this->getCartId(),
                'user_id' => Auth::id(),
                'product_id' => $request->post('product_id'),
                'quantity' => $quantity
            ]);
        }
        return redirect()->back()->with('success',
            "Product {$cart->product->title} Added");

    }



    public function update(Request $request)
    {
        //        $request->validate([
//            'item_id' => 'required',
//            'quantity' => 'required',
//        ]);
        foreach ($request->items as $item_id => $quantity) {
            $cart = Cart::where('id', $item_id)
                ->where('uuid', $this->getCartId())->first();

            $cart = Cart::where('id', $item_id)
                ->where('uuid', $this->getCartId())
                ->update([
                    'quantity' => $quantity
                ]);
        }
        return redirect()->back()->with('success',
            "Cart Updated");

    }

    public function itemDestroy($id)
    {
        Cart::where('id', $id)->where('uuid', $this->getCartId())->delete();
        return redirect()->back()->with('success',
            "Product deleted");
    }

    public function destroy()
    {
        Cart::where('uuid', $this->getCartId())
            ->orWhere('user_id', Auth::id())->delete();
        Cookie::expire('cart_id');
        return redirect()->back()->with('success',
            "Product deleted");

    }
}


