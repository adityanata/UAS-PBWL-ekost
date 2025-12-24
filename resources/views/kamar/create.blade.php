<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Kamar Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('kamar.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <x-input-label for="nomor_kamar" :value="__('Nomor Kamar')" />
                            <x-text-input id="nomor_kamar" class="block mt-1 w-full" type="text" name="nomor_kamar" placeholder="Contoh: A-01" required autofocus />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="fasilitas" :value="__('Fasilitas')" />
                            <textarea id="fasilitas" name="fasilitas" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" placeholder="Contoh: Kasur, Lemari, AC, Wifi" required></textarea>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="harga" :value="__('Harga per Bulan (Rp)')" />
                            <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga" placeholder="1000000" required />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="status" :value="__('Status Awal')" />
                            <select id="status" name="status" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Terisi">Terisi</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Simpan Data') }}
                            </x-primary-button>

                            <a href="{{ route('kamar.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Batal') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>