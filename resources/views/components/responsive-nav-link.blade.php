@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-sage-400 text-start text-base font-medium text-sage-700 bg-sage-50 focus:outline-none focus:text-sage-800 focus:bg-sage-100 focus:border-sage-700 transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-soft-600 hover:text-soft-800 hover:bg-soft-50 hover:border-soft-300 focus:outline-none focus:text-soft-800 focus:bg-soft-50 focus:border-soft-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
