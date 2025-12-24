<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catat Pembayaran Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <x-input-label for="penghuni_id" :value="__('Nama Penghuni')" />
                            <select id="penghuni_id" name="penghuni_id" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                                <option value="" disabled selected>-- Pilih Penghuni --</option>
                                @foreach($penghunis as $penghuni)
                                    <option value="{{ $penghuni->id }}">
                                        {{ $penghuni->nama_lengkap }} (Kamar: {{ $penghuni->kamar->nomor_kamar ?? '-' }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="bulan_tagihan" :value="__('Untuk Pembayaran Bulan')" />
                            <select id="bulan_tagihan" name="bulan_tagihan" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                <option value="Januari 2025">Januari 2025</option>
                                <option value="Februari 2025">Februari 2025</option>
                                <option value="Maret 2025">Maret 2025</option>
                                <option value="April 2025">April 2025</option>
                                <option value="Mei 2025">Mei 2025</option>
                                <option value="Juni 2025">Juni 2025</option>
                                <option value="Juli 2025">Juli 2025</option>
                                <option value="Agustus 2025">Agustus 2025</option>
                                <option value="September 2025">September 2025</option>
                                <option value="Oktober 2025">Oktober 2025</option>
                                <option value="November 2025">November 2025</option>
                                <option value="Desember 2025">Desember 2025</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="tanggal_bayar" :value="__('Tanggal Bayar')" />
                            <x-text-input id="tanggal_bayar" class="block mt-1 w-full" type="date" name="tanggal_bayar" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="jumlah_bayar" :value="__('Jumlah Uang Diterima (Rp)')" />
                            <x-text-input id="jumlah_bayar" class="block mt-1 w-full" type="number" name="jumlah_bayar" placeholder="Contoh: 1500000" required />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="keterangan" :value="__('Keterangan (Opsional)')" />
                            <x-text-input id="keterangan" class="block mt-1 w-full" type="text" name="keterangan" placeholder="Contoh: Lunas / Dicicil / Transfer Bank" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Simpan Pembayaran') }}
                            </x-primary-button>
                            <a href="{{ route('transaksi.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                                {{ __('Batal') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>