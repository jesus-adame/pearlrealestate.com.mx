<?php

namespace App\Http\Controllers\Admin;

use App\Models\Amenity;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AmenityController extends Controller
{
    public function index()
    {
        $amenities = Amenity::all();

        return view('admin.amenities.index', compact('amenities'));
    }

    public function create()
    {
        return view('admin.amenities.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => [ 'required', 'min:3', 'max:255' ],
        ]);

        $data = [
            'slug' => Str::slug($request->name),
            'name' => $request->name,
        ];

        $amenity = new Amenity($data);
        $amenity->save();

        return redirect()
            ->route('admin.amenities.index')
            ->with('success', 'Registrada correctamente.');
    }

    public function destroy(Amenity $amenity)
    {
        $amenity->delete();

        return redirect()->back()
            ->with('success', 'Eliminada correctamente.');
    }
}
