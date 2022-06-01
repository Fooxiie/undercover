@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'inline-flex items-center px-1 pt-1 border-b-2 border-plot
                text-sm font-medium leading-5 text-gray-100
                focus:outline-none focus:border-plot transition duration-150
                ease-in-out'
                : 'inline-flex items-center px-1 pt-1 border-b-2
                border-transparent text-sm font-medium leading-5
                text-gray-100 hover:text-plot hover:border-plot
                focus:outline-none focus:text-plot focus:border-plot
                transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
