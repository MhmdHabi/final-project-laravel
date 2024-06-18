@extends('layouts.master')

@section('judul', 'Rekap Nilai')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md ">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">REKAP NILAI {{ strtoupper($matkul->nama_mk) }}</h1>
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

        <div class="px-5 mb-3">
            <div class="bg-amber-100 border border-amber-400 text-amber-700 px-4 py-3 rounded relative " role="alert">
                <strong>Perhatian:</strong> Harap mengisi nilai dengan format 0.00
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <path
                            d="M14.348 14.849l-4.849-4.849-4.849 4.849-1.414-1.414 4.849-4.849-4.849-4.849 1.414-1.414 4.849 4.849 4.849-4.849 1.414 1.414-4.849 4.849 4.849 4.849z" />
                    </svg>
                </span>
            </div>
        </div>
        <div class=" px-5 pb-2 overflow-auto">
            <div class="flex justify-between mb-1">
                <a href="{{ route('dosen.input.nilai') }}" class="border py-1 px-4 text-white bg-amber-500 rounded"><i
                        class="fa-solid fa-angle-left mr-2"></i>Kembali</a>
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
                            Nilai</th>
                        <th class="px-3 py-3 border border-gray-400 text-center text-md text-black">
                            Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($matkul->matkulKrs as $index => $matkulKrs)
                        <tr>
                            <td class="px-3 py-4 border border-gray-400">{{ $loop->iteration }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $matkulKrs->krs->mahasiswa->nim }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $matkulKrs->krs->mahasiswa->name }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $matkul->kelas }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                @if ($matkulKrs->nilai === null)
                                    <span class="text-red-600 font-bold">Belum di nilai</span>
                                @else
                                    {{ $matkulKrs->nilai }}
                                @endif
                            </td>
                            <td class="px-3 py-4 border border-gray-500 text-center">
                                <form action="{{ route('post.dosen.input.nilai') }}" method="POST" class="inline-block">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $matkulKrs->id }}">
                                    <input type="number" name="nilai" value="{{ $matkulKrs->nilai }}" min="0"
                                        max="100" step="0.01"
                                        class="form-input mt-1 block w-24 inline-block border border-gray-300 rounded-md px-2 py-1">
                                    <button type="submit"
                                        class="px-4 py-2 bg-green-600 text-white rounded-md ml-2">Simpan</button>
                                </form>
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
