@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ' mb-2 border-gray-300 text-black bg-gray focus:border-green-500 focus:ring-green-500 rounded-md shadow-sm']) !!}>
