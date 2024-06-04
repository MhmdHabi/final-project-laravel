@extends('layouts.master')

@section('judul', 'Kontrak Matakuliah')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">KONTRAK MATAKULIAH</h1>
        </div>

        {{-- Tabel Kontrak Matakuliah --}}
        <div class="px-5 pb-2">
            <div class="overflow-x-auto w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Kode MK</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Matakuliah</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">SKS</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Pilih</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td colspan="5" class="px-3 py-4 border bg-amber-400 border-gray-400 font-semibold">Semester
                                1</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">1</td>
                            <td class="px-3 py-4 border border-gray-400">MK101</td>
                            <td class="px-3 py-4 border border-gray-400">Pemrograman Dasar</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                <input type="checkbox" class="mr-2">Pilih
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">2</td>
                            <td class="px-3 py-4 border border-gray-400">MK101</td>
                            <td class="px-3 py-4 border border-gray-400">Pemrograman Dasar</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                <input type="checkbox" class="mr-2">Pilih
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">3</td>
                            <td class="px-3 py-4 border border-gray-400">MK101</td>
                            <td class="px-3 py-4 border border-gray-400">Pemrograman Dasar</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                <input type="checkbox" class="mr-2">Pilih
                            </td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">4</td>
                            <td class="px-3 py-4 border border-gray-400">MK101</td>
                            <td class="px-3 py-4 border border-gray-400">Pemrograman Dasar</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                <input type="checkbox" class="mr-2">Pilih
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td colspan="5" class="px-3 py-4 border bg-amber-400 border-gray-400 font-semibold">Semester
                                2</td>
                        </tr>
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">1</td>
                            <td class="px-3 py-4 border border-gray-400">MK101</td>
                            <td class="px-3 py-4 border border-gray-400">Pemrograman Dasar</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">3</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                <input type="checkbox" class="mr-2">Pilih
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- Tombol Submit --}}
        <div class="flex justify-start px-5 mt-4">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded">Submit</button>
        </div>
    </div>
@endsection
