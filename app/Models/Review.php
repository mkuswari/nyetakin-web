<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        "product_id", "user_id", "review_contents", "rating"
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
