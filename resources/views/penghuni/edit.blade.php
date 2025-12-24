<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Data Penghuni
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('penghuni.update', $penghuni->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700">Kamar Saat Ini</label>
                            <input type="text" value="Kamar {{ $penghuni->kamar->nomor_kamar }}" class="mt-1 block w-full bg-gray-100 border-gray-300 rounded-md shadow-sm" disabled>
                            <p class="text-xs text-gray-500 mt-1">*Untuk pindah kamar, silakan hapus data ini lalu buat baru.</p>
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nama_lengkap" :value="__('Nama Lengkap')" />
                            <x-text-input id="nama_lengkap" class="block mt-1 w-full" type="text" name="nama_lengkap" value="{{ $penghuni->nama_lengkap }}" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="nik" :value="__('NIK')" />
                            <x-text-input id="nik" class="block mt-1 w-full" type="number" name="nik" value="{{ $penghuni->nik }}" required />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="no_hp" :value="__('No HP')" />
                            <x-text-input id="no_hp" class="block mt-1 w-full" type="text" name="no_hp" value="{{ $penghuni->no_hp }}" required />
                        </div>
                        
                        <div class="mb-4">
                            <x-input-label for="tanggal_masuk" :value="__('Tanggal Masuk')" />
                            <x-text-input id="tanggal_masuk" class="block mt-1 w-full" type="date" name="tanggal_masuk" value="{{ $penghuni->tanggal_masuk }}" required />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update Data') }}</x-primary-button>
                            <a href="{{ route('penghuni.index') }}" class="text-gray-600 hover:text-gray-900">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>