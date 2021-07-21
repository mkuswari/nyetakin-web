<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        "order_id", "name", "total_amount", "payment_slip",
    ];

    public function orders()
    {
        return $this->belongsTo('App\Models\Orders');
    }
}
