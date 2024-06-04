@extends('layouts.master')

@section('judul', 'Perpustakaan')


@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">PERPUSTAKAAN</h1>
        </div>

        {{-- Tabel peminjaman --}}
        <div class="px-5 pb-2">
            <div class="flex justify-end mb-1">
                <a href="{{ route('mahasiswa.pinjam_buku') }}" class="border py-1 px-4 text-white bg-[#2e4765] rounded mr-2">
                    <i class="fa-solid fa-book mr-2 text-white"></i>Pinjam Buku
                </a>
                <a href="#" class="border py-1 px-4 text-white bg-[#2e4765] rounded">
                    <i class="fa-solid fa-print mr-2 text-white"></i>Cetak
                </a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Judul Buku</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Tanggal Peminjaman
                        </th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Tanggal
                            Pengembalian</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">1</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Harry Potter and the
                            Philosopher's Stone</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">2024-06-01</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">2024-06-15</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center"><span
                                class=" border rounded bg-amber-300 py-2 px-3 font-semibold">Dipinjam</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
