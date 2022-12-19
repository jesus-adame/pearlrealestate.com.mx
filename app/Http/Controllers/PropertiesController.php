<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function index()
    {
        $searchWord = request('search');

        $properties = Property::orderByDesc('updated_at')
            ->search($searchWord)
            ->get();

        return view('properties.index', compact('properties'));
    }

    public function show(string $slug)
    {
        abort_if(is_numeric($slug), 404);

        $property = Property::where('slug', $slug)
            ->first()
        ;

        abort_if(empty($property), 404);

        $properties = Property::orderByDesc('updated_at')
            ->limit(4)
            ->get()
        ;

        $statusColor = 'green';

        if ($property->property_status == 'rent'):
            $statusColor = 'yellow';
        endif;

        return view('properties.show', compact('property', 'properties', 'statusColor'));
    }
}
