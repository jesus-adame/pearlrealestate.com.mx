<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        
        return view('admin.properties.index', compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.properties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropertyRequest $request)
    {
        $data = [
            'agent_id'    => $request->user()->id,
            'owner_id'    => null,
            'name'        => $request->name,
            'slug'        => Str::random(5),
            'description' => $request->description,
            'state'       => $request->state,
            'city'        => $request->city,
            'address'     => $request->address,
            'price'       => $request->price,
            'image'       => $request->file('image')->store('properties'),
        ];

        $features = [
            'toilets'         => $request->toilets,
            'bedrooms'        => $request->bedrooms,
            'cars'            => $request->cars,
            'floors'          => $request->floors,
            'building_meters' => $request->building_meters,
            'ground_meters'   => $request->ground_meters,
            'building_age'    => $request->building_age,
        ];

        $data['features'] = json_encode($features);

        Property::create($data);

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Resgistrado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.properties.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        return view('admin.properties.edit', compact('property'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $data = [
            'agent_id'    => $request->user()->id,
            'owner_id'    => null,
            'name'        => $request->name,
            'slug'        => Str::random(5),
            'description' => $request->description,
            'state'       => $request->state,
            'city'        => $request->city,
            'address'     => $request->address,
            'price'       => $request->price,
            'image'       => $request->file('image')->store('properties'),
        ];

        $features = [
            'toilets'         => $request->toilets,
            'bedrooms'        => $request->bedrooms,
            'cars'            => $request->cars,
            'floors'          => $request->floors,
            'building_meters' => $request->building_meters,
            'ground_meters'   => $request->ground_meters,
            'building_age'    => $request->building_age,
        ];

        Storage::delete($property->image);

        $data['features'] = json_encode($features);

        $property->update($data);

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        Storage::delete($property->image);

        $property->delete();

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Eliminado correctamente');
    }
}
