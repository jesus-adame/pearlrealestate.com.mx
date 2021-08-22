<x-guest-layout>
    <div class="container mx-auto pt-28">
        <section class="py-5 px-4 rounded border shadow border-gray-300 mb-5">
            <div class="flex justify-between">
                <h1 class="text-gray-700">Propiedades</h1>
                <form class="flex items-center" action="{{ route('properties.index') }}">
                    <input class="border-gray-300" type="text" name="search" id="search" placeholder="Buscar...">
                    <button type="submit">
                        <figure class="w-6 -ml-10">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search w-full" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path fill="#c1c1c1" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path>
                            </svg>
                        </figure>
                    </button>
                </form>
            </div>
        </section>
        <section>
            @include('layouts.properties-card')
        </section>
    </div>
</x-guest-layout>