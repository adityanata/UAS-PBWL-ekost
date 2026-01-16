@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-soft-300 focus:border-sage-400 focus:ring-sage-300 rounded-soft shadow-soft bg-soft-50 text-soft-900 placeholder-soft-400']) }}>
