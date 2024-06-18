@extends('layouts.master')

@section('judul', 'Aktifasi Absen')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">PRESENSI MAHASISWA</h1>
        </div>
        <div class="px-5 mb-3">
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
        <div class="px-5 pb-2 overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-200 whitespace-nowrap">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Kode MK</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Nama MK</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">SKS</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Ruangan</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Kelas</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($matkuls as $matkul)
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $matkul->kode_mk }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $matkul->nama_mk }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $matkul->sks }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $matkul->ruangan }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $matkul->kelas }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                <form action="{{ route('dosen.toggle_absensi', $matkul->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="px-4 py-2 rounded-md mb-2 w-full text-center {{ optional($matkul->presensiDosen)->is_open ? 'bg-red-500 text-white' : 'bg-green-500 text-white' }}">
                                        {{ optional($matkul->presensiDosen)->is_open ? 'Tutup Absensi' : 'Buka Absensi' }}
                                    </button>
                                </form>
                                <a href="{{ route('dosen.rekap_absen', ['id' => $matkul->id]) }}">
                                    <button
                                        class="px-4 py-2 bg-cyan-500 text-white rounded-md w-full text-center">Lihat</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Jquery Start --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/sessionTime.js') }}"></script>
@endsection
