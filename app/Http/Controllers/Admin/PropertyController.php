<?php

namespace App\Http\Controllers\Admin;

use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePropertyRequest;
use App\Http\Requests\UpdatePropertyRequest;
use App\Models\Amenity;
use App\Models\AmenityProperty;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        $amenities = Amenity::all();
        return view('admin.properties.create', compact('amenities'));
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
            'property_status' => $request->property_status,
        ];

        $features = [
            'toilets'         => $request->toilets,
            'bedrooms'        => $request->bedrooms,
            'cars'            => $request->cars,
            'floors'          => $request->floors_number,
            'building_meters' => $request->building_meters,
            'ground_meters'   => $request->ground_meters,
            'building_age'    => $request->building_age,
        ];

        $data['features'] = json_encode($features);

        $amenities = Amenity::all();

        $property = Property::create($data);

        foreach ($amenities as $amenity) {
            if ($request->input($amenity->slug)) {
                AmenityProperty::create([
                    'amenity_id' => $amenity->id,
                    'property_id' => $property->id,
                ]);
            }
        }

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

    public function showPropertyImages(Property $property)
    {
        return view('admin.properties.property-images', compact('property'));
    }

    public function addImage(Request $request, Property $property)
    {
        $request->validate([
            'image' => [ 'required', 'file', 'image' ]
        ]);

        /** @var \Illuminate\Http\UploadedFile */
        $imageFile = $request->file('image');

        // Store image in the server
        $imagePath = $imageFile->store('properties');

        // Create image
        $imageDTO = [
            'slug' => $imageFile->getClientOriginalName(),
            'name' => $imageFile->getClientOriginalName(),
            'path' => $imagePath,
        ];

        /** @var Image */
        $image = new Image($imageDTO);

        $property->images()->save($image);

        return redirect()
            ->route('admin.property.images', [ $property->id ])
            ->with('success', 'Resgistrado correctamente')
        ;
    }

    public function removeImage(Property $property, $imageId)
    {
        $property->images()->detach($imageId);

        return redirect()
            ->route('admin.property.images', [ $property->id ])
            ->with('success', 'Resgistrado correctamente')
        ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $amenities = Amenity::all();

        $states_json = collect(json_decode(file_get_contents(public_path("/assets/estados.json"))));

        return view('admin.properties.edit', compact('property', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropertyRequest $request, Property $property)
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
            'property_status' => $request->property_status,
        ];

        $features = [
            'toilets'         => $request->toilets,
            'bedrooms'        => $request->bedrooms,
            'cars'            => $request->cars,
            'floors'          => $request->floors_number,
            'building_meters' => $request->building_meters,
            'ground_meters'   => $request->ground_meters,
            'building_age'    => $request->building_age,
        ];

        if ($request->file('image')) {
            Storage::delete($property->image);
            $data['image'] = $request->file('image')->store('properties');
        }

        $amenities = Amenity::all();

        $property->amenities()->detach();

        foreach ($amenities as $amenity) {
            if ($request->input($amenity->slug)) {
                AmenityProperty::create([
                    'amenity_id' => $amenity->id,
                    'property_id' => $property->id,
                ]);
            }
        }

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
