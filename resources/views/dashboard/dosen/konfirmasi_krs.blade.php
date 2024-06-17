@extends('layouts.master')

@section('judul', 'Daftar KRS Menunggu Konfirmasi')

@section('content')
    <section class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-5 justify-center">
            <h1 class="font-bold text-xl">DAFTAR KRS MENUNGGU KONFIRMASI</h1>
        </div>

        <div class="px-5 pb-2">
            <div class="overflow-x-auto w-full">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">No</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Nama Mahasiswa</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">NIM</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Semester</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black">Status</th>
                            <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($krsList as $index => $krs)
                            <tr>
                                <td class="px-3 py-4 border border-gray-400">{{ $index + 1 }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $krs->mahasiswa->name }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $krs->mahasiswa->nim }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $krs->semester->semester }} -
                                    {{ $krs->semester->akademik_id }}</td>
                                <td class="px-3 py-4 border border-gray-400">{{ $krs->status }}</td>
                                <td class="px-3 py-4 border border-gray-400 text-center">
                                    <a href="{{ route('dosen.konfirmasi_krs_detail', ['id' => $krs->id]) }}"
                                        class="px-4 py-2 bg-cyan-500 text-white rounded-md mb-2 inline-block text-center">Lihat</a>
                                    <form action="{{ route('hapus.krs', ['id' => $krs->id]) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-500 text-white rounded-md mb-2 w-auto inline-block text-center">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
