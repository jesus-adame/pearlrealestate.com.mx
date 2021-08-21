<div class="container mx-auto flex flex-wrap justify-center md:justify-around">
    @foreach ($properties as $property)
        <div class="sm:w-1/2 lg:w-1/4 px-2 mb-4 py-25">
            <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                <figure>
                    <img class="rounded-t-lg" src="{{ asset('/storage/' . $property->image) }}" alt="{{ $property->name }}"/>
                </figure>
                <div class="py-6 px-8 rounded-lg bg-white">
                    <h1 class="font-bold text-2xl mb-2 hover:text-gray-800 hover:cursor-pointer hover:underline">
                        <a class="block" href="{{ route('properties.show', [$property->id]) }}">{{ $property->name }}</a>
                    </h1>
                    <div class="address flex items-center text-gray-500">
                        <figure class="w-3 mr-3">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="map-marker-alt" class="svg-inline--fa fa-map-marker-alt fa-w-12" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path fill="currentColor" d="M172.268 501.67C26.97 291.031 0 269.413 0 192 0 85.961 85.961 0 192 0s192 85.961 192 192c0 77.413-26.97 99.031-172.268 309.67-9.535 13.774-29.93 13.773-39.464 0zM192 272c44.183 0 80-35.817 80-80s-35.817-80-80-80-80 35.817-80 80 35.817 80 80 80z"></path>
                            </svg>
                        </figure>
                        
                        <p class="">
                            {{ $property->cityObj->name ?? null }}, {{ $property->stateObj->name ?? null }}
                        </p>
                    </div>
                    <p class="tracking-wide mt-4">
                        {{ $property->description }}
                    </p>
                    <div class="info font-semibold flex items-center justify-around mt-4">
                        <span class="w-16 justify-around flex">{{ $property->bedrooms }} <img class="w-8 h-8" src="/images/bed-solid.svg" alt="Beds"></span>
                        <span class="w-16 justify-around flex">{{ $property->toilets }} <img class="w-8 h-8" src="/images/toilet-solid.svg" alt="Toilets"></span>
                        <span class="w-16 justify-around flex">{{ $property->cars }} <img class="w-8 h-8" src="/images/car-solid.svg" alt="Garages"></span>
                    </div>
                    <a href="https://wa.me/+527775335652"
                        target="_blank"
                        class="mt-6 block py-2 px-4 bg-yellow-400 hover:bg-yellow-500 text-center text-gray-800 font-bold rounded-md shadow-md hover:shadow-lg transition duration-300">
                        <span class="flex justify-center">
                            <img class="w-5 mr-2" src="/images/whatsapp-brands.svg" alt="WhatsApp">
                            Contactar
                        </span>
                    </a>
                </div>
                <div class="absolute top-2 right-2 py-1 px-3 bg-white rounded-lg shadow cursor-default">
                    <span class="text-md text-green-700 font-semibold">{{ $property->price }} MXN</span>
                </div>
            </div>
        </div>
    @endforeach
</div>