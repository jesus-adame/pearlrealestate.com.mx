<x-app-layout x-data="{ property: {{ $property }} }">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('admin.properties.update', $property->id) }}" enctype="multipart/form-data">
                @csrf @method('put')
                <div class="flex flex-wrap justify-between">
                    <div class="w-full md:w-1/2 px-2">
                        <div>
                            <x-label for="name" :value="__('Property name')" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $property->name)" autofocus />
                        </div>

                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $property->description)" />
                        </div>

                        <div class="mt-4">
                            <x-label for="state" :value="__('State')" />
                            <select id="state" class="block mt-1 w-full border-gray-300 rounded-md select-states" name="state">
                                <option value="">- {{ __('Select') }} -</option>
                                @if ($property->state)
                                    <option value="{{ $property->stateObj->id }}" selected>{{ $property->stateObj->name }}</option>
                                @endif
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="city" :value="__('City')" />
                            <select id="city" class="block mt-1 w-full border-gray-300 rounded-md select-cities" name="city">
                                <option value="">- {{ __('Select') }} -</option>
                                @if ($property->state)
                                    <option value="{{ $property->cityObj->inegi_id }}" selected>{{ $property->cityObj->name }}</option>
                                @endif
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="address" :value="__('Address')" />
                            <x-input type="text" id="address" class="block mt-1 w-full border-gray-300 rounded-md" name="address" :value="old('address', $property->address)"/>
                        </div>

                        <div class="mt-4">
                            <x-label for="price" :value="__('Price')" />
                            <x-input id="price" class="block mt-1 w-full" type="number" name="price" :value="old('price', $property->price_value)" />
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-2">
                        <div class="w-full">
                            <figure class="h-20 mx-auto overflow-hidden">
                                <img class="h-full" src="/storage/{{ $property->image }}" alt="{{ $property->image }}">
                            </figure>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-full">
                                <x-label for="image" :value="__('Image')" />
                                <input id="image" class="block mt-1 w-full"
                                    type="file"
                                    name="image"/>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="toilets" :value="__('Bathrooms')" />
                                <x-input id="toilets" class="block mt-1 w-full"
                                    type="text"
                                    name="toilets" :value="old('toilets', $property->toilets)"/>
                            </div>

                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="cars" :value="__('Parking capacity')" />
                                <x-input id="cars" class="block mt-1 w-full"
                                    type="text"
                                    name="cars" :value="old('cars', $property->cars)"/>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="building_meters" :value="__('Build size (m2)')" />
                                <x-input id="building_meters" class="block mt-1 w-full"
                                    type="text"
                                    name="building_meters" :value="old('building_meters', $property->building_meters)"/>
                            </div>

                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="ground_meters" :value="__('Land size (m2)')" />
                                <x-input id="ground_meters" class="block mt-1 w-full"
                                    type="text"
                                    name="ground_meters" :value="old('ground_meters', $property->ground_meters)"/>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="building_age" :value="__('Age of construction')" />
                                <x-input id="building_age" class="block mt-1 w-full"
                                    type="text"
                                    name="building_age" :value="old('building_age', $property->building_age)"/>
                            </div>
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="floors_number" :value="__('Floors number')" />
                                <x-input id="floors_number" class="block mt-1 w-full"
                                    type="text"
                                    name="floors_number" :value="old('floors_number', $property->floors_number)"/>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2">
                                <x-label for="bedrooms" value="Recámaras" />
                                <x-input id="bedrooms" class="block mt-1 w-full"
                                    type="text"
                                    name="bedrooms" :value="old('bedrooms', $property->bedrooms)"/>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2">
                                <x-label for="property_status" value="Estatus" />
                                <select id="property_status"
                                    class="block mt-1 w-full border-gray-300 rounded-md"
                                    name="property_status"
                                >
                                    <option value="">- {{ __('Select') }} -</option>
                                    <option @if ($property->property_status == 'sale') selected @endif value="sale">Venta</option>
                                    <option @if ($property->property_status == 'rent') selected @endif value="rent">Renta</option>
                                    <option @if ($property->property_status == 'vacational_rent') selected @endif value="vacational_rent">Renta vacacional</option>
                                    <option @if ($property->property_status == 'disabled') selected @endif value="disabled">Inhabilitada</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="py-4">
                    <h3>{{ __('Amenities') }}</h3>
                </div>
                <div class="flex flex-wrap justify-between w-full">
                    @foreach ($amenities as $amenity)
                        <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                            <input type="checkbox"
                                name="amenities[{{ $amenity->slug }}]"
                                id="{{ $amenity->slug }}"
                                @if ($property->amenities->firstWhere('slug', $amenity->slug)) checked="checked" @endif>
                            <x-label for="{{ $amenity->slug }}" value="{{ $amenity->name }}" />
                        </div>
                    @endforeach
                </div>
                <div class="py-4">
                    <h3>{{ __('Categories') }}</h3>
                </div>
                <div class="flex flex-wrap justify-between w-full">
                    @foreach ($categories as $category)
                        <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                            <input type="checkbox"
                                name="categories[{{ $category->slug }}]"
                                id="{{ $category->slug }}"
                                @if ($property->categories->firstWhere('slug', $category->slug)) checked="checked" @endif>
                            <x-label for="{{ $category->slug }}" value="{{ $category->name }}" />
                        </div>
                    @endforeach
                </div>
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Update') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
    <input id="initState" type="hidden" value="{{ $property->state }}">
    <input id="initCity" type="hidden" value="{{ $property->state }}">
</x-app-layout>
