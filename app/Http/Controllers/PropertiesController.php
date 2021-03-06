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

    public function show(Property $property)
    {
        $properties = Property::orderByDesc('updated_at')
            ->limit(4)
            ->get();

        return view('properties.show', compact('property', 'properties'));
    }
}
