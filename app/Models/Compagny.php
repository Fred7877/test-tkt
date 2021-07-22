<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Relationships\CompagnyRelationships;

class Compagny extends Model
{
    use HasFactory;
    use CompagnyRelationships;

    protected $fillable = [
        'name',
        'sector',
        'siren'
    ];

    protected $hidden = ['created_at', 'updated_at'];
}
