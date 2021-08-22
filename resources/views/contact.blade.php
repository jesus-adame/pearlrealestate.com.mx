<x-guest-layout>
    <div class="container mx-auto pt-20">
        <div class="max-w-screen-xl px-8 grid gap-8 grid-cols-1 md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 py-16 mx-auto text-gray-900 rounded-lg">
            <div class="flex flex-col justify-around">
                <div>
                    <h2 class="text-4xl lg:text-5xl font-bold leading-tight">¡Déjanos tu mensaje!</h2>
                    <div class="text-gray-700 mt-8">
                        <p class="text-xl">
                            Escríbenos y nos comunicaremos lo antes posible, en menos de 24 hrs.
                        </p>
                    </div>
                </div>
                <div class="text-center w-3/4">
                    <img src="/images/pearl_azul2_rgba.png" width="100%" alt="Real Estate">
                </div>
            </div>
            <form id="contact-form" action="{{ route('contact.send') }}"
                method="POST" class="">
                @csrf
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <div>
                    <span class="uppercase text-sm text-gray-600 font-bold">Nombre *</span>
                    <input
                        name="name"
                        class="w-full border-gray-300 bg-gray-100 text-gray-900 mt-2 p-3 rounded-md"
                        type="text" autofocus placeholder="">
                </div>
                <div class="mt-8">
                    <span class="uppercase text-sm text-gray-600 font-bold">Email *</span>
                    <input
                        name="email"
                        class="w-full border-gray-300 bg-gray-100 text-gray-900 mt-2 p-3 rounded-md"
                        type="email">
                </div>
                <div class="mt-8">
                    <span class="uppercase text-sm text-gray-600 font-bold">Teléfono *</span>
                    <input
                        name="phone_number"
                        class="w-full border-gray-300 bg-gray-100 text-gray-900 mt-2 p-3 rounded-md"
                        type="text">
                </div>
                <div class="mt-8">
                    <span class="uppercase text-sm text-gray-600 font-bold">Mensaje *</span>
                    <textarea
                        name="message"
                        class="w-full border-gray-300 h-32 bg-gray-100 text-gray-900 mt-2 p-3 rounded-md"></textarea>
                </div>
                <div class="mt-8">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="my-4" :errors="$errors" />

                    <button
                        type="submit"
                        class="uppercase text-sm font-bold tracking-wide bg-theme hover:bg-theme text-theme p-3 rounded-md w-full transition duration-200 ease-in-out">
                        Enviar mensaje
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
