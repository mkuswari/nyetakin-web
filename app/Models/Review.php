<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Model\Product');
    }
}
