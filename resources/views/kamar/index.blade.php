<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Kamar Kost') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        <a href="{{ route('kamar.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            + Tambah Kamar
                        </a>
                    </div>


                    @if (session('success'))
                        <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-700 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table-auto w-full border-collapse border border-gray-300">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">No</th>
                                <th class="border border-gray-300 px-4 py-2">Nomor Kamar</th>
                                <th class="border border-gray-300 px-4 py-2">Fasilitas</th>
                                <th class="border border-gray-300 px-4 py-2">Harga</th>
                                <th class="border border-gray-300 px-4 py-2">Status</th>
                                <th class="border border-gray-300 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kamars as $kamar)
                                <tr class="text-center">
                                    <td class="border border-gray-300 px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $kamar->nomor_kamar }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $kamar->fasilitas }}</td>
                                    <td class="border border-gray-300 px-4 py-2">Rp
                                        {{ number_format($kamar->harga, 0, ',', '.') }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        <span
                                            class="px-2 py-1 rounded {{ $kamar->status == 'Tersedia' ? 'bg-green-200 text-green-800' : 'bg-red-200 text-red-800' }}">
                                            {{ $kamar->status }}
                                        </span>

                                    </td>
                                    <td class="border border-gray-300 px-4 py-2 flex gap-2 justify-center">
                                        <a href="{{ route('kamar.edit', $kamar->id) }}"
                                            class="text-yellow-600 hover:underline font-bold">Edit</a>

                                        <span class="text-gray-300">|</span>

                                        <form action="{{ route('kamar.destroy', $kamar->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus kamar ini?');"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-600 hover:underline font-bold">Hapus</button>
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
</x-app-layout>
