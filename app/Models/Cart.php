<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        "session_id",
        "user_id",
        "product_id",
        "quantity",
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public static function countUserCart()
    {
        $cart = Cart::where("user_id", Auth::user()->id)->count();
        return $cart;
    }
}
