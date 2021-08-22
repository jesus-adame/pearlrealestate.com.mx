<x-guest-layout>
    @include('layouts.carousel')
    <div class="relative z-10
        bg-gray-50 w-4/5
        lg:w-2/3 lg:-mt-40
        mx-auto p-10
        shadow-md border-t-8
        border-theme
        rounded">
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
    <section class="my-24">
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
