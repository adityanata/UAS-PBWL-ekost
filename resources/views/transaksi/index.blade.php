<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Transaksi Pembayaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="mb-4">
                        <a href="{{ route('transaksi.create') }}"
                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            + Catat Pembayaran
                        </a>
                    </div>

                    @if (session('success'))
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-gray-500">

                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center">
                                <tr>
                                    <th class="px-6 py-3">No</th>
                                    <th class="px-6 py-3">Nama Penghuni</th>
                                    <th class="px-6 py-3">Bulan Tagihan</th>
                                    <th class="px-6 py-3">Tanggal Bayar</th>
                                    <th class="px-6 py-3">Jumlah</th>
                                    <th class="px-6 py-3">Keterangan</th>
                                    <th class="px-6 py-3">Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($transaksis as $transaksi)
                                    <tr class="bg-white border-b hover:bg-gray-50 text-center">
                                        <td class="px-6 py-4">{{ $loop->iteration }}</td>

                                        <td class="px-6 py-4 font-bold text-gray-900">
                                            {{ $transaksi->penghuni->nama_lengkap ?? 'Penghuni Terhapus' }}
                                        </td>

                                        <td class="px-6 py-4">
                                            <span
                                                class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded">
                                                {{ $transaksi->bulan_tagihan }}
                                            </span>
                                        </td>

                                        <td class="px-6 py-4">
                                            {{ \Carbon\Carbon::parse($transaksi->tanggal_bayar)->format('d M Y') }}
                                        </td>

                                        <td class="px-6 py-4 font-bold text-green-600">
                                            Rp {{ number_format($transaksi->jumlah_bayar, 0, ',', '.') }}
                                        </td>

                                        <td class="px-6 py-4">{{ $transaksi->keterangan ?? '-' }}</td>

                                        <td class="px-6 py-4 flex gap-2 justify-center">
                                            <a href="{{ route('transaksi.edit', $transaksi->id) }}"
                                                class="text-yellow-600 hover:underline font-medium">Edit</a>

                                            <span class="text-gray-300">|</span>

                                            <form action="{{ route('transaksi.destroy', $transaksi->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Hapus riwayat pembayaran ini?');">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:underline font-medium">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-gray-400 italic">
                                            Belum ada riwayat transaksi.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
