@extends('layouts.master')

@section('judul', 'Jadwal Dosen')

@section('content')
@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md ">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">JADWAL MENGAJAR DOSEN</h1>
        </div>


        {{-- tabel Krs --}}
        <div class=" px-5 pb-2 overflow-auto">
            <div class="flex justify-end mb-1">
                <a href="#" class="border py-1 px-4 text-white bg-[#2e4765] rounded"><i
                        class="fa-solid fa-print mr-2 text-white"></i>Cetak</a>
            </div>
            <table class="min-w-full border-collapse border border-gray-200 ">
                <thead class="bg-gray-300">
                    <tr>
                        <th class=" px-3 py-3 border border-gray-400 text-left text-md text-black">
                            No</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            Periode</th>
                        <th class="px-3 py-3 border border-gray-400 txet-left text-md text-black">
                            Kode MK</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            Matakuliah</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                            SKS</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                            Kelas</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            Jadwal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">1</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">2024/2025</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">MK001</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Matematika</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">3</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">A</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Senin, 08:00 - 10:00</td>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
@endsection
@endsection
