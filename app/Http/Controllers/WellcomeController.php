<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class WellcomeController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        return view('welcome', compact('properties'));
    }
}
