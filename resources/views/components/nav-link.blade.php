@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-2 mx-1 my-5 rounded-md text-sm font-medium leading-5 text-white bg-[#1E3C13] focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-4 py-2 mx-1 my-5 rounded-md text-sm font-medium leading-5 text-[#5A8457] hover:text-white dark:hover:text-white hover:bg-[#1E3C13] focus:outline-none focus:text-white dark:focus:text-white focus:bg-[#1E3C13] transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>