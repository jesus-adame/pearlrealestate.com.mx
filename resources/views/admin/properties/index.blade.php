<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <a class="py-1 px-2 bg-gray-900 text-white inline-block rounded" href="{{ route('admin.properties.create') }}">Registrar</a>
                    <br>
                    <table class="table-fixed">
                        <thead>
                            <tr>
                                <th class="w-1/4 text-left">Image</th>
                                <th class="w-1/4 text-left">Title</th>
                                <th class="w-1/4">Slug</th>
                                <th class="w-1/4">description</th>
                                <th class="w-1/4">Features</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                                <tr>
                                    <td class="">
                                        <img class="inline-block h-16" src="/storage/{{ $property->image }}" alt="{{ $property->name }}">
                                    </td>
                                    <td class="text-center">{{ $property->name }}</td>
                                    <td class="text-center">{{ $property->slug }}</td>
                                    <td class="text-center">{{ $property->description }}</td>
                                    <td class="text-center">{{ $property->features }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('admin.properties.destroy', [$property->id]) }}" method="POST">
                                            @csrf @method('delete')
                                            <button class="py-1 px-2 bg-gray-900 text-white inline-block rounded" type="submit">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
