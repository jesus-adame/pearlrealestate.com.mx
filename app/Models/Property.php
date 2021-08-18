<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillabled = [
        'agent_id',
        'owner_id',
        'name',
        'slug',
        'description',
        'image',
        'features',
    ];
}
