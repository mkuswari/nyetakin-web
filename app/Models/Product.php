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
        'description',
        'production_price',
        'selling_price',
        'weight',
        'stock',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
