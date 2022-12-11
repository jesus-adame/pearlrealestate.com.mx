<div class="container mx-auto flex flex-wrap justify-center md:justify-around">
    @foreach ($properties as $property)
        <div class="sm:w-1/2 lg:w-1/3 xl:w-1/4 px-2 mb-4 py-25">
            <div class="bg-white relative shadow hover:shadow-xl transition duration-500 rounded-lg">
                <a class="inline-block" href="{{ route('properties.show', $property->id) }}">
                    <figure class="rounded-t-lg overflow-hidden">
                        <img class="w-full" src="{{ asset('/storage/' . $property->image) }}" alt="{{ $property->name }}"/>
                    </figure>
                </a>
                <div class="py-6 px-8 rounded-lg bg-white">
                    <h1 class="font-bold text-2xl mb-2 hover:text-gray-800 hover:cursor-pointer hover:underline">
                        <a class="inline-block" href="{{ route('properties.show', $property->id) }}">
                            {{ $property->name }}
                        </a>
                    </h1>
                    <div class="address flex items-center text-gray-500">
                        <figure class="w-3 mr-3">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" class="svg-inline--fa fa-map-marker-alt fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                            </svg>
                        </figure>
                        <p>
                            {{ $property->cityObj->name ?? null }}, {{ $property->stateObj->name ?? null }}
                        </p>
                    </div>
                    @if ($property->property_status)
                        @php
                            $color = $property->property_status == 'rent' ? 'yellow' : 'green';
                        @endphp
                        <div class="bg-{{ $color }}-500 text-{{ $color }}-50 inline-block rounded-md p-2 ml-auto my-4 text-center uppercase">
                            <p><strong>{{ __($property->property_status) }}</strong></p>
                        </div>
                    @endif
                    <p class="tracking-wide my-2">
                        {{ $property->description }}
                    </p>
                    <div class="info font-semibold flex items-center justify-around mt-5 cursor-default">
                        <span class="w-20 bg-blue-100 items-center py-2 px-2 rounded-full justify-around flex">
                            {{ $property->bedrooms }} <img class="w-6 h-8 ml-1" src="/images/bed-solid.svg" alt="Beds">
                        </span>
                        <span class="w-20 bg-blue-100 items-center py-2 px-2 rounded-full justify-around flex">
                            {{ $property->toilets }} <img class="w-4 h-8" src="/images/toilet-solid.svg" alt="Toilets">
                        </span>
                        <span class="w-20 bg-blue-100 items-center py-2 px-2 rounded-full justify-around flex">
                            {{ $property->cars }} <img class="w-6 h-8 ml-1" src="/images/car-solid.svg" alt="Garages">
                        </span>
                    </div>
                    <a href="https://wa.me/message/3QS5VGTW5WFHH1"
                        target="_blank"
                        class="mt-6 btn btn-primary">
                        <span class="flex justify-center items-center">
                            <figure class="w-5 mr-2">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="whatsapp" class="svg-inline--fa fa-whatsapp w-100" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                    <path fill="currentColor" d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                                </svg>
                            </figure>
                            WhatsApp
                        </span>
                    </a>
                    <a href="https://m.me/pearlrealstate"
                        target="_blank"
                        class="btn btn-primary mt-5">
                        <span class="flex justify-center items-center">
                            <figure class="w-5 mr-2">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                    <path fill="currentColor" d="M256.55 8C116.52 8 8 110.34 8 248.57c0 72.3 29.71 134.78 78.07 177.94 8.35 7.51 6.63 11.86 8.05 58.23A19.92 19.92 0 0 0 122 502.31c52.91-23.3 53.59-25.14 62.56-22.7C337.85 521.8 504 423.7 504 248.57 504 110.34 396.59 8 256.55 8zm149.24 185.13l-73 115.57a37.37 37.37 0 0 1-53.91 9.93l-58.08-43.47a15 15 0 0 0-18 0l-78.37 59.44c-10.46 7.93-24.16-4.6-17.11-15.67l73-115.57a37.36 37.36 0 0 1 53.91-9.93l58.06 43.46a15 15 0 0 0 18 0l78.41-59.38c10.44-7.98 24.14 4.54 17.09 15.62z"/>
                                </svg>
                            </figure>
                            Messenger
                        </span>
                    </a>
                </div>
                <div class="absolute top-2 right-2 py-1 px-3 bg-green-800 rounded-lg shadow cursor-default">
                    <span class="text-md text-green-50 font-semibold">{{ $property->price }} MXN</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
