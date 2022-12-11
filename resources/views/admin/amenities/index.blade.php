
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Amenities') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                <div class="bg-white border-b border-gray-200">
                    <table class="table-fixed w-full">
                        <caption class="hidden">{{ __('Amenities') }}</caption>
                        <thead>
                            <tr>
                                <th class="text-white bg-gray-800 p-2 w-40 text-center">{{ __('Name') }}</th>
                                <th class="text-white bg-gray-800 p-2 w-40 text-center">
                                    <a href="{{ route('admin.amenities.create') }}"
                                    class="py-1 px-2 bg-blue-600 hover:bg-blue-700 text-white inline-block rounded"
                                    >
                                        {{ __('Register') }}
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($amenities as $amenity)
                                <tr>
                                    <td class="text-center">{{ $amenity->name }}</td>
                                    <td class="text-center">
                                        <form
                                            action="{{ route('admin.amenities.destroy', $amenity->id) }}"
                                            method="post">
                                            @csrf @method('delete')
                                            <button
                                                type="submit"
                                                class="text-white py-1 px-4 my-1 bg-red-600 hover:bg-red-800">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2">No hay amenidades registradas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>