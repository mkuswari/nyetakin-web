<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'receipt_number'
    ];

    public function Order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
