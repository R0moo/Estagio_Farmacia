@props(['size' => 'text-2xl'])

@php
$classes = "font-['Poetsen_One'] {$size} text-gray-800 dark:text-gray-200";
@endphp

<style>
@import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital,wght@0,100..700;1,100..700&display=swap');
.header_description{
    font-family: "Josefin Sans", sans-serif;
    font-style: italic;
    font-size: 14px;
    color: #3e693e;
    margin: 15px 0 25px;
    margin-left: 0;
    text-align: center;
    white-space: normal;
    flex-grow: 0;
}

.header_description:hover {
    background-color: var(--cor-hover);
    transition: ease 0.3s;
}

   
</style>

<h4 {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</h4>