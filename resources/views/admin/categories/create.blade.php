<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar categoría') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-2 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-md">
                <div class="bg-white border-b border-gray-200 p-4">
                    <h2>{{ __('Registrar categoría') }}</h2>
                    <x-auth-validation-errors class="my-5" :errors="$errors" />
                    <form
                        class="mt-4"
                        method="POST"
                        action="{{ route('admin.categories.store') }}"
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
                                <div class="flex">
                                    <button
                                        type="submit"
                                        class="text-white py-1 px-5 mt-5 bg-blue-700 hover:bg-blue-900">
                                        {{ __('Submit') }}
                                    </button>
                                    <a
                                        href="{{ url()->previous() }}"
                                        class="text-white py-1 px-5 mt-5 bg-gray-600 hover:bg-gray-800 ml-2">
                                        {{ __('Back') }}
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
