<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class StateController extends Controller
{
    public function getJson()
    {
        abort_if(!request()->ajax(), 404);

        $states_json = file_get_contents(public_path("/assets/estados.json"));
        $states_colection = new Collection(json_decode($states_json));

        $states = $states_colection->filter(function ($state) {
                return strpos(strtolower($state->name), strtolower(request()->term)) !== false;
            })
            ->take(25)
            ->map(function ($state) {
                return [
                    'text' => $state->name,
                    'id' => $state->id,
                ];
            })
            ->values();

        return response()->json($states);
    }
}
