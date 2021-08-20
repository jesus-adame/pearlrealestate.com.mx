<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
    
            <form method="POST" action="{{ route('admin.properties.store') }}" enctype="multipart/form-data">
                @csrf
                <div>
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
                
                <div class="mt-4">
                    <x-label for="description" :value="__('Description')" />
                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                </div>

                <div class="mt-4">
                    <x-label for="price" :value="__('price')" />
                    <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
                </div>
                
                <div class="flex w-full">
                    <div class="mt-4 w-1/2">
                        <x-label for="image" :value="__('Image')" />
                        <input id="image" class="block mt-1 w-full"
                            type="file"
                            name="image"
                            required />
                    </div>
                    <div class="mt-4 w-1/2">
                        <x-label for="bedrooms" :value="__('Bedrooms')" />
                        <x-input id="bedrooms" class="block mt-1 w-full"
                            type="text"
                            name="bedrooms" :value="old('bedrooms')" required />
                    </div>
                </div>

                <div class="flex w-full">
                    <div class="mt-4 w-1/2 mx-1">
                        <x-label for="toilets" :value="__('Toilets')" />
                        <x-input id="toilets" class="block mt-1 w-full"
                            type="text"
                            name="toilets" :value="old('toilets')" required />
                    </div>
    
                    <div class="mt-4 w-1/2 mx-1">
                        <x-label for="cars" :value="__('Cars')" />
                        <x-input id="cars" class="block mt-1 w-full"
                            type="text"
                            name="cars" :value="old('cars')" required />
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