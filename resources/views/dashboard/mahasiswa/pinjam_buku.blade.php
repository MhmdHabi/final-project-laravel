@extends('layouts.master')

@section('judul', 'Peminjaman Buku')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">PERPUSTAKAAN</h1>
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
                    <tr>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">1</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Judul Buku 1</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Pengarang 1</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Deskripsi buku 1</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">10</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">
                            <input type="checkbox" class="mr-2">Pilih
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- Tombol Pinjam --}}
            <div class="flex justify-end mt-5">
                <button class="bg-amber-400 font-bold py-2 px-4 rounded">
                    Pinjam
                </button>
            </div>
        </div>
    </div>
@endsection
