<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CityController extends Controller
{
    public function getJson()
    {
        abort_if(!request()->ajax(), 404);

        $cities_json = file_get_contents(public_path("/assets/municipios.json"));
        $cities_colection = new Collection(json_decode($cities_json));

        $cities = $cities_colection->filter(function ($citiy) {
                return strpos(strtolower($citiy->name), strtolower(request()->term)) !== false;
            })
            ->take(15)
            ->map(function ($city) {
                return [
                    'id' => $city->inegi_id,
                    'text' => $city->name,
                ];
            })
            ->values();

        return response()->json($cities);
    }
}
