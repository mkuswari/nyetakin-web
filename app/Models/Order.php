<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "invoice_number",
        "name",
        "phone",
        "email",
        "province_destination",
        "city_destination",
        "courier",
        "services",
        "address",
        "zip_code",
        "total_billing",
        "status",
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
