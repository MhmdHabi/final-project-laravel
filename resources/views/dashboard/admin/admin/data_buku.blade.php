@extends('layouts.master')

@section('judul', 'Data Buku')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">DATA BUKU</h1>
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

        {{-- Tabel Buku --}}
        <div class="px-5 pb-2">
            {{-- Tombol Pinjam --}}
            <div class="flex justify-beetwen mb-2">
                <a href="{{ route('admin.data_buku.add') }}"
                    class="border py-2 px-4 text-white bg-amber-500 rounded-lg my-auto mb-0">
                    Tambah Buku</a>
            </div>
            <table class="min-w-full divide-y divide-gray-200" id="datatable">
                <thead class="bg-gray-300">
                    <tr>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">No</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Judul</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Pengarang</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Stok</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Deskripsi</th>
                        <th class="px-3 py-3 border border-gray-400 text-left text-md text-black text-center">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($buku as $item)
                        <tr>
                            <td class="px-3 py-4 border border-gray-400 text-center">
                                {{ $loop->iteration }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $item->judul }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $item->pengarang }}</td>
                            <td class="px-3 py-4 border border-gray-400">{{ $item->stok }}
                            </td>
                            <td class="px-3 py-4 border border-gray-400 text-justify">
                                {{ $item->deskripsi }}
                            </td>
                            <td class="px-2 py-4 border border-gray-400">
                                <a href="{{ route('admin.data_buku.edit', ['id' => $item->id]) }}"><button
                                        class="px-4 py-2 bg-blue-500 text-white rounded-md w-full mb-2">Edit</button></a>
                                <form action="{{ route('admin.data_buku.delete', ['id' => $item->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="px-4 py-2 bg-red-500 text-white rounded-md w-full">Delete</button>
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
