<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-soft-800 leading-tight">
            {{ __('Tambah Kamar Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/70 backdrop-blur-sm overflow-hidden shadow-soft rounded-soft-lg border border-soft-200">
                <div class="p-6 text-soft-700">
                    
                    <form action="{{ route('kamar.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <x-input-label for="nomor_kamar" :value="__('Nomor Kamar')" />
                            <x-text-input id="nomor_kamar" class="block mt-1 w-full" type="text" name="nomor_kamar" placeholder="Contoh: A-01" required autofocus />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="fasilitas" :value="__('Fasilitas')" />
                            <textarea id="fasilitas" name="fasilitas" class="block mt-1 w-full border-soft-300 focus:border-sage-400 focus:ring-sage-300 rounded-soft shadow-soft bg-soft-50 text-soft-900" rows="3" placeholder="Contoh: Kasur, Lemari, AC, Wifi" required></textarea>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="harga" :value="__('Harga per Bulan (Rp)')" />
                            <x-text-input id="harga" class="block mt-1 w-full" type="number" name="harga" placeholder="1000000" required />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="status" :value="__('Status Awal')" />
                            <select id="status" name="status" class="block mt-1 w-full border-soft-300 focus:border-sage-400 focus:ring-sage-300 rounded-soft shadow-soft bg-soft-50 text-soft-900">
                                <option value="Tersedia">Tersedia</option>
                                <option value="Terisi">Terisi</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Simpan Data') }}
                            </x-primary-button>

                            <a href="{{ route('kamar.index') }}" class="inline-flex items-center px-4 py-2 bg-soft-100 border border-soft-300 rounded-soft font-semibold text-xs text-soft-700 uppercase tracking-widest shadow-soft hover:bg-soft-50 hover:border-soft-400 focus:outline-none focus:ring-2 focus:ring-soft-400 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Batal') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>