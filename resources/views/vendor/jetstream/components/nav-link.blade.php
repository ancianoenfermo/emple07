@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-pink-900 text-sm font-medium leading-5 text-white focus:outline-none focus:border-indigo-700 transition'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-white text-opacity-75 hover:text-opacity-100 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }} itemprop="url">
    {{ $slot }}
</a>
