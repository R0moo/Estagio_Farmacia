@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['type'=>'radio', 'class' => 'w-4 h-4 checked:bg-green-500 checked:border-green-500 focus:ring-green-500 focus:ring-offset-2 focus:ring-2 checked:hover:bg-green-500 checked:focus:bg-green-500']) !!}>
