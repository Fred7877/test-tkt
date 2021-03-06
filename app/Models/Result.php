<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    protected $fillable = [
        'ca',
        'margin',
        'ebitda',
        'loss',
        'year'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
