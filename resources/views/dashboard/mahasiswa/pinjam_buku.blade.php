@extends('layouts.master')

@section('judul', 'Peminjaman Buku')

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

        {{-- Tabel Buku --}}
        <div class="px-5 pb-2">
            <div class="flex justify-start mb-1">
                <a href="{{ route('mahasiswa.perpustakaan') }}" class="border py-1 px-4 text-white bg-amber-500 rounded">
                    <i class="fa-solid fa-angle-left mr-2"></i>Kembali</a>
            </div>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">No</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Judul</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Pengarang</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Deskripsi</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Stok</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Pilih Buku
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <form action="{{ route('post.mahasiswa.pinjam_buku') }}" method="POST">
                        @csrf
                        @foreach ($buku as $index => $item)
                            <tr>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">
                                    {{ $index + 1 }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $item->judul }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $item->pengarang }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap"
                                    style="max-width: 200px; overflow: hidden; text-overflow: ellipsis;">
                                    {{ $item->deskripsi }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">
                                    {{ $item->stok }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">
                                    <input type="checkbox" name="buku_id[]" value="{{ $item->id }}" class="mr-2">Pilih
                                </td>
                            </tr>
                        @endforeach
                        {{-- Tombol Pinjam --}}
                        <div class="flex justify-end mb-2">
                            <button type="submit"
                                class="bg-amber-400 font-bold py-2 px-4 rounded mt-5 ml-auto">Pinjam</button>
                        </div>
                    </form>
                </tbody>
            </table>
        </div>
    </div>
@endsection
