@extends('layouts.master')

@section('judul', 'Tambah Data Buku')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">FORM TAMBAH BUKU</h1>
        </div>

        {{-- Form Tambah Admin --}}
        <div class="px-5 pb-2">
            <form action="{{ route('admin.data_buku.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="judul" class="block md:text-md lg:text-lg font-bold mb-2">Judul</label>
                    <input type="text" name="judul" id="judul" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan judul" value="{{ old('judul') }}">
                    @error('judul')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="pengarang" class="block md:text-md lg:text-lg font-bold mb-2">Pengarang</label>
                    <input type="pengarang" name="pengarang" id="pengarang"
                        class="w-full border-gray-700 rounded-md px-3 py-2" placeholder="Masukkan pengarang"
                        value="{{ old('pengarang') }}">
                    @error('pengarang')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="stok" class="block md:text-md lg:text-lg font-bold mb-2">Stok</label>
                    <input type="number" name="stok" id="stok" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan stok" value="{{ old('stok') }}">
                    @error('stok')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="deskripsi" class="block md:text-md lg:text-lg font-bold mb-2">Deskripsi</label>
                    <textarea type="deskripsi" name="deskripsi" id="deskripsi" class="w-full border-gray-700 rounded-md px-3 h-32"
                        placeholder="Masukkan deskripsi" value="{{ old('deskripsi') }}"></textarea>
                    @error('deskripsi')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6 flex">
                    <a href="{{ route('admin.data_buku') }}"
                        class="px-4 mr-2 py-[10px] bg-gray-500 text-white rounded-md w-1/2 text-center">Kembali</a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md w-1/2">Submit</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Jquery Start --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/togglePasswordAdd.js') }}"></script>
@endsection
