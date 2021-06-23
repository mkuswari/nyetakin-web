<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function addReview(Request $request)
    {

        // $request->validate([
        //     // "product_id" => "required",
        //     "user_id" => "required",
        //     "review_contents" => "required",
        //     "rating" => "required",
        // ]);

        $review = Review::create([
            "product_id" => $request->product_id,
            "user_id" => Auth::user()->id,
            "review_contents" => $request->review_contents,
            "rating" => $request->rating,
        ]);

        dd($review);

        session()->flash('success', 'Review berhasil dikirim');

        return redirect()->back();
    }
}
