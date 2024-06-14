@extends('layouts.master')

@section('judul', 'Edit Dospem Mahasiswa')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">FORM EDIT MAHASISWA DOSPEM</h1>
        </div>

        <div class="px-5 pb-2">
            <form action="{{ route('admin.data_dospem.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="dospem_id" class="block md:text-md lg:text-lg font-bold mb-2">Dosen Pembimbing</label>
                    <select name="dospem_id" id="dospem_id" class="w-full border-gray-700 rounded-md px-3 py-2">
                        <option selected disabled>Pilih Dospem</option>
                        @foreach ($dosen as $d)
                            <option value="{{ $d->id }}" @if ($d->id == $dosenPA->dospem_id) selected @endif>
                                {{ $d->name }}</option>
                        @endforeach
                    </select>
                    @error('dospem_id')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6">
                    <a href="{{ url()->previous() }}" class="px-4 py-[10px] bg-amber-500 text-white rounded-md"><i
                            class="fa-solid fa-angle-left mr-2"></i>Kembali</a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
