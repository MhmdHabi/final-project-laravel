@extends('layouts.master')

@section('judul', 'Kartu Hasil Studi')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">KARTU HASIL STUDI</h1>
        </div>

        @if ($status && $status->status === 'Disetujui')
            <div class="overflow-x-auto px-5 pb-2">
                <table class="min-w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Kode MK</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Nama Matakuliah</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">SKS</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Dosen</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Grade</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Mutu</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @php
                            $totalSKS = 0;
                        @endphp
                        @foreach ($khs as $index => $khsan)
                            <tr>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $index + 1 }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $khsan->matkul->kode_mk }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $khsan->matkul->nama_mk }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $khsan->matkul->sks }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $khsan->matkul->dosen->name }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $khsan->grade }}</td>
                                <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $khsan->nilai }}</td>
                            </tr>
                            @php
                                $totalSKS += $khsan->matkul->sks;
                            @endphp
                        @endforeach
                        <tr>
                            <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="4">
                                <a href="{{ route('mahasiswa.khs', ['export' => 'pdf']) }}"
                                   class="border py-2 px-3 text-white bg-[#2e4765] rounded">
                                    <i class="fa-solid fa-print mr-2 text-white"></i>Cetak
                                </a>
                            </td>
                            <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold">{{ $totalSKS }} SKS</td>
                            <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="6">
                                IP: {{ number_format($ipk, 2) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                Kontrak Matkul belum disetujui.
            </div>
        @endif
    </div>
@endsection
