@extends('layouts.master')

@section('judul', 'Konfirmasi KRS')

@section('content')
    <section class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">KONFIRMASI KRS MAHASISWA</h1>
        </div>

        <div class="px-5 pb-2">
            <div class="flex justify-start mb-1">
                <a href="{{ route('dosen.konfirmasi_krs') }}" class="border py-1 px-4 text-white bg-amber-500 rounded">
                    <i class="fa-solid fa-angle-left mr-2"></i>Kembali</a>
            </div>
            <div class="flex py-1">
                <p class="w-36">NIM</p>
                <p>: {{ $mahasiswa->nim }}</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Nama Mahasiswa</p>
                <p>: {{ $mahasiswa->name }}</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Jurusan</p>
                <p>: {{ $mahasiswa->jurusan }}</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Semester</p>
                <p>: {{ $semester->semester }} - {{ $semester->akademik_id }}</p>
            </div>
            <div class="flex py-1">
                <p class="w-36">Dosen PA</p>
                <p>: {{ $dosenPA->user->name }}</p>
            </div>

            <div class="px-5 pb-2 mt-3">
                <div class="overflow-x-auto w-full">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-300">
                            <tr>
                                <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                                <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Kode MK</th>
                                <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Nama MK</th>
                                <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">SKS</th>
                                <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Status</th>
                                <th class="px-3 py-3 border border-gray-400 text-left text-md text-black w-32">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @php
                                $totalSKS = 0;
                            @endphp
                            @foreach ($matkulKrs as $index => $krs)
                                <tr>
                                    <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                    <td class="px-3 py-4 border border-gray-400">{{ $krs->matkul->kode_mk }}</td>
                                    <td class="px-3 py-4 border border-gray-400">{{ $krs->matkul->nama_mk }}</td>
                                    <td class="px-3 py-4 border border-gray-400">{{ $krs->matkul->sks }}</td>
                                    <td class="px-3 py-4 border border-gray-400">{{ $krs->status }}</td>
                                    <td class="px-3 py-4 border border-gray-400">
                                        <form action="{{ route('post.dosen.konfirmasi_krs', ['id' => $krs->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" name="action" value="Disetujui"
                                                class="px-4 py-2 bg-green-500 text-white rounded-md mb-2 w-full">Disetujui</button>
                                        </form>
                                        <form action="{{ route('post.dosen.konfirmasi_krs', ['id' => $krs->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" name="action" value="Ditolak"
                                                class="px-4 py-2 bg-red-500 text-white rounded-md w-full">Ditolak</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $totalSKS += $krs->matkul->sks;
                                @endphp
                            @endforeach
                            <tr>
                                <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="3">Total SKS
                                    diambil
                                </td>
                                <td class="px-3 py-4 border border-gray-400 bg-gray-300 font-bold" colspan="6">
                                    {{ $totalSKS }}/24</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
