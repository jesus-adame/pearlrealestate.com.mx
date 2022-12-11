<x-app-layout x-data="{ property: {{ $property }} }">
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $property->name }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-2 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-md">
                <div class="bg-white border-b border-gray-200 p-4">
                    <h2>Agregar propietario</h2>
                    <x-auth-validation-errors class="my-5" :errors="$errors" />
                    <form
                        class="mt-4"
                        method="POST"
                        action="{{ route('admin.property.add-owner', [$property->id]) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf
                        <div class="flex flex-wrap justify-between">
                            <div class="w-full md:w-1/2 px-2">
                                <div>
                                    <x-label for="name" :value="__('Name') . '*'" />
                                    <x-input
                                        id="name"
                                        class="block mt-1 w-full"
                                        type="text"
                                        name="name"
                                        :value="old('name')"
                                        autofocus
                                    />
                                </div>
                                <div class="mt-2">
                                    <x-label for="last_name" :value="__('Last name') . '*'" />
                                    <x-input
                                        id="last_name"
                                        class="block mt-1 w-full"
                                        type="text"
                                        name="last_name"
                                        :value="old('last_name')"
                                        autofocus
                                    />
                                </div>
                                <div class="mt-2">
                                    <x-label for="last_name_second" :value="__('Last name second')" />
                                    <x-input
                                        id="last_name_second"
                                        class="block mt-1 w-full"
                                        type="text"
                                        name="last_name_second"
                                        :value="old('last_name_second')"
                                        autofocus
                                    />
                                </div>
                                <div class="mt-2">
                                    <x-label for="phone_number" :value="__('Phone number') . '*'"/>
                                    <x-input
                                        id="phone_number"
                                        class="block mt-1 w-full"
                                        type="text"
                                        name="phone_number"
                                        :value="old('phone_number')"
                                        autofocus
                                    />
                                </div>
                                <div class="mt-2">
                                    <x-label for="email" :value="__('Email')" />
                                    <x-input
                                        id="email"
                                        class="block mt-1 w-full"
                                        type="email"
                                        name="email"
                                        :value="old('email')"
                                        autofocus
                                    />
                                </div>
                                <button
                                    type="submit"
                                    class="text-white py-1 px-5 mt-5 bg-blue-700 hover:bg-blue-900">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
