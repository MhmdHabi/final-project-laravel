@extends('layouts.master')

@section('judul', 'Tambah Data Mahasiswa')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">FORM TAMBAH MAHASISWA</h1>
        </div>

        {{-- Form Tambah Mahasiswa --}}
        <div class="px-5 pb-2">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nim" class="block md:text-md lg:text-lg font-bold mb-2">NIM</label>
                    <input type="text" name="nim" id="nim" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan NIM">
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
                    <label for="jurusan" class="block md:text-md lg:text-lg font-bold mb-2">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="w-full border-gray-700 rounded-md px-3 py-2">
                        <option selected disabled>Pilih Jurusan</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                    </select>
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
                <div class="mb-4">
                    <label for="konfirmasi_password" class="block md:text-md lg:text-lg font-bold mb-2">Konfirmasi
                        Password</label>
                    <div class="relative">
                        <input type="password" name="konfirmasi_password" id="konfirmasi_password"
                            class="w-full border-gray-700 rounded-md px-3 py-2" placeholder="Masukkan Konfirmasi Password">
                        <span id="toggleKonfirmasiPassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                            <i id="iconEyeKonfirmasi" class="fas fa-eye-slash"></i>
                        </span>
                    </div>
                </div>
                <div class="mt-6 flex">
                    <a href="{{ route('admin.data_mahasiswa') }}"
                        class="px-4 mr-2 py-[10px] bg-gray-500 text-white rounded-md w-1/2 text-center">Kembali</a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md w-1/2">Submit</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePassword = document.querySelector('#togglePassword');
            const toggleKonfirmasiPassword = document.querySelector('#toggleKonfirmasiPassword');
            const password = document.querySelector('#password');
            const konfirmasiPassword = document.querySelector('#konfirmasi_password');

            togglePassword.addEventListener('click', function() {
                const iconEye = document.querySelector('#iconEye');
                if (password.type === 'password') {
                    password.type = 'text';
                    iconEye.classList.remove('fa-eye-slash');
                    iconEye.classList.add('fa-eye');
                } else {
                    password.type = 'password';
                    iconEye.classList.remove('fa-eye');
                    iconEye.classList.add('fa-eye-slash');
                }
            });

            toggleKonfirmasiPassword.addEventListener('click', function() {
                const iconEyeKonfirmasi = document.querySelector('#iconEyeKonfirmasi');
                if (konfirmasiPassword.type === 'password') {
                    konfirmasiPassword.type = 'text';
                    iconEyeKonfirmasi.classList.remove('fa-eye-slash');
                    iconEyeKonfirmasi.classList.add('fa-eye');
                } else {
                    konfirmasiPassword.type = 'password';
                    iconEyeKonfirmasi.classList.remove('fa-eye');
                    iconEyeKonfirmasi.classList.add('fa-eye-slash');
                }
            });
        });
    </script>

@endsection
