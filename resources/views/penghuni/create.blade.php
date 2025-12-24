<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrasi Penghuni Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <form action="{{ route('penghuni.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <x-input-label for="kamar_id" :value="__('Pilih Kamar (Hanya yang Tersedia)')" />
                            <select id="kamar_id" name="kamar_id"
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
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
                                class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Batal') }}
                            </a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
