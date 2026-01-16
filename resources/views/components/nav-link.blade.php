@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-sage-400 text-sm font-medium leading-5 text-sage-700 focus:outline-none focus:border-sage-600 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-soft-600 hover:text-soft-800 hover:border-soft-300 focus:outline-none focus:text-soft-800 focus:border-soft-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
