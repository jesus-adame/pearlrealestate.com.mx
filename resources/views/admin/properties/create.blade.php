<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-wrap justify-between">
                    <div class="w-full md:w-1/2 px-2">
                        <div>
                            <x-label for="name" :value="__('Name')" />
                            <x-input
                                id="name"
                                class="block mt-1 w-full"
                                type="text"
                                name="name"
                                :value="old('name')"
                                autofocus
                            />
                        </div>

                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')" />
                            <x-input
                                id="description"
                                class="block mt-1 w-full"
                                type="text"
                                name="description"
                                :value="old('description')"
                            />
                        </div>

                        <div class="mt-4">
                            <x-label for="state" :value="__('State')" />
                            <select
                                id="state"
                                class="block mt-1 w-full border-gray-300 rounded-md select-states"
                                name="state">
                                <option value="">- {{ __('Select') }} -</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="city" :value="__('City')" />
                            <select
                                id="city"
                                class="block mt-1 w-full border-gray-300 rounded-md select-cities"
                                name="city">
                                <option value="">- {{ __('Select') }} -</option>
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="address" :value="__('Address')" />
                            <x-input
                                type="text"
                                id="address"
                                class="block mt-1 w-full border-gray-300 rounded-md"
                                name="address"
                                :value="old('address')"
                            />
                        </div>

                        <div class="mt-4">
                            <x-label for="price" :value="__('Price')" />
                            <x-input
                                id="price"
                                class="block mt-1 w-full"
                                type="number"
                                name="price"
                                :value="old('price')"
                            />
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-2">
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
                                    name="toilets" :value="old('toilets')"/>
                            </div>

                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="cars" :value="__('Parking capacity')" />
                                <x-input id="cars" class="block mt-1 w-full"
                                    type="text"
                                    name="cars"
                                    :value="old('cars')"/>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="building_meters" :value="__('Build size (m2)')" />
                                <x-input id="building_meters" class="block mt-1 w-full"
                                    type="text"
                                    name="building_meters" :value="old('building_meters')"/>
                            </div>

                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="ground_meters" :value="__('Land size (m2)')" />
                                <x-input id="ground_meters" class="block mt-1 w-full"
                                    type="text"
                                    name="ground_meters" :value="old('ground_meters')"/>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="building_age" :value="__('Building age')" />
                                <x-input id="building_age" class="block mt-1 w-full"
                                    type="text"
                                    name="building_age" :value="old('building_age')"/>
                            </div>
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="floors_number" :value="__('Floors number')" />
                                <x-input id="floors_number" class="block mt-1 w-full"
                                    type="text"
                                    name="floors_number" :value="old('floors_number')"/>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2">
                                <x-label for="bedrooms" :value="__('Bedrooms')" />
                                <x-input id="bedrooms" class="block mt-1 w-full"
                                    type="text"
                                    name="bedrooms" :value="old('bedrooms')"/>
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2">
                                <x-label for="property_status" :value="__('Status')" />
                                <select
                                    id="property_status"
                                    class="block mt-1 w-full border-gray-300 rounded-md"
                                    name="property_status"
                                >
                                    <option value="">- {{ __('Select') }} -</option>
                                    <option value="sale">{{ __('Sale') }}</option>
                                    <option value="rent">{{ __('Rent') }}</option>
                                    <option value="vacational_rent">{{ __('Vacational rent')}}</option>
                                    <option value="disabled">{{ __('Disabled') }}</option>
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
                            <input type="checkbox" name="{{ $amenity->slug }}" id="{{ $amenity->slug }}">
                            <x-label for="{{ $amenity->slug }}" value="{{ $amenity->name }}" />
                        </div>
                    @endforeach
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Submit') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
