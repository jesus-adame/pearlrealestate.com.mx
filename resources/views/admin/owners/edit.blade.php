<x-app-layout x-data="{ owner: {{ $owner }} }">
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $owner->name }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-2 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-md">
                <div class="bg-white border-b border-gray-200 p-4">
                    <h2>Editar propietario</h2>
                    <x-auth-validation-errors class="my-5" :errors="$errors" />
                    <form
                        class="mt-4"
                        method="POST"
                        action="{{ route('admin.owners.update', [ $owner->id ]) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf @method('put')
                        <div class="flex flex-wrap justify-between">
                            <div class="w-full md:w-1/2 px-2">
                                <div>
                                    <x-label for="name" :value="__('Name') . '*'" />
                                    <x-input
                                        id="name"
                                        class="block mt-1 w-full"
                                        type="text"
                                        name="name"
                                        :value="old('name', $owner->name)"
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
                                        :value="old('last_name', $owner->last_name)"
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
                                        :value="old('last_name_second', $owner->last_name_second)"
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
                                        :value="old('phone_number', $owner->phone_number)"
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
                                        :value="old('email', $owner->email)"
                                        autofocus
                                    />
                                </div>
                                <div class="flex">
                                    <button
                                        type="submit"
                                        class="text-white py-1 px-5 mt-5 bg-blue-700 hover:bg-blue-900">
                                        {{ __('Submit') }}
                                    </button>
                                    <a
                                        href="{{ url()->previous() }}"
                                        class="text-white py-1 px-5 mt-5 bg-gray-600 hover:bg-gray-800 ml-2">
                                        Volver
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
