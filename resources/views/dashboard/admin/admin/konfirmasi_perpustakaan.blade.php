@extends('layouts.master')

@section('judul', 'Konfirmasi Peminjaman Buku')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">Konfirmasi Peminjaman Buku</h1>
        </div>

        {{-- Tabel Konfirmasi Peminjaman --}}
        <div class="px-5 pb-2">
            <div class="overflow-x-auto w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">NIM</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Nama</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Judul Buku</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Tanggal Pinjam</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Tanggal Kembali</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Status</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black w-32">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($peminjaman as $index => $pinjam)
                            <tr>
                                <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $pinjam->user->nim }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $pinjam->user->name }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $pinjam->buku->judul }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $pinjam->waktu_peminjaman }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $pinjam->waktu_pengembalian }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $pinjam->status }}</td>
                                <td class="px-3 py-4 border border-gray-400">
                                    <form action="{{ route('post.admin.konfirmasi_perpustakaan', ['id' => $pinjam->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" name="action" value="approve"
                                            class="px-4 py-2 bg-blue-500 text-white rounded-md mb-2 w-full">Konfirmasi</button>
                                    </form>
                                    <form action="{{ route('post.admin.konfirmasi_perpustakaan', ['id' => $pinjam->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" name="action" value="reject"
                                            class="px-4 py-2 bg-red-500 text-white rounded-md w-full">Dikembalikan</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
