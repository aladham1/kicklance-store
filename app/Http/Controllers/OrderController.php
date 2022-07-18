<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    use CartTrait;

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required',
        ]);
        $cart = Cart::where('uuid', $this->getCartId())
            ->orWhere('user_id', Auth::id())
            ->get();
        $total = $cart->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
        $request['total'] = $total;

        DB::beginTransaction();
        try {
            $order = Order::create($request->all());
            foreach ($cart as $item) {
                OrderProduct::create([
                    'product_id' => $item->product_id,
                    'order_id' => $order->id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }
            Cart::where('uuid', $this->getCartId())
                ->orWhere('user_id', Auth::id())->delete();
            if ($request->has('create_account')){
                $user = User::create([
                    'name' => $request->first_name .' '.$request->last_name,
                    'username' => $request->first_name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]);

                event(new Registered($user));

                Auth::login($user);
            }

            DB::commit();
        } catch (\Throwable $exception) {
            DB::rollBack();
            return redirect()->back()->with('error',
                "Error Please try again");
        }


        return redirect()->route('store')->with('success',
            "Your order has been created");
    }


}
