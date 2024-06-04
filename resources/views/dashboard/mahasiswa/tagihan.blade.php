@extends('layouts.master')

@section('judul', 'Tagihan')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">DATA TAGIHAN MAHASISWA</h1>
        </div>

        {{-- tabel tagihan --}}
        <div class="px-5 pb-2 ">
            <div class="flex justify-end mb-1">
                <a href="{{ route('mahasiswa.konfirm_pembayaran') }}"
                    class="border py-1 px-4 text-white bg-[#2e4765] rounded mr-2"><i
                        class="fa-solid fa-money-check-dollar mr-2 text-white"></i>Konfirmasi Pembayaran</a>
                <a href="#" class="border py-1 px-4 text-white bg-[#2e4765] rounded"><i
                        class="fa-solid fa-print mr-2 text-white"></i>Cetak</a>
            </div>
            <table class="min-w-full border-collapse border border-gray-200 whitespace-nowrap overflow-x-auto">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">No</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Jenis Tagihan
                        </th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Tanggal
                            Tagihan</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Batas Tagihan
                        </th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Semester</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Tahun</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Jumlah Tagihan
                        </th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr>
                        <td class="px-3 py-4 border border-gray-400">1</td>
                        <td class="px-3 py-4 border border-gray-400">SPP</td>
                        <td class="px-3 py-4 border border-gray-400">01/01/2024</td>
                        <td class="px-3 py-4 border border-gray-400">31/01/2024</td>
                        <td class="px-3 py-4 border border-gray-400 text-center">Genap</td>
                        <td class="px-3 py-4 border border-gray-400 text-center">2024</td>
                        <td class="px-3 py-4 border border-gray-400">Rp 5.000.000</td>
                        <td class="px-3 py-4 border border-gray-400 text-center"><span
                                class=" border rounded bg-amber-300 py-2 px-3 font-semibold">Lunas</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
