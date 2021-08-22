<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CityController extends Controller
{
    public function getJson()
    {
        abort_if(!request()->ajax(), 404);

        $citiesJson = file_get_contents(public_path("/assets/municipios.json"));
        $cities = new Collection(json_decode($citiesJson));

        if (request('term')) {
            $citiesFounded = $cities->filter(function ($citiy) {
                return strpos(strtolower($citiy->name), strtolower(request()->term)) !== false;
            })
            ->take(20);
        } else {
            $citiesFounded = $cities->take(20);
        }

        $jsonResponse = $citiesFounded->map(function ($city) {
                return [
                    'id' => $city->inegi_id,
                    'text' => $city->name,
                ];
            })
            ->values();

        return response()->json($jsonResponse);
    }
}
