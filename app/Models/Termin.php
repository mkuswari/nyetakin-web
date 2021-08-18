<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termin extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'start', 'end', 'notes'
    ];

    public function photo()
    {
        return $this->hasMany('App\Models\Photo');
    }
}
