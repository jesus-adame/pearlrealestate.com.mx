<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Properties') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 px-2 lg:px-8">
            <div class="bg-white overflow-auto shadow-sm sm:rounded-md">
                <div class="bg-white border-b border-gray-200">
                    <table class="table-fixed w-full">
                        <thead>
                            <tr>
                                <th class="text-white bg-gray-800 p-2 w-16 text-center">Imagen</th>
                                <th class="text-white bg-gray-800 p-2 w-24 text-center">Slug</th>
                                <th class="text-white bg-gray-800 p-2 w-40 text-left">Título</th>
                                <th class="text-white bg-gray-800 p-2 w-40">Descripción</th>
                                <th class="text-white bg-gray-800 p-2 w-20 text-right">Precio</th>
                                <th class="text-white bg-gray-800 p-2 w-20 text-center">Galería</th>
                                <th class="text-white bg-gray-800 p-2 w-40 text-center">
                                    <a class="py-1 w-20 bg-blue-600 hover:bg-blue-700 text-white inline-block rounded" href="{{ route('admin.properties.create') }}">
                                        Registrar
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                                <tr>
                                    <td class="text-center">
                                        <img class="inline-block h-16" src="/storage/{{ $property->image }}" alt="{{ $property->name }}">
                                    </td>
                                    <td class="text-center">{{ $property->slug }}</td>
                                    <td class="text-left">{{ $property->name }}</td>
                                    <td class="text-center">{{ $property->description }}</td>
                                    <td class="text-right">{{ $property->price }}</td>
                                    <td class="text-right">
                                        <a class="text-blue-500" href="{{ route('admin.property.images', [ $property->id ]) }}">Ver imágenes</a>
                                    </td>
                                    <td class="text-center">
                                        <a class="w-20 my-1 rounded py-1 inline-block bg-yellow-300" href="{{ route('admin.properties.edit', $property->id) }}">Editar</a>
                                        <form action="{{ route('admin.properties.destroy', [ $property->id ]) }}" method="POST">
                                            @csrf @method('delete')
                                            <button class="py-1 my-1 w-20 bg-gray-900 text-white inline-block rounded" type="submit">Eliminar</button>
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
