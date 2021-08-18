<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'termin_id', 'name', 'nim', 'faculty', 'major', 'file', 'whatsapp', 'payment_slip', 'status'
    ];

    public function termin()
    {
        return $this->belongsTo('App\Models\Termin');
    }
}
