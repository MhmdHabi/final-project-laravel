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
                <p>: {{ $mahasiswa->nim }}</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Nama</p>
                <p>: {{ $mahasiswa->name }}</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Email</p>
                <p>: {{ $mahasiswa->email }}</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Jurusan</p>
                <p>: {{ $mahasiswa->jurusan }}</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Semester</p>
                @if ($semester)
                    <p>: {{ $semester->semester->semester }} - {{ $semester->semester->akademik_id }}</p>
                @else
                    <p>: - </p>
                @endif
            </div>
        </div>

        {{-- Tabel Transkip Matakuliah --}}
        <div class="px-5 pb-2">
            <div class="overflow-x-auto w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="w-1/12 px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                            <th class="w-2/12 px-3 py-3 border border-gray-400 text-left text-md text-black">Kode MK
                            </th>
                            <th class="w-3/12 px-3 py-3 border border-gray-400 text-left text-md text-black">Mata Kuliah
                            </th>
                            <th class="w-2/12 px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                                SKS
                            </th>
                            <th class="w-2/12 px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                                Grade</th>
                            <th class="w-2/12 px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                                Mutu</th>
                        </tr>
                    </thead>
                    @foreach ($transkip as $krs)
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Header Semester 1 -->
                            <tr>
                                <td colspan="6" class="px-3 py-3 border border-gray-400 font-bold bg-amber-300">Semester
                                    {{ $loop->iteration }}</td>
                            </tr>
                            @foreach ($krs->matkulKrs as $index => $khsan)
                                <tr>
                                    <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                    <td class="px-3 py-4 border border-gray-400">{{ $khsan->matkul->kode_mk }}</td>
                                    <td class="px-3 py-4 border border-gray-400">{{ $khsan->matkul->nama_mk }}</td>
                                    <td class="px-3 py-4 border border-gray-400 text-center">{{ $khsan->matkul->sks }}</td>
                                    <td class="px-3 py-4 border border-gray-400 text-center">
                                        {{ getGrade($khsan->nilai) }}
                                    </td>
                                    <td class="px-3 py-4 border border-gray-400 text-center">
                                        {{ $khsan->nilai }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="px-5">
            <div class="flex py-1">
                <strong>
                    <p class="w-auto">Indeks Prestasi Kumulatif</p>
                </strong>
                <strong>
                    <p>: {{ number_format($nilai, 2) }}</p>
                </strong>
            </div>
            <div class="flex py-1">
                <strong>
                    <p class="w-auto">Total SKS</p>
                </strong>
                <strong>
                    <p>: {{ $totalSKS }}</p>
                </strong>
            </div>
        </div>
    </section>
@endsection

@php
    function getGrade($nilai)
    {
        if ($nilai !== null) {
            if ($nilai >= 3.75 && $nilai <= 4.0) {
                return 'A';
            } elseif ($nilai >= 3.5 && $nilai < 3.75) {
                return 'A-';
            } elseif ($nilai >= 3.0 && $nilai < 3.5) {
                return 'B+';
            } elseif ($nilai >= 2.75 && $nilai < 3.0) {
                return 'B';
            } elseif ($nilai >= 2.5 && $nilai < 2.75) {
                return 'B-';
            } elseif ($nilai >= 2.0 && $nilai < 2.5) {
                return 'C';
            } elseif ($nilai >= 1.5 && $nilai < 2.0) {
                return 'D';
            } else {
                return 'E';
            }
        } else {
            $nilai == null;
        }
    }
@endphp
