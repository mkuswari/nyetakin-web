<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function addReview(Request $request)
    {

        Review::create([
            "product_id" => $request->product_id,
            "user_id" => Auth::user()->id,
            "review_contents" => $request->review_contents,
            "rating" => $request->rating,
        ]);

        session()->flash('success', 'Review berhasil dikirim');

        return redirect()->back();
    }

    public function confirmPayment()
    {

    }
}
