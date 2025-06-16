@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' mb-2 cursor-pointer file:cursor-pointer file:mr-2 file:rounded-md file:border-0 file:bg-[#0eac0e] file:px-4 file:py-2 file:text-sm file:font-semibold file:text-white hover:file:bg-[#5A8457] ...']) !!}>
