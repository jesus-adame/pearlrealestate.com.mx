<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmenityProperty extends Model
{
    use HasFactory;

    protected $table = 'amenity_property';

    public $timestamps = false;

    protected $fillable = [
        'amenity_id',
        'property_id',
    ];
}
