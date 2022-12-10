<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use HasFactory, SoftDeletes;

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

    public function getPriceAttribute($value)
    {
        return number_format($value);
    }

    public function getPriceValueAttribute()
    {
        return str_replace(',', '', $this->price);
    }

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

    public function scopeSearch($query, $value)
    {
        if (empty($value)) {
            return $query;
        }

        $states = collect(json_decode(file_get_contents(public_path("/assets/estados.json"))));
        $cities = collect(json_decode(file_get_contents(public_path("/assets/municipios.json"))));

        $citiesFinded = $cities->filter(function ($city) use ($value) {
            return false !== stristr($city->name, $value);
        });

        $statesFinded = $states->filter(function ($state) use ($value) {
            return false !== stristr($state->name, $value);
        });

        $sqlSearch = $query->where('name', 'LIKE', "%{$value}%")
            ->orWhere('description', 'LIKE', "%{$value}%");

        foreach ($statesFinded as $state) {
            $sqlSearch->orWhere('state', 'LIKE', "%{$state->id}%");
        }

        foreach ($citiesFinded as $city) {
            $sqlSearch->orWhere('city', 'LIKE', "%{$city->inegi_id}%");
        }

        return $sqlSearch;
    }

    public function getStateObjAttribute()
    {
        $states = collect(json_decode(file_get_contents(public_path("/assets/estados.json"))));

        return $states->firstWhere('id', $this->state) ?? null;
    }

    public function getCityObjAttribute()
    {
        $cities = collect(json_decode(file_get_contents(public_path("/assets/municipios.json"))));
        return $cities->firstWhere('inegi_id', $this->city) ?? null;
    }

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class);
    }
}
