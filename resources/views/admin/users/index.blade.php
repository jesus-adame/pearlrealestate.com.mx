<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                <div class="bg-white border-b border-gray-200">
                    <table class="table-fixed w-full">
                        <thead>
                            <tr>
                                <th class="text-white bg-gray-800 p-2 w-1/6 text-center">Image</th>
                                <th class="text-white bg-gray-800 p-2 w-1/6 text-left">Nombre</th>
                                <th class="text-white bg-gray-800 p-2 w-1/6 text-left">Apellidos</th>
                                <th class="text-white bg-gray-800 p-2 w-1/6">Correo</th>
                                <th class="text-white bg-gray-800 p-2 text-center">
                                    <a class="py-1 px-2 bg-blue-600 hover:bg-blue-700 text-white inline-block rounded" href="{{ route('admin.users.create') }}">
                                        Registrar
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">
                                        <img class="inline-block h-16" src="/storage/{{ $user->image }}" alt="{{ $user->name }}">
                                    </td>
                                    <td class="text-left">{{ $user->name }}</td>
                                    <td class="text-left">{{ $user->last_name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.users.edit', [$user->id]) }}">Editar</a>
                                        <form action="{{ route('admin.users.destroy', [$user->id]) }}" method="POST">
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
