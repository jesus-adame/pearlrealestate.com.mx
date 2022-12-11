@section('title', $property->name)

<x-guest-layout>
    <div class="container mx-auto">
        <section class="pt-28 container mx-auto">
            <div class="flex flex-wrap w-full justify-between">
                <div class="w-full lg:pl-10 lg:w-1/2 mx-auto">
                    <a data-fslightbox href="/storage/{{ $property->image }}">
                        <figure class="lg:rounded-md overflow-hidden mb-5">
                            <img class="w-full" src="/storage/{{ $property->image }}" alt="{{ $property->name }}">
                        </figure>
                    </a>
                    <div>
                        <h4 class="font-bold">{{ __('More images') }}</h4>
                        <ul class="flex flex-wrap w-full">
                            @foreach ($property->images as $image)
                                <li class="w-1/4 p-4">
                                    <a href="/storage/{{ $image->path }}" data-fslightbox>
                                        <figure>
                                            <img class="w-full" src="/storage/{{ $image->path }}" alt="{{ $image->name }}">
                                        </figure>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 px-4 md:px-10">
                    <div class="content sm:rounded-md overflow-hidden border-2 border-gray-200">
                        <div class="card-header flex justify-between p-5 border-b-2 border-gray-200">
                            <div class="w-1/2">
                                <h1>{{ $property->name }}</h1>
                                <div class="address flex items-center text-gray-500">
                                    <figure class="w-3 mr-2">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" class="svg-inline--fa fa-map-marker-alt fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                            <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                                        </svg>
                                    </figure>
                                    <p class="font-semibold text-sm xl:text-lg">
                                        {{ $property->cityObj->name ?? null }}, {{ $property->stateObj->name ?? null }}
                                    </p>
                                </div>
                            </div>
                            <div class="text-right ml-auto mt-auto mb-auto w-1/2">
                                <p class="font-bold text-3xl xl:text-4xl p-2 rounded text-green-900 inline-block ml-auto">
                                    $ {!! $property->price !!} <span class="text-2xl">MXN</span>
                                </p>
                            </div>
                        </div>
                        <div class="bg-white p-6">
                            <h3 class="pb-5">Descripción</h3>
                            <div class="font-semibold rounded-md p-4 border-2 border-gray-200">
                                @if ($property->property_status)
                                    <div class="bg-{{ $statusColor }}-500 rounded-md p-2 mb-4 text-center uppercase text-{{ $statusColor }}-50">
                                        <p>{{ __($property->property_status) }}</p>
                                    </div>
                                @endif
                                <p>
                                    {{ $property->description }}
                                </p>
                                <ul class="list-inside font-semibold my-4">
                                    <li>
                                        <div class="flex items-center">
                                            <img class="w-4 mr-2 h-8" src="/images/building-solid.svg" alt="Toilets">
                                            Pisos: {{ $property->floors_number }}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <img class="w-4 mr-2 h-8" src="/images/cube-solid.svg" alt="buildings">
                                            Métros de construcción: {{ $property->building_meters }} m2
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <img class="w-4 mr-2 h-8" src="/images/vector-square-solid.svg" alt="Toilets">
                                            Métros de terreno: {{ $property->ground_meters }} m2
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <img class="w-4 mr-2 h-8" src="/images/hourglass-half-solid.svg" alt="Toilets">
                                            Años de construcción: {{ $property->building_age }} años
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <img class="w-5 mr-2 h-8" src="/images/car-solid.svg" alt="Toilets">
                                            Capacidad de carros: {{ $property->cars }} carros
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <img class="w-5 mr-2 h-8" src="/images/bed-solid.svg" alt="Toilets">
                                            Habitaciones: {{ $property->bedrooms }}
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center">
                                            <img class="w-4 mr-2 h-8" src="/images/toilet-solid.svg" alt="Toilets">
                                            Baños: {{ $property->toilets }}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="py-5 w-full">
                                <h3 class="pb-5">Áreas comunes y amenidades</h3>

                                <ul class="list-disc list-inside font-semibold">
                                    @foreach ($property->amenities as $amenity)
                                        <li>{{ $amenity->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <a href="https://wa.me/+527775335652"
                                target="_blank"
                                class="mt-6 block py-2 px-4 bg-theme uppercase text-theme hover:bg-theme hover:text-theme text-center font-bold rounded-md shadow-md hover:shadow-lg transition duration-300">
                                <span class="flex justify-center">
                                    <figure class="w-5 mr-2">
                                        <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp w-100" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                            <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                                        </svg>
                                    </figure>
                                    Contactar
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container mx-auto my-10" id="properties">
            <h3 class="mb-5 text-3xl">Populares</h3>
            @include('layouts.properties-card')
        </section>
    </div>
</x-guest-layout>
