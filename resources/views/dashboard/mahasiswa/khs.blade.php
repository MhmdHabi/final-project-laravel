@extends('layouts.master')

@section('judul', 'Kartu Hasil Studi')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">KARTU HASIL STUDI</h1>
        </div>

        {{-- Tabel KHS --}}
        <div class="overflow-x-auto px-5 pb-2">
            <table class="min-w-full border-collapse border border-gray-200">
                <thead class="bg-gray-300">
                    <tr>
                        <th class=" px-3 py-3 border border-gray-400 text-left text-md text black">
                            No</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text black">
                            Kode MK</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text black">
                            Nama Matakuliah</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text black">
                            Status</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text black">
                            SKS</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text black">
                            Grade</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text black">
                            Nilai Angka</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">1</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">MK001</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">Matematika</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">B</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">3.00</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">A</td>
                        <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">101</td>
                    </tr>

                    <tr>
                        <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="4"><a href="#"
                                class="border py-2 px-3 text-white bg-[#2e4765] rounded"><i
                                    class="fa-solid fa-print mr-2  text-white"></i>Cetak</a>
                        </td>
                        <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold">t sks</td>
                        <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="6">IP
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
