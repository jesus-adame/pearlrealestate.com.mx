<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'owner_id',
        'name',
        'slug',
        'description',
        'price',
        'image',
        'features',
    ];

    public function getToiletsAttribute()
    {
        $features = json_decode($this->features, true);

        return $features['toilets'] ?? null;
    }

    public function getBedroomsAttribute()
    {
        $features = json_decode($this->features, true);

        return $features['bedrooms'] ?? null;
    }

    public function getCarsAttribute()
    {
        $features = json_decode($this->features, true);

        return $features['cars'] ?? null;
    }
}
