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
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">1</td>
                            <td class="px-3 py-4 border border-gray-400">8883483434</td>
                            <td class="px-3 py-4 border border-gray-400">Muhammad Habi</td>
                            <td class="px-3 py-4 border border-gray-400">Laskar Pelangi</td>
                            <td class="px-3 py-4 border border-gray-400">2024/05/23</td>
                            <td class="px-3 py-4 border border-gray-400">2024/05/29</td>
                            <td class="px-3 py-4 border border-gray-400">ACC</td>
                            <td class="px-3 py-4 border border-gray-400">
                                <form action="" method="POST">
                                    @csrf
                                    <button type="submit" name="action" value="approve"
                                        class="px-4 py-2 bg-blue-500 text-white rounded-md mb-2 w-full">Konfirmasi</button>
                                    <button type="submit" name="action" value="reject"
                                        class="px-4 py-2 bg-red-500 text-white rounded-md w-full">Dikembalikan</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
