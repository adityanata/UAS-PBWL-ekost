<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-soft-800 leading-tight">
            {{ __('Data Kamar Kost') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/70 backdrop-blur-sm overflow-hidden shadow-soft rounded-soft-lg border border-soft-200">
                <div class="p-6 text-soft-700">

                    <div class="mb-6">
                        <a href="{{ route('kamar.create') }}"
                            class="inline-flex items-center px-4 py-3 bg-sage-500 border border-transparent rounded-soft font-semibold text-xs text-white uppercase tracking-widest hover:bg-sage-600 focus:bg-sage-600 active:bg-sage-700 focus:outline-none focus:ring-2 focus:ring-sage-400 focus:ring-offset-2 transition ease-in-out duration-150 shadow-soft hover:shadow-soft-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Kamar
                        </a>
                    </div>


                    @if (session('success'))
                        <div class="mb-4 p-4 bg-sage-50 border border-sage-200 text-sage-700 rounded-soft shadow-soft">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto rounded-soft border border-soft-200">
                        <table class="w-full text-sm text-soft-700">
                            <thead class="text-xs text-soft-800 uppercase bg-soft-100 border-b border-soft-200">
                                <tr>
                                    <th class="px-6 py-4 text-left font-semibold">No</th>
                                    <th class="px-6 py-4 text-left font-semibold">Nomor Kamar</th>
                                    <th class="px-6 py-4 text-left font-semibold">Fasilitas</th>
                                    <th class="px-6 py-4 text-left font-semibold">Harga</th>
                                    <th class="px-6 py-4 text-left font-semibold">Status</th>
                                    <th class="px-6 py-4 text-center font-semibold">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-soft-200">
                                @foreach ($kamars as $kamar)
                                    <tr class="bg-white hover:bg-soft-50 transition ease-in-out duration-150">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 font-medium text-soft-900">{{ $kamar->nomor_kamar }}</td>
                                        <td class="px-6 py-4">{{ $kamar->fasilitas }}</td>
                                        <td class="px-6 py-4">Rp {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4">
                                            @if($kamar->status == 'Tersedia')
                                                <span class="inline-block px-3 py-1 rounded-soft text-xs font-semibold bg-sage-100 text-sage-700">
                                                    {{ $kamar->status }}
                                                </span>
                                            @else
                                                <span class="inline-block px-3 py-1 rounded-soft text-xs font-semibold bg-blush-100 text-blush-700">
                                                    {{ $kamar->status }}
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 flex gap-3 justify-center">
                                            <a href="{{ route('kamar.edit', $kamar->id) }}"
                                                class="inline-flex items-center px-3 py-2 bg-sky-100 border border-sky-200 text-sky-700 font-semibold text-xs rounded-soft hover:bg-sky-200 transition ease-in-out duration-150 shadow-soft hover:shadow-soft-md">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                                </svg>
                                                Edit
                                            </a>

                                            <form action="{{ route('kamar.destroy', $kamar->id) }}" method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus kamar ini?');"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 bg-blush-100 border border-blush-200 text-blush-700 font-semibold text-xs rounded-soft hover:bg-blush-200 transition ease-in-out duration-150 shadow-soft hover:shadow-soft-md">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
