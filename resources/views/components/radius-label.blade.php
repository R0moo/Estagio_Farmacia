@props(['value'])

<label {{ $attributes->merge(['class' => 'flex items-center justify-items-center justify-center gap-1 px-3 py-2 cursor-pointer has-[:checked]:bg-green-100 has-[:checked]:rounded-md has-[:checked]:border-green-500 has-[:checked]:text-green-800 transition-colors duration-200 ease-in-out mr-4']) }}>
    {{ $value ?? $slot }}
</label>
