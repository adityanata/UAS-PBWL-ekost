<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Transaksi</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                        @csrf @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Nama Penghuni</label>
                            <input type="text" value="{{ $transaksi->penghuni->nama_lengkap ?? 'Terhapus' }}" class="mt-1 block w-full bg-gray-100 rounded-md shadow-sm" disabled>
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
                            <a href="{{ route('transaksi.index') }}" class="text-gray-600 hover:text-gray-900">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>