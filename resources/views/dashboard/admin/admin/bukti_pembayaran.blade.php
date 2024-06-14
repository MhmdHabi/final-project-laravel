@extends('layouts.master')

@section('judul', 'Bukti Pembayaran')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">BUKTI PEMBAYARAN</h1>
        </div>

        <div class="flex px-5">
            <a href="{{ route('admin.konfirmasi_pembayaran') }}"><button
                    class="px-4 py-2 bg-[#13947D] text-white rounded-md w-full mb-2">Kembali</button></a>
        </div>

        {{-- Tabel Data Dosen --}}
        <div class="px-5 pb-2 flex justify-center">
            <img class="w-full" src="{{ asset('storage/' . $pembayaran->bukti_pembayaran) }}" alt="Bukti Pembayaran">
        </div>

    </div>
@endsection
