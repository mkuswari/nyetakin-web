<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class CartController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showCart()
    {
        $carts = Cart::with("product")->where([
            "user_id" => Auth::user()->id
        ])->get();

        return view('frontoffice.cart.index', compact('carts'));
    }

    public function addToCart(Request $request)
    {
        $this->validate($request, [
            "product_id" => "required",
            "quantity" => "required",
        ]);

        // Check if item already exist in cart
        $checkItem = Cart::where([
            "product_id" => $request->product_id,
            "user_id" => Auth::user()->id,
        ])->count();
        if ($checkItem > 0) {
            session()->flash('error', 'Item sudah ada dalam keranjang');
            return redirect()->back();
        }

        Cart::create([
            "product_id" => $request->product_id,
            "user_id" => Auth::user()->id,
            "quantity" => $request->quantity,
        ]);

        // check if item exist on wishlist items, then delete item
        $onWishlist = Wishlist::where([
            "product_id" => $request->product_id,
            "user_id" => Auth::user()->id,
        ]);

        $onWishlist->delete();

        session()->flash("success", "Item berhasil ditambahkan ke keranjang");
        return redirect()->back();
    }

    public function updateCartQty(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            Cart::where("id", $data["cart"])->update(['quantity' => $data["qty"]]);
            $carts = Cart::with("product")->where([
                "user_id" => Auth::user()->id
            ])->get();
            return response()->json([
                'view' => (string)View::make('frontoffice.cart.items', compact("carts"))
            ]);
        }
    }

    public function removeCartItem($id)
    {
        $cart = Cart::find($id);

        $cart->delete();

        session()->flash('success', 'Item berhasil dihapus dari keranjang');
        return redirect()->route("cart");
    }
}
