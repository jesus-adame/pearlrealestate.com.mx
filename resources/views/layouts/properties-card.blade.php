<div class="container mx-auto flex flex-wrap justify-center md:justify-around">
    @foreach ($properties as $property)
        <div class="sm:w-1/2 lg:w-1/4 px-2 mb-4 py-25">
            <div class="bg-white relative shadow-lg hover:shadow-xl transition duration-500 rounded-lg">
                <figure>
                    <img class="rounded-t-lg" src="{{ asset('/storage/' . $property->image) }}" alt="{{ $property->name }}"/>
                </figure>
                <div class="py-6 px-8 rounded-lg bg-white">
                    <h1 class="text-gray-700 font-bold text-2xl mb-3 hover:text-gray-900 hover:cursor-pointer">
                        {{ $property->name }}
                    </h1>
                    <p class="text-gray-700 tracking-wide">
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
                    <span class="text-md text-green-700 font-semibold">{{ number_format($property->price) }} MXN</span>
                </div>
            </div>
        </div>
    @endforeach
</div>