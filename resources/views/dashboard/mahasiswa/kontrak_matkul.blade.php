@extends('layouts.master')

@section('judul', 'Kontrak Matakuliah')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">KONTRAK MATAKULIAH</h1>
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
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
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

        {{-- Tabel Kontrak Matakuliah --}}
        @if ($status && $status->is_open)
            {{-- Pesan --}}
            <div class="px-5 mb-3">
                <div class="bg-amber-100 border border-amber-400 text-amber-700 px-4 py-3 rounded relative " role="alert">
                    <strong>Perhatian:</strong> Harap teliti dalam mengisi KRS karena hanya dapat disubmit satu kali.
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                        <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path
                                d="M14.348 14.849l-4.849-4.849-4.849 4.849-1.414-1.414 4.849-4.849-4.849-4.849 1.414-1.414 4.849 4.849 4.849-4.849 1.414 1.414-4.849 4.849 4.849 4.849z" />
                        </svg>
                    </span>
                </div>
            </div>
            <form action="{{ route('post.mahasiswa.krs') }}" method="POST">
                @csrf
                <input type="hidden" name="mahasiswa_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="status" value="Menunggu">
                <div class="px-5 pb-2">
                    <div class="overflow-x-auto w-full">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-300">
                                <tr>
                                    <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                                    <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Kode MK</th>
                                    <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Matakuliah
                                    </th>
                                    <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                                        SKS
                                    </th>
                                    <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                                        Pilih
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5" class="px-3 py-4 border bg-amber-400 border-gray-400 font-semibold">
                                        Semester
                                        1</td>
                                </tr>
                                @foreach ($paket as $index => $pakets)
                                    @if ($pakets->paket_id == 1)
                                        <tr>
                                            <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->kode_mk }}</td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->nama_mk }}</td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                {{ $pakets->matkul->sks }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                <input type="checkbox" name="matkul_id[]" value="{{ $pakets->matkul->id }}"
                                                    class="mr-2">Pilih
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5" class="px-3 py-4 border bg-amber-400 border-gray-400 font-semibold">
                                        Semester
                                        2</td>
                                </tr>
                                @foreach ($paket as $index => $pakets)
                                    @if ($pakets->paket_id == 2)
                                        <tr>
                                            <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->kode_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->nama_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                {{ $pakets->matkul->sks }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                <input type="checkbox" name="matkul_id[]" value="{{ $pakets->matkul->id }}"
                                                    class="mr-2">Pilih
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5" class="px-3 py-4 border bg-amber-400 border-gray-400 font-semibold">
                                        Semester
                                        3</td>
                                </tr>
                                @foreach ($paket as $index => $pakets)
                                    @if ($pakets->paket_id == 3)
                                        <tr>
                                            <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->kode_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->nama_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                {{ $pakets->matkul->sks }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                <input type="checkbox" name="matkul_id[]" value="{{ $pakets->matkul->id }}"
                                                    class="mr-2">Pilih
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5" class="px-3 py-4 border bg-amber-400 border-gray-400 font-semibold">
                                        Semester
                                        4</td>
                                </tr>
                                @foreach ($paket as $index => $pakets)
                                    @if ($pakets->paket_id == 4)
                                        <tr>
                                            <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->kode_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->nama_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                {{ $pakets->matkul->sks }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                <input type="checkbox" name="matkul_id[]" value="{{ $pakets->matkul->id }}"
                                                    class="mr-2">Pilih
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5" class="px-3 py-4 border bg-amber-400 border-gray-400 font-semibold">
                                        Semester
                                        5</td>
                                </tr>
                                @foreach ($paket as $index => $pakets)
                                    @if ($pakets->paket_id == 5)
                                        <tr>
                                            <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->kode_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->nama_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                {{ $pakets->matkul->sks }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                <input type="checkbox" name="matkul_id[]"
                                                    value="{{ $pakets->matkul->id }}" class="mr-2">Pilih
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5"
                                        class="px-3 py-4 border bg-amber-400 border-gray-400 font-semibold">
                                        Semester
                                        6</td>
                                </tr>
                                @foreach ($paket as $index => $pakets)
                                    @if ($pakets->paket_id == 6)
                                        <tr>
                                            <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->kode_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->nama_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                {{ $pakets->matkul->sks }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                <input type="checkbox" name="matkul_id[]"
                                                    value="{{ $pakets->matkul->id }}" class="mr-2">Pilih
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5"
                                        class="px-3 py-4 border bg-amber-400 border-gray-400 font-semibold">
                                        Semester
                                        7</td>
                                </tr>
                                @foreach ($paket as $index => $pakets)
                                    @if ($pakets->paket_id == 7)
                                        <tr>
                                            <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->kode_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->nama_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                {{ $pakets->matkul->sks }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                <input type="checkbox" name="matkul_id[]"
                                                    value="{{ $pakets->matkul->id }}" class="mr-2">Pilih
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="5"
                                        class="px-3 py-4 border bg-amber-400 border-gray-400 font-semibold">
                                        Semester
                                        8</td>
                                </tr>
                                @foreach ($paket as $index => $pakets)
                                    @if ($pakets->paket_id == 8)
                                        <tr>
                                            <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->kode_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400">{{ $pakets->matkul->nama_mk }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                {{ $pakets->matkul->sks }}
                                            </td>
                                            <td class="px-3 py-4 border border-gray-400 text-center">
                                                <input type="checkbox" name="matkul_id[]"
                                                    value="{{ $pakets->matkul->id }}" class="mr-2">Pilih
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{-- Tombol Submit --}}
                <div class="flex justify-start px-5 mt-4">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded">Submit</button>
                </div>
            </form>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                Kontrak Matkul belum dibuka.
            </div>
        @endif
    </div>
@endsection
