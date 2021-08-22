<x-guest-layout>
    <div class="container mx-auto">
        <section class="pt-28 container mx-auto">
            <div>
                <div class="flex flex-wrap">
                    <figure class="w-full md:w-1/2 mx-auto lg:rounded-md overflow-hidden mb-5">
                        <img class="w-full" src="/storage/{{ $property->image }}" alt="{{ $property->name }}">
                    </figure>
                    
                    <div class="w-full md:w-1/2 px-4 md:px-10">
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
                                        <p class="font-semibold">
                                            {{ $property->cityObj->name ?? null }}, {{ $property->stateObj->name ?? null }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-right ml-auto mt-auto mb-auto w-1/2">
                                    <p class="font-bold text-2xl lg:text-4xl p-2 rounded text-green-900 inline-block ml-auto">
                                        $ {!! $property->price !!} <span class="text-2xl">MXN</span>
                                    </p>
                                </div>
                            </div>
                            <div class="bg-white p-6">
                                <h3 class="pb-5">Descripción</h3>
                                <div class="font-semibold rounded-md p-4 border-2 border-gray-200">
                                    <p>
                                        {{ $property->description }}
                                    </p>
                                    <ul class="list-disc list-inside font-semibold">
                                        <li></li>
                                    </ul>
                                </div>

                                <div class="info font-semibold flex items-center justify-around my-10">
                                    <span class="w-24 justify-around flex">
                                        {{ $property->bedrooms }} <img class="w-8 h-8" src="/images/bed-solid.svg" alt="Beds">
                                    </span>
                                    <span class="w-24 justify-around flex">
                                        {{ $property->toilets }} <img class="w-8 h-8" src="/images/toilet-solid.svg" alt="Toilets">
                                    </span>
                                    <span class="w-24 justify-around flex">
                                        {{ $property->cars }} <img class="w-8 h-8" src="/images/car-solid.svg" alt="Garages">
                                    </span>
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
                                    class="mt-6 block py-2 px-4 bg-theme text-theme hover:bg-yellow-500 text-center font-bold rounded-md shadow-md hover:shadow-lg transition duration-300">
                                    <span class="flex justify-center">
                                        <img class="w-5 mr-2" src="/images/whatsapp-brands.svg" alt="WhatsApp">
                                        Contactar
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container mx-auto my-40" id="properties">
            <h3 class="mb-5 text-3xl">Populares</h3>
            @include('layouts.properties-card')
        </section>
    </div>
</x-guest-layout>