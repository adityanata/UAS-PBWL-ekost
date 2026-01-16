<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-soft-800 leading-tight">
            {{ __('Registrasi Penghuni Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/70 backdrop-blur-sm overflow-hidden shadow-soft rounded-soft-lg border border-soft-200">
                <div class="p-6 text-soft-700">

                    <form action="{{ route('penghuni.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="kamar_id" :value="__('Pilih Kamar (Hanya yang Tersedia)')" />
                            <select id="kamar_id" name="kamar_id"
                                class="block mt-1 w-full border-soft-300 focus:border-sage-400 focus:ring-sage-300 rounded-soft shadow-soft bg-soft-50 text-soft-900"
                                required>
                                <option value="" disabled selected>-- Pilih Kamar --</option>
                                @foreach ($kamars as $kamar)
                                    <option value="{{ $kamar->id }}">
                                        Kamar {{ $kamar->nomor_kamar }} - (Rp
                                        {{ number_format($kamar->harga, 0, ',', '.') }})
                                    </option>
                                @endforeach
                            </select>
                            @if ($kamars->isEmpty())
                                <p class="text-red-500 text-xs mt-1">* Tidak ada kamar kosong saat ini. Silakan tambah
                                    kamar baru atau set status 'Tersedia' di menu Kamar.</p>
                            @endif
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap"
                                required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nik" :value="__('NIK (KTP)')" />
                            <x-text-input id="nik" class="block mt-1 w-full" type="number" name="nik"
                                required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="no_hp" :value="__('Nomor HP (WhatsApp)')" />
                            <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp"
                                required />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="tanggal_masuk" :value="__('Tanggal Mulai Kost')" />
                            <x-text-input id="tanggal_masuk" class="block mt-1 w-full" type="date"
                                name="tanggal_masuk" required />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Simpan Data Penghuni') }}
                            </x-primary-button>

                            <a href="{{ route('penghuni.index') }}"
                                class="inline-flex items-center px-4 py-2 bg-soft-100 border border-soft-300 rounded-soft font-semibold text-xs text-soft-700 uppercase tracking-widest shadow-soft hover:bg-soft-50 hover:border-soft-400 focus:outline-none focus:ring-2 focus:ring-soft-400 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Batal') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
