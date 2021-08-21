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
                            <x-label for="name" value="Nombre" />
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                        </div>
                        
                        <div class="mt-4">
                            <x-label for="description" value="Descripción" />
                            <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                        </div>
        
                        <div class="mt-4">
                            <x-label for="address" value="Dirección" />
                            <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                        </div>
        
                        <div class="mt-4">
                            <x-label for="price" value="Precio" />
                            <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 px-2">
                        <div class="flex w-full">
                            <div class="mt-4 w-full">
                                <x-label for="image" value="Image" />
                                <input id="image" class="block mt-1 w-full"
                                    type="file"
                                    name="image"
                                    required />
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="toilets" value="Baños" />
                                <x-input id="toilets" class="block mt-1 w-full"
                                    type="text"
                                    name="toilets" :value="old('toilets')" required />
                            </div>
            
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="cars" value="Carros" />
                                <x-input id="cars" class="block mt-1 w-full"
                                    type="text"
                                    name="cars" :value="old('cars')" required />
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="toilets" value="Métros cuadrados de constucción" />
                                <x-input id="toilets" class="block mt-1 w-full"
                                    type="text"
                                    name="toilets" :value="old('toilets')" required />
                            </div>
            
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="cars" value="Métros cuadrados de terreno" />
                                <x-input id="cars" class="block mt-1 w-full"
                                    type="text"
                                    name="cars" :value="old('cars')" required />
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="toilets" value="Antugüedad de construcción (Años)" />
                                <x-input id="toilets" class="block mt-1 w-full"
                                    type="text"
                                    name="toilets" :value="old('toilets')" required />
                            </div>
                            <div class="mt-4 w-1/2 mx-1">
                                <x-label for="toilets" value="Número de pisos" />
                                <x-input id="toilets" class="block mt-1 w-full"
                                    type="text"
                                    name="toilets" :value="old('toilets')" required />
                            </div>
                        </div>
                        <div class="flex w-full">
                            <div class="mt-4 w-1/2">
                                <x-label for="bedrooms" value="Recámaras" />
                                <x-input id="bedrooms" class="block mt-1 w-full"
                                    type="text"
                                    name="bedrooms" :value="old('bedrooms')" required />
                            </div>
                        </div>
                    </div>
                </div>              
                <div class="py-4">
                    <h3>Amenidades</h3>
                </div>
                <div class="flex flex-wrap justify-between w-full">
                    <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                        <input type="checkbox" name="kitchen" id="kitchen">
                        <x-label for="kitchen" value="Cocina" />
                    </div>
                    <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                        <input type="checkbox" name="living_room" id="living_room">
                        <x-label for="living_room" value="Sala" />
                    </div>
                    <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                        <input type="checkbox" name="fireplace" id="fireplace">
                        <x-label for="fireplace" value="Chimenea" />
                    </div>
                    <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                        <input type="checkbox" name="pool" id="pool">
                        <x-label for="pool" value="Alberca" />
                    </div>
                    <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                        <input type="checkbox" name="jacuzzi" id="jacuzzi">
                        <x-label for="jacuzzi" value="Jacuzzi" />
                    </div>
                </div>
                <div class="flex flex-wrap justify-between w-full">
                    <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                        <input type="checkbox" name="laundry_room" id="laundry_room">
                        <x-label for="laundry_room" value="Cuarto de lavado" />
                    </div>
                    <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                        <input type="checkbox" name="cistern" id="cistern">
                        <x-label for="cistern" value="Cisterna" />
                    </div>
                    <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                        <input type="checkbox" name="terrace" id="terrace">
                        <x-label for="terrace" value="Terraza" />
                    </div>
                    <div class="mt-4 flex items-center space-x-2 w-1/3 md:w-1/5 mx-1">
                        <input type="checkbox" name="firepit" id="firepit">
                        <x-label for="firepit" value="Firepit" />
                    </div>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>