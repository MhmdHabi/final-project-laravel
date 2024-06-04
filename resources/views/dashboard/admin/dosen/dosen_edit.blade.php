@extends('layouts.master')

@section('judul', 'Edit Data Dosen')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">FORM UPDATE DOSEN</h1>
        </div>

        {{-- Form Tambah Mahasiswa --}}
        <div class="px-5 pb-2">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nim" class="block md:text-md lg:text-lg font-bold mb-2">NIDN</label>
                    <input type="text" name="nidn" id="nidn" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan NIDN">
                </div>
                <div class="mb-4">
                    <label for="email" class="block md:text-md lg:text-lg font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Email">
                </div>
                <div class="mb-4">
                    <label for="nama" class="block md:text-md lg:text-lg font-bold mb-2">Nama</label>
                    <input type="text" name="nama" id="nama" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Nama">
                </div>
                <div class="mb-4">
                    <label for="jabatan" class="block md:text-md lg:text-lg font-bold mb-2">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Jabatan">
                </div>
                <div class="mb-4">
                    <label for="jenis_kelamin" class="block md:text-md lg:text-lg font-bold mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin" class="w-full border-gray-700 rounded-md px-3 py-2">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="nomor_hp" class="block md:text-md lg:text-lg font-bold mb-2">Nomor HP</label>
                    <input type="text" name="nomor_hp" id="nomor_hp" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Nomor HP">
                </div>
                <div class="mb-4">
                    <label for="tanggal_lahir" class="block md:text-md lg:text-lg font-bold mb-2">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        class="w-full border-gray-700 rounded-md px-3 py-2">
                </div>
                <div class="mb-4">
                    <label for="agama" class="block md:text-md lg:text-lg font-bold mb-2">Agama</label>
                    <input type="text" name="agama" id="agama" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Agama">
                </div>
                <div class="mb-4">
                    <label for="password" class="block md:text-md lg:text-lg font-bold mb-2">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                            class="w-full border-gray-700 rounded-md px-3 py-2" placeholder="Masukkan Password">
                        <span id="togglePassword" class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                            <i id="iconEye" class="fas fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
                <div class="mt-6 flex">
                    <a href="{{ route('admin.data_dosen') }}"
                        class="px-4 mr-2 py-[10px] bg-gray-500 text-white rounded-md w-1/2 text-center">Kembali</a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md w-1/2">Submit</button>
                </div>
            </form>
        </div>
    </div>

    {{-- Jquery Start --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/togglePasswordEdit.js') }}"></script>
@endsection
