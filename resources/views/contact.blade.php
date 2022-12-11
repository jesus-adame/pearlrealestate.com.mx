@section('title', "Contacto")

<x-guest-layout>
    <div class="container mx-auto pt-20 text-gray-900">
        <div class="max-w-screen-xl grid gap-8 grid-cols-1 md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 py-16 mx-auto">
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
                method="POST">
                @csrf @method('post')
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                @if (session()->has('success'))
                    <div class="text-green-800 bg-green-200 p-4 mb-5">
                        <p>{{ session()->get('success') }}</p>
                    </div>
                @endif

                <!-- Validation Errors -->
                <x-auth-validation-errors class="my-4" :errors="$errors" />

                <div>
                    <span class="uppercase text-sm text-gray-600 font-bold">{{ __('Name') }} *</span>
                    <input
                        name="name"
                        class="w-full border-gray-300 bg-gray-100 text-gray-900 mt-2 p-3 rounded-md"
                        type="text" autofocus value="{{ old('name') }}">
                </div>
                <div class="mt-8">
                    <span class="uppercase text-sm text-gray-600 font-bold">{{ __('Email') }} *</span>
                    <input
                        name="email"
                        class="w-full border-gray-300 bg-gray-100 text-gray-900 mt-2 p-3 rounded-md"
                        type="email"
                        value="{{ old('email') }}">
                </div>
                <div class="mt-8">
                    <span class="uppercase text-sm text-gray-600 font-bold">{{ __('Phone number') }} *</span>
                    <input
                        name="phone_number"
                        class="w-full border-gray-300 bg-gray-100 text-gray-900 mt-2 p-3 rounded-md"
                        type="text"
                        value="{{ old('phone_number') }}">
                </div>
                <div class="mt-8">
                    <span class="uppercase text-sm text-gray-600 font-bold">{{ __('Message') }}</span>
                    <textarea
                        name="message"
                        class="w-full border-gray-300 h-32 bg-gray-100 text-gray-900 mt-2 p-3 rounded-md"></textarea>
                </div>
                <div class="mt-8">
                    <button
                        type="submit"
                        data-sitekey="6Ldwt3AjAAAAABqaJVX8YmX_jW6XZ3o05U750PwK"
                        data-callback='onSubmit'
                        data-action='submit'
                        class="g-recaptcha btn btn-primary">
                        {{ __('Send message') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>

@push('scripts')
    <script>
        function onSubmit(token) {
            document.getElementById("contact-form").submit();
        }
    </script>
@endpush
