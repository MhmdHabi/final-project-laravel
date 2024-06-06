@extends('layouts.master')

@section('judul', 'Tambah Data Admin')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">FORM TAMBAH ADMIN</h1>
        </div>

        {{-- Form Tambah Admin --}}
        <div class="px-5 pb-2">
            <form action="{{ route('admin.data_admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="username" class="block md:text-md lg:text-lg font-bold mb-2">Username</label>
                    <input type="text" name="username" id="username" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Username" value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block md:text-md lg:text-lg font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Email" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="block md:text-md lg:text-lg font-bold mb-2">Nama</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Nama" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="role" class="block md:text-md lg:text-lg font-bold mb-2">Role</label>
                    <select name="role" id="role" class="w-full border-gray-700 rounded-md px-3 py-2">
                        <option selected disabled>Pilih Role</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
                        <option value="dosen" {{ old('role') == 'dosen' ? 'selected' : '' }}>dosen</option>
                        <option value="mahasiswa" {{ old('role') == 'mahasiswa' ? 'selected' : '' }}>mahasiswa</option>
                    </select>
                    @error('role')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
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
                    @error('password')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block md:text-md lg:text-lg font-bold mb-2">Konfirmasi
                        Password</label>
                    <div class="relative">
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full border-gray-700 rounded-md px-3 py-2" placeholder="Masukkan Konfirmasi Password">
                        <span id="toggleKonfirmasiPassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                            <i id="iconEyeKonfirmasi" class="fas fa-eye-slash"></i>
                        </span>
                    </div>
                    @error('password_confirmation')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6 flex">
                    <a href="{{ route('admin.data_admin') }}"
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
