@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-[#5A8457]']) }}>
    {{ $value ?? $slot }}
</label>
