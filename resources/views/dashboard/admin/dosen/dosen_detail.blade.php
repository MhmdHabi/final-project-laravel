@extends('layouts.master')

@section('judul', 'Detail Dosen')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 rounded py-5">
        <div class="mb-3 px-3 font-bold">
            <a href="{{ route('admin.data_dosen') }}" class="text-black w-1/2 text-center text-lg"><i
                    class="fa-solid fa-angle-left mr-2"></i>Kembali</a>
        </div>
        <div class="lg:flex sm:block">
            @if ($dosen->image)
                <img src="{{ asset(str_replace('public/', 'storage/', $dosen->image)) }}" alt=""
                    class="w-52 object-cover h-56 m-3">
            @else
                <img src="{{ asset('asset/default_profile.png') }}" alt="" class="w-52 object-cover h-56 m-3">
            @endif

            <div class="lg:ml-5 md:ml-3 w-full mt-3">
                <h4 class="font-bold py-3 border-t border-b">{{ $dosen->name }}</h4>
                <div class="list flex py-3 border-b">
                    <p class="w-36">NIDN</p>
                    <p>: {{ $dosen->nidn }}</p>
                </div>
                <div class="list flex py-3 border-b">
                    <p class="w-36">Email</p>
                    <p>: {{ $dosen->email }}</p>
                </div>
                <div class="list flex py-3 border-b">
                    <p class="w-36">Jabatan</p>
                    <p>: {{ $dosen->jabatan }}</p>
                </div>
                <div class="list flex py-3 border-b">
                    <p class="w-36">Jenis kelamin</p>
                    <p>: {{ $dosen->gender }}</p>
                </div>
                <div class="list flex py-3 border-b">
                    <p class="w-36">Nomor Hp</p>
                    <p>: {{ $dosen->no_hp }}</p>
                </div>
                <div class="list flex py-3 border-b">
                    <p class="w-36">Tanggal Lahir</p>
                    <p>: {{ $dosen->tgl_lahir }}</p>
                </div>
                <div class="list flex py-3 border-b">
                    <p class="w-36">Agama</p>
                    <p>: {{ $dosen->agama }}</p>
                </div>
                <div class="list flex py-3 border-b">
                    <p class="w-36">Alamat</p>
                    <p>: {{ $dosen->alamat }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
