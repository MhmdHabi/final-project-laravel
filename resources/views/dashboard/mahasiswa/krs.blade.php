@extends('layouts.master')

@section('judul', 'Kartu Rancangan Studi')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md ">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">KARTU RANCANGAN STUDI</h1>
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
                            Kode MK</th>
                        <th class="px-3 py-3 border border-gray-400 txet-left text-md text-black">
                            Nama MK</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            SKS</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            Status</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            Kelas</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            Ruangan</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            Jadwal</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            Dosen</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">1</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">MK001</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Matematika</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">3</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Wajib</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">A</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">101</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Senin, 08:00-10:00</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Dr. John Doe</td>
                    </tr>
                    <tr>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">2</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">MK002</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Fisika</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">4</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Pilihan</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">B</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">102</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Selasa, 10:00-12:00</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Dr. Jane Smith</td>
                    </tr>
                    <tr>
                        <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="3">Total SKS diambil
                        </td>
                        <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold">22/24</td>
                        <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="6">IP Semester
                            Sebelumnya
                            : 4.00
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
