@extends('layouts.master')

@section('judul', 'Presensi Mahasiswa')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">PRESENSI PERKULIAHAN MAHASISWA</h1>
        </div>
        <div class="mb-3">
            {{-- Notifikasi Success --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 14.849l-4.849-4.849-4.849 4.849-1.414-1.414 4.849-4.849-4.849-4.849 1.414-1.414 4.849 4.849 4.849-4.849 1.414 1.414-4.849 4.849 4.849 4.849z" />
                        </svg>
                    </span>
                </div>
            @endif

            {{-- Notifikasi Error --}}
            @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    {{ session('error') }}
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 14.849l-4.849-4.849-4.849 4.849-1.414-1.414 4.849-4.849-4.849-4.849 1.414-1.414 4.849 4.849 4.849-4.849 1.414 1.414-4.849 4.849 4.849 4.849z" />
                        </svg>
                    </span>
                </div>
            @endif
        </div>

        {{-- tabel presensi --}}
        @if ($mataKuliah)
            {{-- Pesan --}}
            <div class=" mb-3">
                <div class="bg-amber-100 border border-amber-400 text-amber-700 px-4 py-3 rounded relative " role="alert">
                    <strong>Perhatian:</strong> Harap mengisi presensi satu kali.
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 14.849l-4.849-4.849-4.849 4.849-1.414-1.414 4.849-4.849-4.849-4.849 1.414-1.414 4.849 4.849 4.849-4.849 1.414 1.414-4.849 4.849 4.849 4.849z" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="px-5 pb-2 mt-5 overflow-x-auto">
                <table class="min-w-full border-collapse border border-gray-200 whitespace-nowrap">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Kode MK</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Nama MK</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Dosen</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">SKS</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Ruangan</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($mataKuliah as $index => $matkul)
                            <tr>
                                <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $matkul->matkul->kode_mk }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $matkul->matkul->nama_mk }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $matkul->matkul->dosen->name }}</td>
                                <td class="px-3 py-4 border border-gray-400 text-center">{{ $matkul->matkul->sks }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $matkul->matkul->ruangan }}</td>
                                <td class="px-3 py-4 border border-gray-400 text-center">
                                    @if ($matkul->matkul->presensiDosen && $matkul->matkul->presensiDosen->is_open)
                                        <form action="{{ route('mahasiswa.absen') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="matkul_id" value="{{ $matkul->matkul->id }}">
                                            <button type="submit"
                                                class="px-4 py-2 bg-green-500 text-white rounded-md mb-2 w-full text-center">
                                                Masuk
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-red-500 font-bold">Presensi Ditutup</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                KRS belum disetujui.
            </div>
        @endif
    </div>
@endsection
