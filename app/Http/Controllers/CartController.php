<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $this->validate($request, [
            "product_id" => "required",
            "quantity" => "required",
        ]);

        // Generate sesson is if not exist
        $sessionId = Session::get("session_id");
        if (empty($sessionId)) {
            $sessionId = Session::getId();
            Session::put("session_id", $sessionId);
        }

        // Check if item already exist in cart
        $checkItem = Cart::where([
            "product_id" => $request->product_id,
        ])->count();
        if ($checkItem > 0) {
            session()->flash('error', 'Item sudah ada dalam keranjang');
            return redirect()->back();
        }

        Cart::create([
            "session_id" => $sessionId,
            "product_id" => $request->product_id,
            "user_id" => Auth::user()->id,
            "quantity" => $request->quantity,
        ]);

        session()->flash("success", "Item berhasil ditambahkan ke keranjang");
        return redirect()->back();
    }
}
