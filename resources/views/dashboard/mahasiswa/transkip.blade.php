@extends('layouts.master')

@section('judul', 'Transkip')

@section('content')
    <section class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">TRANSKIP MATAKULIAH MAHASISWA</h1>
        </div>

        <div class="px-5 pb-2">
            <div class="flex justify-end mb-1">
                <a href="#" class="border py-1 px-4 text-white bg-[#2e4765] rounded"><i
                        class="fa-solid fa-print mr-2 text-white"></i>Cetak</a>
            </div>
            <div class="flex py-1">
                <p class="w-36">Nim</p>
                <p>: 8020210101</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Nama</p>
                <p>: Muhammad Habi</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Nomor Hp</p>
                <p>: 0212121212</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Jurusan</p>
                <p>: Teknik Informatika</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Semester</p>
                <p>: 7</p>
            </div>
        </div>

        {{-- Tabel Transkip Matakuliah --}}
        <div class="px-5 pb-2">
            <div class="overflow-x-auto w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="w-1/12 px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                            <th class="w-2/12 px-3 py-3 border border-gray-400 text-left text-md text-black">Kode MK</th>
                            <th class="w-4/12 px-3 py-3 border border-gray-400 text-left text-md text-black">Mata Kuliah
                            </th>
                            <th class="w-2/12 px-3 py-3 border border-gray-400 text-left text-md text-black text-center">SKS
                            </th>
                            <th class="w-3/12 px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                                Grade</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Header Semester 1 -->
                        <tr>
                            <td colspan="5" class="px-3 py-3 border border-gray-400 font-bold bg-amber-300">
                                Semester 1
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">1</td>
                            <td class="px-3 py-4 border border-gray-400">TI101</td>
                            <td class="px-3 py-4 border border-gray-400">Pemrograman Dasar</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">A</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">2</td>
                            <td class="px-3 py-4 border border-gray-400">TI102</td>
                            <td class="px-3 py-4 border border-gray-400">Struktur Data</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">B+</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400 ">3</td>
                            <td class="px-3 py-4 border border-gray-400">TI103</td>
                            <td class="px-3 py-4 border border-gray-400">Algoritma</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">A-</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">4</td>
                            <td class="px-3 py-4 border border-gray-400">TI104</td>
                            <td class="px-3 py-4 border border-gray-400">Basis Data</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">4</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">B</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">5</td>
                            <td class="px-3 py-4 border border-gray-400">TI105</td>
                            <td class="px-3 py-4 border border-gray-400">Jaringan Komputer</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">A</td>
                        </tr>
                    </tbody>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Header Semester 2 -->
                        <tr>
                            <td colspan="5" class="px-3 py-3 border border-gray-400 font-bold bg-amber-300">
                                Semester 2
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">1</td>
                            <td class="px-3 py-4 border border-gray-400">TI101</td>
                            <td class="px-3 py-4 border border-gray-400">Pemrograman Dasar</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">A</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">2</td>
                            <td class="px-3 py-4 border border-gray-400">TI102</td>
                            <td class="px-3 py-4 border border-gray-400">Struktur Data</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">B+</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">3</td>
                            <td class="px-3 py-4 border border-gray-400">TI103</td>
                            <td class="px-3 py-4 border border-gray-400">Algoritma</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">A-</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">4</td>
                            <td class="px-3 py-4 border border-gray-400">TI104</td>
                            <td class="px-3 py-4 border border-gray-400">Basis Data</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">4</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">B</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">5</td>
                            <td class="px-3 py-4 border border-gray-400">TI105</td>
                            <td class="px-3 py-4 border border-gray-400">Jaringan Komputer</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">A</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="px-5">
            <div class="flex py-1">
                <p class="w-36">Indeks Prestasi</p>
                <p>: 8020210101</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Total Sks</p>
                <p>: Muhammad Habi</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Total Sks Gagal</p>
                <p>: Muhammad Habi</p>
            </div>
        </div>
    </section>
@endsection
