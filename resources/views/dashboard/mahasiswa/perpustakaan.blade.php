@extends('layouts.master')

@section('judul', 'Perpustakaan')


@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">PERPUSTAKAAN</h1>
        </div>
        <div class=" mb-3">
            {{-- Notifikasi Success --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 14.849l-4.849-4.849-4.849 4.849-1.414-1.414 4.849-4.849-4.849-4.849 1.414-1.414 4.849 4.849 4.849-4.849 1.414 1.414-4.849 4.849 4.849 4.849z" />
                        </svg>
                    </span>
                </div>
            @endif

            {{-- Notifikasi Error --}}
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
                    {{ session('error') }}
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 14.849l-4.849-4.849-4.849 4.849-1.414-1.414 4.849-4.849-4.849-4.849 1.414-1.414 4.849 4.849 4.849-4.849 1.414 1.414-4.849 4.849 4.849 4.849z" />
                        </svg>
                    </span>
                </div>
            @endif
        </div>

        {{-- Tabel peminjaman --}}
        <div class="px-5 pb-2">
            <div class="flex justify-end mb-1">
                <a href="{{ route('mahasiswa.pinjam_buku') }}"
                    class="border py-1 px-4 text-white bg-[#2e4765] rounded mr-2">
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
                    @foreach ($pinjam as $index => $minjam)
                        <tr>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $minjam->buku->judul }}</td>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">
                                {{ $minjam->waktu_peminjaman }}</td>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">
                                {{ $minjam->waktu_pengembalian }}</td>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">
                                @if ($minjam->status == 'Menunggu')
                                    <span class="border rounded bg-amber-300 py-2 px-3 font-semibold">Menunggu</span>
                                @elseif ($minjam->status == 'Dipinjam')
                                    <span
                                        class="border rounded bg-blue-500 text-white py-2 px-3 font-semibold">Dipinjam</span>
                                @else
                                    <span class="border rounded bg-gray-400 py-2 px-3 font-semibold">Dikembalikan</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
