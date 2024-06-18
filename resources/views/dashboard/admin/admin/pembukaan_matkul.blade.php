@extends('layouts.master')

@section('judul', 'Aktifasi Matkul')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">Konfirmasi Aktifasi Mata Kuliah</h1>
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

        {{-- Tabel Konfirmasi Peminjaman --}}
        <div class="px-5 pb-2">
            <div class="overflow-x-auto w-full">
                <form action="{{ route('admin.toggle_aktif') }}" method="GET">
                    <button type="submit"
                        class="px-4 py-2 font-bold text-white rounded 
                        @if (!App\Models\AktifasiMatkul::first()->is_open) bg-[#0463CA] hover:bg-green-700 
                        @else
                            bg-red-500 hover:bg-red-700 @endif">
                        @if (!App\Models\AktifasiMatkul::first()->is_open)
                            Buka Pemilihan Mata Kuliah
                        @else
                            Tutup Pemilihan Mata Kuliah
                        @endif
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
