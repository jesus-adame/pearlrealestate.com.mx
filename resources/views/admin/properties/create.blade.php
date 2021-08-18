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
    
                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Name')" />
    
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>
    
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="description" :value="__('description')" />
    
                    <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description')" required />
                </div>
    
                <!-- Password -->
                <div class="mt-4">
                    <x-label for="image" :value="__('image')" />
    
                    <input id="image" class="block mt-1 w-full"
                        type="file"
                        name="image"
                        required />
                </div>
    
                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="features" :value="__('Features')" />
    
                    <x-input id="features" class="block mt-1 w-full"
                        type="text"
                        name="features" required />
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