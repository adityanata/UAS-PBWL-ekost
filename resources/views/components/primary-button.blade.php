<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-sage-500 border border-transparent rounded-soft font-semibold text-xs text-white uppercase tracking-widest hover:bg-sage-600 focus:bg-sage-600 active:bg-sage-700 focus:outline-none focus:ring-2 focus:ring-sage-400 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
