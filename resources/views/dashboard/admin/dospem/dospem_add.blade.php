@extends('layouts.master')

@section('judul', 'Tambah Data Dospem')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">FORM TAMBAH MAHASISWA DOSPEM</h1>
        </div>

        {{-- Form Tambah Dosen --}}
        <div class="px-5 pb-2">
            <form action="{{ route('admin.data_dospem.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="dospem_id" class="block md:text-md lg:text-lg font-bold mb-2">Dosen Pembimbing</label>
                    <select name="dospem_id" id="dospem_id" class="w-full border-gray-700 rounded-md px-3 py-2">
                        <option selected disabled>Pilih Dospem</option>
                        @foreach ($dosen as $d)
                            <option value="{{ $d->id }}">{{ $d->name }}</option>
                        @endforeach
                    </select>
                    @error('dospem_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="mahasiswa_id" class="block md:text-md lg:text-lg font-bold mb-2">Mahasiswa</label>
                    <select name="mahasiswa_id" id="mahasiswa_id" class="w-full border-gray-700 rounded-md px-3 py-2">
                        <option selected disabled>Pilih Mahasiswa</option>
                        @foreach ($mahasiswa as $m)
                            <option value="{{ $m->id }}">{{ $m->name }}</option>
                        @endforeach
                    </select>
                    @error('mahasiswa_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6 flex">
                    <a href="{{ route('admin.data_dospem') }}"
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
