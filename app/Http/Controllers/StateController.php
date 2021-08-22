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
            })
            ->take(20);

        } else {
            $statesFounded = $states->take(20);
        }

        $jsonResponse = $statesFounded->map(function ($state) {
            return [
                'text' => $state->name,
                'id' => $state->id,
            ];
        })
        ->values();

        return response()->json($jsonResponse);
    }
}
