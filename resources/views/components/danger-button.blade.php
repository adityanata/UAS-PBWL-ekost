<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-blush-400 border border-transparent rounded-soft font-semibold text-xs text-white uppercase tracking-widest hover:bg-blush-500 active:bg-blush-600 focus:outline-none focus:ring-2 focus:ring-blush-300 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
