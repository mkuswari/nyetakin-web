<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo('App\Model\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
}
