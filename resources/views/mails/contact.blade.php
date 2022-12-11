@component('mail::message')
# Contacto

{!! $body !!}

Saludos,<br>
{{ config('app.name') }}
@endcomponent
