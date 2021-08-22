<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class StateController extends Controller
{
    public function getJson()
    {
        abort_if(!request()->ajax(), 404);

        $statesJson = file_get_contents(public_path("/assets/estados.json"));
        $states     = new Collection(json_decode($statesJson));
        $statesFounded = [];

        if (request('term')) {
            $statesFounded = $states->filter(function ($state) {
                return strpos(strtolower($state->name), strtolower(request()->term)) !== false;
            });
        } else {
            $statesFounded = $states;
        }

        $statesFounded->take(25)
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
