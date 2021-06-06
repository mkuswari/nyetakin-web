<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showWishlist()
    {
        $wishlists = Wishlist::with('product')->where([
            "user_id" => Auth::user()->id,
        ])->get();

        return view('frontoffice.wishlists.index', compact('wishlists'));
    }

    public function addToWishlist(Request $request)
    {

        // Check if item already exist in cart
        $checkItem = Wishlist::where([
            "product_id" => $request->product_id,
            "user_id" => Auth::user()->id,
        ])->count();
        if ($checkItem > 0) {
            session()->flash('error', 'Item sudah ada dalam wishlist');
            return redirect()->back();
        }
        Wishlist::create([
            "user_id" => Auth::user()->id,
            "product_id" => $request->product_id,
        ]);

        session()->flash('success', 'Item berhasil ditambahkan ke wishlist');
        return redirect()->back();
    }

    public function deleteWishList($id)
    {
        $wishlist = Wishlist::find($id);

        $wishlist->delete();

        session()->flash('success', 'Item berhasil dihapus dari wishlist');
        return redirect()->back();
    }
}
