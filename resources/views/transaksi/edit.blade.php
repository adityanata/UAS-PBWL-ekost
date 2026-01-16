<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-soft-800 leading-tight">Edit Transaksi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/70 backdrop-blur-sm overflow-hidden shadow-soft rounded-soft-lg border border-soft-200">
                <div class="p-6 text-soft-700">
                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-soft-700">Nama Penghuni</label>
                            <input type="text" value="{{ $transaksi->penghuni->nama_lengkap ?? 'Terhapus' }}" class="mt-1 block w-full bg-soft-100 rounded-soft shadow-soft text-soft-600" disabled>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tanggal_bayar" :value="__('Tanggal Bayar')" />
                            <x-text-input id="tanggal_bayar" class="block mt-1 w-full" type="date" name="tanggal_bayar" value="{{ $transaksi->tanggal_bayar }}" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jumlah_bayar" :value="__('Jumlah (Rp)')" />
                            <x-text-input id="jumlah_bayar" class="block mt-1 w-full" type="number" name="jumlah_bayar" value="{{ $transaksi->jumlah_bayar }}" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="keterangan" :value="__('Keterangan')" />
                            <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan" value="{{ $transaksi->keterangan }}" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Transaksi') }}</x-primary-button>
                            <a href="{{ route('transaksi.index') }}" class="inline-flex items-center px-4 py-2 bg-soft-100 border border-soft-300 rounded-soft font-semibold text-xs text-soft-700 uppercase tracking-widest shadow-soft hover:bg-soft-50 hover:border-soft-400 focus:outline-none focus:ring-2 focus:ring-soft-400 focus:ring-offset-2 transition ease-in-out duration-150">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>