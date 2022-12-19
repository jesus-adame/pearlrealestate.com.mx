
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-md">
                <div class="bg-white border-b border-gray-200">
                    <table class="table-fixed w-full">
                        <caption class="hidden">{{ __('Categories') }}</caption>
                        <thead>
                            <tr>
                                <th class="text-white bg-gray-800 p-2 w-40 text-center">{{ __('Slug') }}</th>
                                <th class="text-white bg-gray-800 p-2 w-40 text-center">{{ __('Name') }}</th>
                                <th class="text-white bg-gray-800 p-2 w-40 text-center">
                                    <a href="{{ route('admin.categories.create') }}"
                                    class="py-1 px-2 bg-blue-600 hover:bg-blue-700 text-white inline-block rounded"
                                    >
                                        {{ __('Register') }}
                                    </a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="text-center">{{ $category->slug }}</td>
                                    <td class="text-center">{{ $category->name }}</td>
                                    <td class="text-center">
                                        <form
                                            action="{{ route('admin.categories.destroy', $category->id) }}"
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
                                    <td colspan="3" class="p-2 text-center">No hay categorias registradas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>