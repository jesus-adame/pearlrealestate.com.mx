<x-app-layout x-data="{ properties: {{ $properties }} }">
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Owners') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-2 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-md">
                <div class="bg-white border-b border-gray-200 p-4">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
