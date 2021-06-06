<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'thumbnail',
        'short_description',
        'long_description',
        'initial_price',
        'selling_price',
        'weight',
        'stock',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function cart()
    {
        return $this->hasMany('App\Model\Cart');
    }

    public function wishlist()
    {
        return $this->hasMany('App\Model\Wishlist');
    }
}
