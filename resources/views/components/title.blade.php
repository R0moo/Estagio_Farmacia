@props(['size' => 'text-2xl'])

@php
$classes = "font-['Poetsen_One'] {$size} text-gray-800 dark:text-gray-200";
@endphp

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poetsen+One&display=swap');
    .branco{
    font-family: "Poetsen One", sans-serif;
    font-size: 36px;
    color: white;
    text-shadow: 1px 1px #3e693e;
    margin-right: 8px;
    }

    .verde{
    font-family: "Poetsen One", sans-serif;
    font-size: 36px;
    color: #5A8457;
    text-shadow: 1px 1px #3e693e;
    }

    .card-verde{
    font-family: "Poetsen One", sans-serif;
    color: #5A8457;
    font-size: 1.5rem;
    text-align: center;
    text-shadow: 1px 1px #3e693e;
    }
    
</style>

<h1 {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</h1>