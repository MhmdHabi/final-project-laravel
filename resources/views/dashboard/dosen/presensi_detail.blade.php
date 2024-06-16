@extends('layouts.master')

@section('judul', 'Rekap Presensi')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md ">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">REKAP PRESENSI MATAKULIAH</h1>
        </div>

        {{-- tabel Krs --}}
        <div class=" px-5 pb-2 overflow-auto">
            <div class="flex justify-between mb-1">
                <a href="{{ route('dosen.presensi') }}" class="border py-1 px-4 text-white bg-amber-500 rounded"><i
                        class="fa-solid fa-angle-left mr-2"></i>Kembali</a>
                <a href="#" class="border py-1 px-4 text-white bg-[#2e4765] rounded"><i
                        class="fa-solid fa-print mr-2 text-white"></i>Cetak</a>
            </div>
            <table class="min-w-full border-collapse border border-gray-200 ">
                <thead class="bg-gray-300">
                    <tr>
                        <th class=" px-3 py-3 border border-gray-400 text-center text-md text-black">
                            No</th>
                        <th class="px-3 py-3 border border-gray-400 text-center text-md text-black">
                            NIM</th>
                        <th class="px-3 py-3 border border-gray-400 text-center text-md text-black">
                            Nama Mahasiswa</th>
                        <th class="px-3 py-3 border border-gray-400 text-center text-md text-black">
                            Kelas</th>
                        <th class="px-3 py-3 border border-gray-400 text-center text-md text-black">
                            Total Hadir</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($mahasiswa as $index => $mhs)
                        <tr>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $index + 1 }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $mhs->nim }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $mhs->name }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $matkul->kelas }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                {{ $kehadiranPerMahasiswa[$mhs->id] ?? 0 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
