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
        'state',
        'address',
        'city',
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

    public function getBuildingMetersAttribute()
    {
        $features = json_decode($this->features, true);

        return $features['building_meters'] ?? null;
    }
    
    public function getGroundMetersAttribute()
    {
        $features = json_decode($this->features, true);

        return $features['ground_meters'] ?? null;
    }

    public function getBuildingAgeAttribute()
    {
        $features = json_decode($this->features, true);

        return $features['building_age'] ?? null;
    }

    public function getFloorsNumberAttribute()
    {
        $features = json_decode($this->features, true);

        return $features['floors'] ?? null;
    }

    public function getStateObjAttribute()
    {
        $states_json = collect(json_decode(file_get_contents(public_path("/assets/estados.json"))));

        return $states_json->firstWhere('id', $this->state) ?? null;
    }

    public function getCityObjAttribute()
    {
        $cities_json = collect(json_decode(file_get_contents(public_path("/assets/municipios.json"))));
        return $cities_json->firstWhere('inegi_id', $this->city) ?? null;
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }
}
