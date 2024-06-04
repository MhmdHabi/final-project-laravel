@extends('layouts.master')

@section('judul', 'PRESENSI MAHASISWA')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">REKAP PRESENSI PERKULIAHAN MAHASISWA</h1>
        </div>

        {{-- tabel presensi --}}
        <div class="px-5 pb-2 overflow-x-auto">
            <div class="flex justify-end mb-1">
                <a href="#" class="border py-1 px-4 text-white bg-[#2e4765] rounded"><i
                        class="fa-solid fa-print mr-2 text-white"></i>Cetak</a>
            </div>
            <table class="min-w-full border-collapse border border-gray-200 whitespace-nowrap">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Kode MK</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Nama MK dan Dosen</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">SKS</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Ruangan</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">H</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">I</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">A</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-3 py-4 border border-gray-400">1</td>
                        <td class="px-3 py-4 border border-gray-400">MK001</td>
                        <td class="px-3 py-4 border border-gray-400">Matematika <span class="block">Pak Budi</span></td>
                        <td class="px-3 py-4 border border-gray-400 text-center">3.00</td>
                        <td class="px-3 py-4 border border-gray-400">Kampus Kobar <span class="block">R 2.3</span></td>
                        <td class="px-3 py-4 border border-gray-400 text-center">1</td>
                        <td class="px-3 py-4 border border-gray-400 text-center">4</td>
                        <td class="px-3 py-4 border border-gray-400 text-center">2</td>
                    </tr>
                    <tr>
                        <td class="px-3 py-4 border border-gray-400">2</td>
                        <td class="px-3 py-4 border border-gray-400">MK002</td>
                        <td class="px-3 py-4 border border-gray-400">Matematika <span class="block">Pak Budi</span></td>
                        <td class="px-3 py-4 border border-gray-400 text-center">4.00</td>
                        <td class="px-3 py-4 border border-gray-400">Kampus Kobar <span class="block">R 1.2</span></td>
                        <td class="px-3 py-4 border border-gray-400 text-center">2</td>
                        <td class="px-3 py-4 border border-gray-400 text-center">1</td>
                        <td class="px-3 py-4 border border-gray-400 text-center">1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
