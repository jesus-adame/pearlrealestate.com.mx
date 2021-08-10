<x-guest-layout>
    <div class="mx-auto w-full pt-16 md:pt-0" style="max-width: 3000px">
        <div class="splide w-full">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <div class="overflow-hidden relative" style="max-height: 700px; min-height: 700px">
                            <img class="filter brightness-50" src="/images/slide5.jpg" alt="Pearl Estate" width="100%">
                            <div class="absolute top-0 bottom-0 right-0 left-0 m-auto w-full max-w-7xl h-52 p-5">
                                <p class="text-4xl text-gray-50 uppercase mb-4" style="text-shadow: 1px 2px 2px #000">
                                    Encuentra tu lugar ideal
                                </p>
                                <p class="text-white w-96" style="text-shadow: 1px 2px 2px #000">
                                    Somos una empresa dedicada en vender mas que solo metros cuadrados,
                                    nos enfocamos en darte la mejor opción en distribución arquitectónica, según sea sus
                                    distintas necesidades
                                </p>
                                <a href="#properties" class="mt-6 py-2 px-6 font-semibold hover:bg-yellow-600 bg-yellow-500 inline-block uppercase text-center shadow-md transition duration-300">Conoce más</a>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="overflow-hidden relative" style="max-height: 700px; min-height: 700px">
                            <img class="filter brightness-50" src="/images/slide1.jpg" alt="Pearl Estate" width="100%">
                            <div class="absolute top-0 bottom-0 right-0 left-0 m-auto w-full max-w-7xl h-52 p-5">
                                <p class="text-4xl text-gray-50 uppercase mb-4" style="text-shadow: 1px 2px 2px #000">
                                    Encuentra tu lugar ideal
                                </p>
                                <p class="text-white w-96" style="text-shadow: 1px 2px 2px #000">
                                    Somos una empresa dedicada en vender mas que solo metros cuadrados,
                                    nos enfocamos en darte la mejor opción en distribución arquitectónica, según sea sus
                                    distintas necesidades
                                </p>
                                <a href="#properties" class="mt-6 py-2 px-6 font-semibold hover:bg-yellow-600 bg-yellow-500 inline-block uppercase text-center shadow-md transition duration-300">Conoce más</a>
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <div class="overflow-hidden relative" style="max-height: 700px; min-height: 700px">
                            <img class="filter brightness-50" src="/images/slider1.jpg" alt="Pearl Estate" width="100%">
                            <div class="absolute top-0 bottom-0 right-0 left-0 m-auto w-full max-w-7xl h-52 p-5">
                                <p class="text-4xl text-gray-50 uppercase mb-4" style="text-shadow: 1px 2px 2px #000">
                                    Encuentra tu lugar ideal
                                </p>
                                <p class="text-white w-96" style="text-shadow: 1px 2px 2px #000">
                                    Somos una empresa dedicada en vender mas que solo metros cuadrados,
                                    nos enfocamos en darte la mejor opción en distribución arquitectónica, según sea sus
                                    distintas necesidades
                                </p>
                                <a href="#properties" class="mt-6 py-2 px-6 font-semibold hover:bg-yellow-600 bg-yellow-500 inline-block uppercase text-center shadow-md transition duration-300">Conoce más</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="relative z-10 bg-gray-50 w-2/3 md:w-1/2 mx-auto p-10 shadow-md border-t-8 border-yellow-500 rounded"
        style="margin-top: -150px;">
        <div class="flex flex-wrap text-center justify-between">
            <div class="md:w-1/3 mb-4">
                <img class="h-8 w-full" src="/images/home-solid.svg" alt="Workflow">
                <h3 class="mt-2">Renta</h3>
                <p class="mt-5 px-2">
                    Encuentra aquí todas las opciones que tenemos para ti de casas departamentos amueblados y mucho más.
                </p>
                <x-nav-link class="mt-5" href="{{ route('properties.index') }}">Ver información</x-nav-link>
            </div>
            <div class="md:w-1/3 mb-4">
                <img class="h-8 w-full" src="/images/tags-solid.svg" alt="Workflow">
                <h3 class="mt-2">Compra</h3>
                <p class="mt-5 px-2">
                    Busca las Mejores opciones para compra de casas en todo México. ¡Estamos actualizando diariamente nuestras bases de datos!
                </p>
                <x-nav-link class="mt-5" href="{{ route('properties.index') }}">Ver información</x-nav-link>
            </div>
            <div class="md:w-1/3 mb-4">
                <img class="h-8 w-full" src="/images/sign-solid.svg" alt="Workflow">
                <h3 class="mt-2">Vende</h3>
                <p class="mt-5 px-2">
                    Registrate gratis con nosotros y empieza a publicar tus propiedades.
                </p>
                <x-nav-link class="mt-5" href="{{ route('properties.index') }}">Ver información</x-nav-link>
            </div>
        </div>
    </div>
    <section>
        <div class="container mx-auto mb-20">
            <h1 class="text-center my-10">Pearl Real Estate</h1>

            <p class="text-center my-10">
                Somos una empresa dedicada en vender mas que solo metros cuadrados, nos enfocamos en darte la mejor
                opción en distribución arquitectónica, según sea sus distintas necesidades
            </p>
        </div>
    </section>

    <section id="properties">
        @include('layouts.properties-card')
    </section>
</x-guest-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let config = {
            arrows: true,
            autoplay: true,
            perPage: 1,
            speed: 200,
            pauseOnFocus: false,
            rewind: true,
        };
        new Splide('.splide', config).mount();
    });
</script>
