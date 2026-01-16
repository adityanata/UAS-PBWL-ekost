<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-soft-800 leading-tight">
            {{ __('Catat Pembayaran Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/70 backdrop-blur-sm overflow-hidden shadow-soft rounded-soft-lg border border-soft-200">
                <div class="p-6 text-soft-700">
                    
                    <form action="{{ route('transaksi.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-4">
                            <x-input-label for="penghuni_id" :value="__('Nama Penghuni')" />
                            <select id="penghuni_id" name="penghuni_id" class="block mt-1 w-full border-soft-300 focus:border-sage-400 focus:ring-sage-300 rounded-soft shadow-soft bg-soft-50 text-soft-900" required>
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
                            <select id="bulan_tagihan" name="bulan_tagihan" class="block mt-1 w-full border-soft-300 focus:border-sage-400 focus:ring-sage-300 rounded-soft shadow-soft bg-soft-50 text-soft-900">
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
                            <a href="{{ route('transaksi.index') }}" class="inline-flex items-center px-4 py-2 bg-soft-100 border border-soft-300 rounded-soft font-semibold text-xs text-soft-700 uppercase tracking-widest shadow-soft hover:bg-soft-50 hover:border-soft-400 focus:outline-none focus:ring-2 focus:ring-soft-400 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Batal') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>