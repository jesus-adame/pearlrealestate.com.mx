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
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="post"
                        action="{{ route('admin.property.add-image', $property->id) }}"
                        enctype="multipart/form-data"
                    >
                        @csrf @method('post')
                        <div class="flex flex-wrap justify-between">
                            <div>
                                <x-label for="image" :value="__('Image')" />
                                <input id="image" class="block mt-1 w-full border-2" type="file" name="image" />
                            </div>
                        </div>
                        <x-button class="mt-4">
                            {{ __('Agregar') }}
                        </x-button>
                    </form>
                    <h3 class="mt-5">{{ $property->name }} {{ __('Images') }}</h3>
                    <ul class="mt-3 flex flex-wrap">
                        @forelse ($property->images as $image)
                            <li class="w-1/4 p-4">
                                <figure>
                                    <img class="w-full" src="/storage/{{ $image->path }}" alt="{{ $image->name }}">
                                    <caption>{{ $image->name }}</caption>
                                </figure>
                                <form
                                    action="{{ route('admin.property.remove-image', [ 'property' => $property->id, 'imageId' => $image->id ]) }}"
                                    method="post">
                                    @csrf @method('put')
                                    <button
                                        type="submit"
                                        class="text-white py-1 px-4 mt-2 bg-red-600 hover:bg-red-800">
                                        Eliminar
                                    </button>
                                </form>
                            </li>
                        @empty
                            <li><p>No hay imágenes registradas.</p></li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
