@extends('layouts.master')

@section('judul', 'Jadwal Dosen')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md ">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">JADWAL MENGAJAR DOSEN</h1>
        </div>

        {{-- tabel Krs --}}
        <div class=" px-5 pb-2 overflow-auto">
            <table class="min-w-full border-collapse border border-gray-200 ">
                <thead class="bg-gray-300">
                    <tr>
                        <th class=" px-3 py-3 border border-gray-400 text-left text-md text-black">
                            No</th>
                        <th class="px-3 py-3 border border-gray-400 txet-left text-md text-black">
                            Kode MK</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            Matakuliah</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                            SKS</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                            Kelas</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">
                            Ruangan</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">
                            Jadwal</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($jadwal as $index => $schedule)
                        <tr>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $index + 1 }}</td>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $schedule->kode_mk }}</td>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">{{ $schedule->nama_mk }}</td>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">{{ $schedule->sks }}
                            </td>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">
                                {{ $schedule->kelas }}</td>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap text-center">
                                {{ $schedule->ruangan }}</td>
                            <td class="px-3 py-4 border border-gray-400 whitespace-nowrap">
                                {{ date('l, H:i', strtotime($schedule->jadwal)) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
