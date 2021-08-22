@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 py-2 border-b-2 border-theme text-sm font-medium leading-5 text-theme-link underline transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 py-2 border-b-2 border-transparent text-sm font-medium underline leading-5 text-theme-link hover:text-yellow-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
