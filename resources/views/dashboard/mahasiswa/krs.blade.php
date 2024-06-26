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
                <a href="{{ route('mahasiswa.pdf.krs') }}" target="_blank"
                    class="border py-1 px-4 text-white bg-[#2e4765] rounded"><i
                        class="fa-solid fa-file-pdf mr-2 text-white"></i>Cetak Pdf</a>
            </div>
            <table class="min-w-full border-collapse border border-gray-200">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Kode MK</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Nama MK</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">SKS</th>
                        <th class="px-1 py-3 border border-gray-400 text-left text-md text-black text-center">Kelas</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Jadwal</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Dosen</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @php
                        $totalSKS = 0;
                    @endphp
                    @foreach ($krs as $index => $krsan)
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $krsan->matkul->kode_mk }}
                            </td>
                            <td class="px-2 py-4 border border-gray-400">
                                {{ $krsan->matkul->nama_mk }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                {{ $krsan->matkul->sks }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $krsan->matkul->kelas }},
                                Ruangan {{ $krsan->matkul->ruangan }}</td>
                            <td class="px-3 py-2 border border-gray-400">
                                @php
                                    $jadwal = strtotime($krsan->matkul->jadwal);
                                    $tanggal = strftime('%A, %d %B %Y', $jadwal);
                                    $waktu = strftime('%H:%M', $jadwal);
                                @endphp
                                {{ $tanggal }}<br>{{ $waktu }} WIB
                            </td>
                            <td class="px-3 py-4 border border-gray-400">{{ $krsan->matkul->dosen->name }}
                            </td>
                            <td class="px-3 py-4 border border-gray-400 w-10">
                                @if ($krsan->status === 'Menunggu')
                                    <span class="px-2 py-1 bg-amber-500 text-white rounded-md">{{ $krsan->status }}</span>
                                @elseif ($krsan->status === 'Disetujui')
                                    <span class="px-2 py-1 bg-green-500 text-white rounded-md">{{ $krsan->status }}</span>
                                @else
                                    <span class="px-2 py-1 bg-red-500 text-white rounded-md">{{ $krsan->status }}</span>
                                @endif
                            </td>
                        </tr>
                        @php
                            $totalSKS += $krsan->matkul->sks;
                        @endphp
                    @endforeach
                    <tr>
                        <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="3">Total SKS diambil
                        </td>
                        <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="1">
                            {{ $totalSKS }}/24</td>
                        <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="4">
                            Semester Ke {{ $semesterId }}</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
@endsection
