<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use Illuminate\Support\Collection;
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
        $cities_json = file_get_contents(public_path("/assets/municipios.json"));
        $cities = new Collection(json_decode($cities_json));

        $states_json = file_get_contents(public_path("/assets/estados.json"));
        $states = new Collection(json_decode($states_json));
        
        return view('admin.properties.create', compact('cities', 'states'));
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
            'agent_id' => $request->user()->id,
            'owner_id' => null,
            'name' => $request->name,
            'slug' => Str::random(5),
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->file('image')->store('properties'),
        ];

        $features = [
            'toilets' => $request->toilets,
            'bedrooms' => $request->bedrooms,
            'cars' => $request->cars,
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
    public function edit($id)
    {
        return view('admin.properties.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
