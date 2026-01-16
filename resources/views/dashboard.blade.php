<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-soft-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/70 backdrop-blur-sm overflow-hidden shadow-soft rounded-soft-lg border border-soft-200">
                <div class="p-6 text-soft-700">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
