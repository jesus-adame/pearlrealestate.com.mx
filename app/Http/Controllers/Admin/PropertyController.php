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
use App\Models\Category;
use App\Models\Image;
use App\Models\Owner;
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
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'state'       => $request->state,
            'city'        => $request->city,
            'address'     => $request->address,
            'price'       => $request->price,
            'image'       => $request->file('image')->store('properties'),
            'property_status' => $request->property_status,
        ];

        $features = $request->only([
            'toilets',
            'bedrooms',
            'cars',
            'floors_number',
            'building_meters',
            'ground_meters',
            'building_age',
        ]);

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
            ->with('success', 'Registrado correctamente')
        ;
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
            ->with('success', 'Agregada correctamente')
        ;
    }

    public function removeImage(Property $property, $imageId)
    {
        $property->images()->detach($imageId);

        return redirect()
            ->route('admin.property.images', [ $property->id ])
            ->with('success', 'Removida correctamente')
        ;
    }

    public function createOwner(Property $property)
    {
        return view('admin.properties.create-owner', compact('property'));
    }

    public function addOwner(Request $request, Property $property)
    {
        $request->validate([
            'name'      => [ 'required', 'min:3', 'max:25' ],
            'last_name' => [ 'required', 'min:3', 'max:25' ],
            'last_name_second' => [ 'nullable', 'min:3', 'max:255' ],
            'phone_number' => [ 'required', 'min:10', 'max:17' ],
            'email'     => [ 'nullable', 'email', 'max:255' ],
        ]);

        $ownerDTO = $request->only([
            'name',
            'last_name',
            'last_name_second',
            'phone_number',
            'email',
        ]);

        $owner = new Owner($ownerDTO);
        $owner->save();

        $property->owner()->associate($owner);
        $property->save();

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Agregado correctamente')
        ;
    }

    public function removeOwner(Property $property)
    {
        $property->owner()->dissociate();
        $property->save();

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Removido correctamente')
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
        $categories = Category::all();

        $states_json = collect(json_decode(file_get_contents(public_path("/assets/estados.json"))));

        return view('admin.properties.edit', compact('property', 'amenities', 'categories'));
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
            'slug'        => Str::slug($request->name),
            'description' => $request->description,
            'state'       => $request->state,
            'city'        => $request->city,
            'address'     => $request->address,
            'price'       => $request->price,
            'property_status' => $request->property_status,
        ];

        $features = $request->only([
            'toilets',
            'bedrooms',
            'cars',
            'floors_number',
            'building_meters',
            'ground_meters',
            'building_age',
        ]);

        $data['features'] = json_encode($features);

        $property->categories()->detach();
        $property->amenities()->detach();

        $catSelected = [];
        $amenitiesSelected = [];

        foreach ($request->get('categories') ?? [] as $index => $status) {
            $catSelected[] = $index;
        }

        $categories = Category::whereIn('slug', $catSelected)->get();

        foreach ($request->get('amenities') ?? [] as $index => $status) {
            $amenitiesSelected[] = $index;
        }

        $amenities = Amenity::whereIn('slug', $amenitiesSelected)->get();

        $property->categories()->saveMany($categories);
        $property->amenities()->saveMany($amenities);
        $property->refresh();

        if ($request->file('image')) {
            Storage::delete($property->image);
            $data['image'] = $request->file('image')->store('properties');
        }

        $property->update($data);

        return redirect()
            ->route('admin.properties.index')
            ->with('success', 'Actualizada correctamente')
        ;
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
