<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                <div class="bg-white border-b border-gray-200">
                    <table class="table-fixed w-full">
                        <caption class="hidden">{{ __('Users table') }}</caption>
                        <thead>
                            <tr>
                                <th class="text-white bg-gray-800 p-2 w-40 text-center">{{ __('Name') }}</th>
                                <th class="text-white bg-gray-800 p-2 w-40 text-center">{{ __('Last name') }}</th>
                                <th class="text-white bg-gray-800 p-2 w-40">{{ __('Email') }}</th>
                                <th class="text-white bg-gray-800 p-2 w-40 text-center">
                                    <a class="py-1 px-2 bg-blue-600 hover:bg-blue-700 text-white inline-block rounded"
                                        href="{{ route('admin.users.create') }}">
                                        {{ __('Register') }}
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $user->name }}</td>
                                    <td class="text-center">{{ $user->last_name }}</td>
                                    <td class="text-center">{{ $user->email }}</td>
                                    <td class="text-center">
                                        <a class="w-30 my-1 rounded text-white py-1 px-6 inline-block bg-yellow-500"
                                            href="{{ route('admin.users.edit', [$user->id]) }}">
                                            {{ __('Edit') }}
                                        </a>
                                        <form action="{{ route('admin.users.destroy', [$user->id]) }}" method="POST">
                                            @csrf @method('delete')
                                            <button
                                                class="py-1 px-4 bg-red-700 text-white inline-block rounded"
                                                type="submit">
                                                {{ __('Delete') }}
                                            </button>
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
