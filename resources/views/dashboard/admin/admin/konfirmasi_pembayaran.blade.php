@extends('layouts.master')

@section('judul', 'Konfirmasi Pembayaran')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">DATA KONFIRMASI PEMBAYARAN</h1>
        </div>
        <div class="px-5 mb-3">
            {{-- Notifikasi Success --}}
            @if (session('success'))
                <div id="successMessage"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
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
                <div id="successMessage" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative "
                    role="alert">
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

        <div class="flex px-5 gap-3">
            <a href="{{ route('export.konfirmasi_pembayaran') }}"><button
                    class="px-4 py-2 bg-amber-500 text-white rounded-md w-full mb-2"><i
                        class="fa-solid fa-print mr-2 text-white"></i>Export</button></a>
        </div>

        {{-- Tabel Konfirmasi Pembayaran --}}
        <div class="px-5 pb-2">
            <table class="min-w-full divide-y divide-gray-200" id="datatable">
                <thead class="bg-[#0463CA] text-white">
                    <tr>
                        <th class="px-3 py-3 border border-gray-300 text-md text-center">No</th>
                        <th class="px-3 py-3 border border-gray-300 text-md text-center">NIM Mahasiswa</th>
                        <th class="px-3 py-3 border border-gray-300 text-md text-center">Jumlah</th>
                        <th class="px-3 py-3 border border-gray-300 text-md text-center">Rekening</th>
                        <th class="px-3 py-3 border border-gray-300 text-md text-center">Transfer</th>
                        <th class="px-3 py-3 border border-gray-300 text-md text-center">Tanggal</th>
                        <th class="px-3 py-3 border border-gray-300 text-md text-center">Semester</th>
                        <th class="px-3 py-3 border border-gray-300 text-md text-center">Status</th>
                        <th class="px-3 py-3 border border-gray-300 text-md text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($konfirmasiPembayaran as $index => $konfirmasi)
                        <tr>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $index + 1 }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $konfirmasi->mahasiswa->nim }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-right">Rp
                                {{ number_format($konfirmasi->nominal, 0, ',', '.') }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $konfirmasi->rekening_tujuan }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $konfirmasi->metode_transfer }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $konfirmasi->tanggal_transfer }}
                            </td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $konfirmasi->semester }}</td>
                            <td class="px-3 py-4 border border-gray-400 text-center">{{ $konfirmasi->status_konfirmasi }}
                            </td>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                @if ($konfirmasi->status_konfirmasi == 'Diterima' || $konfirmasi->status_konfirmasi == 'Ditolak')
                                    -
                                @else
                                    <form action="{{ route('post.admin.konfirmasi_pembayaran', $konfirmasi->id) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" name="status" value="Diterima"
                                            class="bg-green-500 w-full hover:bg-green-600 text-white py-1 px-3 mb-1 rounded-lg">Diterima</button>
                                    </form>
                                    <form action="{{ route('post.admin.konfirmasi_pembayaran', $konfirmasi->id) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit" name="status" value="Ditolak"
                                            class="bg-red-500 w-full hover:bg-red-600 text-white py-1 px-3 mb-1 rounded-lg">Ditolak</button>
                                    </form>
                                @endif
                                <a href="{{ route('konfirmasi.lihat', $konfirmasi->id) }}"><button type="button"
                                        class="bg-blue-500 hover:bg-blue-600 w-full text-white py-1 px-3 mb-1 rounded-lg open-modal">Lihat</button>
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
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();
        });
    </script>
@endsection
