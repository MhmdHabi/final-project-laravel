@extends('layouts.master')

@section('judul', 'Konfirmasi Peminjaman Buku')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">Konfirmasi Peminjaman Buku</h1>
        </div>
        <div class="px-5 mb-3">
            {{-- Notifikasi Success --}}
            @if (session('success'))
                <div id="successMessage"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
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
                <div id="successMessage" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative "
                    role="alert">
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

        {{-- Tabel Konfirmasi Peminjaman --}}
        <div class="px-5 pb-2">
            <div class="overflow-x-auto w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#13947D]">
                        <tr>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-white">No</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-white">NIM</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-white">Nama</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-white">Judul Buku</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-white">Tanggal Pinjam</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-white">Tanggal Kembali</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-white">Status</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-white w-32">Action</th>
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

    {{-- Jquery Start --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/sessionTime.js') }}"></script>
@endsection
