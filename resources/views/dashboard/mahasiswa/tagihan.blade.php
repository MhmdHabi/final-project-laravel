@extends('layouts.master')

@section('judul', 'Tagihan')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 pt-5 rounded-md mb-5">
        <div class="flex mb-4 justify-center">
            <h1 class="font-bold text-xl">DAFTAR REKENING BANK KAMPUS</h1>
        </div>
        <div class="flex flex-wrap mx-4">
            <!-- Card 1 -->
            <div class="w-full md:w-1/3 px-4 mb-8">
                <div class=" rounded-lg p-4 shadow-lg">
                    <img src="{{ asset('asset/logo_bni.png') }}" alt="" class="w-24">
                    <p class="">a.n. Universitas Academy</p>
                    <p class="font-semibold">No Rek: 1234567890</p>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="w-full md:w-1/3 px-4 mb-8">
                <div class="rounded-lg p-4 shadow-lg">
                    <img src="{{ asset('asset/logo_bri.png') }}" alt="" class="w-20">
                    <p class="">a.n. Universitas Academy</p>
                    <p class="font-semibold">No Rek: 0987654321</p>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="w-full md:w-1/3 px-4 mb-8">
                <div class="rounded-lg p-4 shadow-lg">
                    <img src="{{ asset('asset/logo_mandiri.png') }}" alt="" class="w-24">
                    <p class="">a.n. Universitas Academy</p>
                    <p class="font-semibold">No Rek: 1122334455</p>
                </div>
            </div>
        </div>

    </div>
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">DATA TAGIHAN MAHASISWA</h1>
        </div>

        {{-- tabel tagihan --}}
        <div class="px-5 pb-2">
            <div class="flex justify-end mb-1">
                <a href="{{ route('mahasiswa.konfirm_pembayaran') }}"
                    class="border py-1 px-4 text-white bg-[#2e4765] rounded mr-2"><i
                        class="fa-solid fa-money-check-dollar mr-2 text-white"></i>Konfirmasi Pembayaran</a>
            </div>
            <table class="min-w-full border-collapse border border-gray-200 whitespace-nowrap overflow-x-auto">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">No</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Jenis
                            Tagihan
                        </th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Tanggal
                            Tagihan</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Semester</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Rekening</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Jumlah Tagihan
                        </th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Status
                            Konfirmasi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($konfirmasiPembayaran as $index => $konfirmasi)
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $konfirmasi->jenis_tagihan }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $konfirmasi->tanggal_transfer }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $konfirmasi->semester }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $konfirmasi->rekening_tujuan }}</td>
                            <td class="px-3 py-4 border border-gray-400">Rp
                                {{ number_format($konfirmasi->nominal, 0, ',', '.') }}</td>

                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">
                                @if ($konfirmasi->status_konfirmasi == 'Menunggu')
                                    <span class="border rounded bg-amber-300 py-2 px-3 font-semibold">Menunggu</span>
                                @elseif ($konfirmasi->status_konfirmasi == 'Diterima')
                                    <span
                                        class="border rounded bg-green-500 text-white py-2 px-3 font-semibold">Diterima</span>
                                @else
                                    <span class="border rounded bg-red-400 py-2 px-3 font-semibold">Ditolak</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
