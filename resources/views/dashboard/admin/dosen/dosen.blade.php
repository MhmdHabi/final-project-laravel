@extends('layouts.master')

@section('judul', 'Data Dosen')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">DATA SEMUA DOSEN UNIVERSITAS</h1>
        </div>

        {{-- Tabel Data Dosen --}}
        <div class="px-5 pb-2">
            <div class="overflow-x-auto w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black">No</th>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black">NIDN</th>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black">Email</th>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black">Nama</th>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black">Jabatan Akademik</th>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black">Nomor HP</th>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black text-center w-32">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-2 py-4 border border-gray-400">1</td>
                            <td class="px-2 py-4 border border-gray-400">123456789</td>
                            <td class="px-2 py-4 border border-gray-400">dosen@gmail.com</td>
                            <td class="px-2 py-4 border border-gray-400">Dr. Jane Doe</td>
                            <td class="px-2 py-4 border border-gray-400">Kaprodi</td>
                            <td class="px-2 py-4 border border-gray-400">08123456789</td>
                            <td class="px-2 py-4 border border-gray-400">
                                <a href="{{ route('admin.data_dosen.add') }}"><button
                                        class="px-4 py-2 bg-gray-500 text-white rounded-md w-full mb-2">Tambah</button></a>
                                <a href="{{ route('admin.data_dosen.edit') }}"><button
                                        class="px-4 py-2 bg-blue-500 text-white rounded-md w-full mb-2">Edit</button></a>
                                <a href="{{ route('admin.data_dosen.detail') }}"><button
                                        class="px-4 py-2 bg-amber-500 text-white rounded-md w-full mb-2">Detail</button></a>
                                <button class="px-4 py-2 bg-red-500 text-white rounded-md w-full">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
