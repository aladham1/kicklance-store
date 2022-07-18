<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

trait CartTrait
{
    protected function getCartId($delete = null)
    {
        $id = Cookie::get('cart_id');
        if (!$id) {
            Cookie::queue('cart_id', Str::uuid(), 60 * 24 * 7);
        }
        return $id;
    }
}
