@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-soft-700']) }}>
    {{ $value ?? $slot }}
</label>
