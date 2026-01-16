<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-soft-800 leading-tight">
            Edit Kamar: {{ $kamar->nomor_kamar }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/70 backdrop-blur-sm overflow-hidden shadow-soft rounded-soft-lg border border-soft-200">
                <div class="p-6 text-soft-700">

                    <form action="{{ route('kamar.update', $kamar->id) }}" method="POST">
                        @csrf
                        @method('PUT') <div class="mb-4">
                            <label class="block text-soft-700 text-sm font-bold mb-2">Nomor Kamar</label>
                            <input type="text" name="nomor_kamar" value="{{ $kamar->nomor_kamar }}"
                                class="shadow border-soft-300 focus:border-sage-400 focus:ring-sage-300 rounded-soft w-full py-2 px-3 text-soft-900 leading-tight focus:outline-none bg-soft-50"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-soft-700 text-sm font-bold mb-2">Fasilitas</label>
                            <textarea name="fasilitas"
                                class="shadow border-soft-300 focus:border-sage-400 focus:ring-sage-300 rounded-soft w-full py-2 px-3 text-soft-900 leading-tight focus:outline-none bg-soft-50"
                                rows="2" required>{{ $kamar->fasilitas }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block text-soft-700 text-sm font-bold mb-2">Harga per Bulan</label>
                            <input type="number" name="harga" value="{{ $kamar->harga }}"
                                class="shadow border-soft-300 focus:border-sage-400 focus:ring-sage-300 rounded-soft w-full py-2 px-3 text-soft-900 leading-tight focus:outline-none bg-soft-50"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-soft-700 text-sm font-bold mb-2">Status</label>
                            <select name="status"
                                class="shadow border-soft-300 focus:border-sage-400 focus:ring-sage-300 rounded-soft w-full py-2 px-3 text-soft-900 leading-tight focus:outline-none bg-soft-50">
                                <option value="Tersedia" {{ $kamar->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                                <option value="Terisi" {{ $kamar->status == 'Terisi' ? 'selected' : '' }}>Terisi</option>
                            </select>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>
                                {{ __('Update Data') }}
                            </x-primary-button>

                            <a href="{{ route('kamar.index') }}"
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
