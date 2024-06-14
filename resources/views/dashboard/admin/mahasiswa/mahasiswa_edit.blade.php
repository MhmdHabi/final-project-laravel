@extends('layouts.master')

@section('judul', 'Edit Data Mahasiswa')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">FORM UPDATE MAHASISWA</h1>
        </div>

        {{-- Form Tambah Mahasiswa --}}
        <div class="px-5 pb-2">
            <form action="{{ route('admin.data_mahasiswa.update', ['id' => $mahasiswa->id]) }}" method="POST"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="image" class="block md:text-md lg:text-lg font-bold mb-2">Foto Profil</label>
                    <input type="file" name="image" id="image" class="w-full border-gray-700 rounded-md px-3 py-2"
                        value="{{ old('nim', $mahasiswa->image) }}">
                    @error('image')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    @if ($mahasiswa->image)
                        <div class="mt-2">
                            <img src="{{ Storage::url($mahasiswa->image) }}" alt="Foto Dosen" class="w-32 h-32 rounded-md">
                        </div>
                    @endif
                </div>
                <div class="mb-4">
                    <label for="nim" class="block md:text-md lg:text-lg font-bold mb-2">NIM</label>
                    <input type="number" name="nim" id="nim" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan NIM" value="{{ old('nim', $mahasiswa->nim) }}">
                    @error('nim')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block md:text-md lg:text-lg font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Email" value="{{ old('email', $mahasiswa->email) }}">
                    @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="block md:text-md lg:text-lg font-bold mb-2">Nama</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Nama" value="{{ old('name', $mahasiswa->name) }}">
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="gender" class="block md:text-md lg:text-lg font-bold mb-2">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="w-full border-gray-700 rounded-md px-3 py-2">
                        <option selected disabled>Pilih Gender</option>
                        <option value="Laki-laki" {{ old('gender', $mahasiswa->gender) == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki
                        </option>
                        <option value="Perempuan" {{ old('gender', $mahasiswa->gender) == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan
                        </option>
                    </select>
                    @error('gender')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="no_hp" class="block md:text-md lg:text-lg font-bold mb-2">Nomor HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Nomor HP" value="{{ old('no_hp', $mahasiswa->no_hp) }}">
                    @error('no_hp')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="tgl_lahir" class="block md:text-md lg:text-lg font-bold mb-2">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        class="w-full border-gray-700 rounded-md px-3 py-2"
                        value="{{ old('tgl_lahir', $mahasiswa->tgl_lahir) }}">
                    @error('tgl_lahir')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="jurusan" class="block md:text-md lg:text-lg font-bold mb-2">Jurusan</label>
                    <select name="jurusan" id="jurusan" class="w-full border-gray-700 rounded-md px-3 py-2">
                        <option selected disabled>Pilih Jurusan</option>
                        <option value="Teknik Informatika"
                            {{ old('jurusan', $mahasiswa->jurusan) == 'Teknik Informatika' ? 'selected' : '' }}>
                            Teknik Informatika</option>
                        <option value="Sistem Informasi"
                            {{ old('jurusan', $mahasiswa->jurusan) == 'Sistem Informasi' ? 'selected' : '' }}>
                            Sistem Informasi</option>
                    </select>
                    @error('jurusan')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="agama" class="block md:text-md lg:text-lg font-bold mb-2">Agama</label>
                    <input type="text" name="agama" id="agama" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Agama" value="{{ old('agama', $mahasiswa->agama) }}">
                    @error('agama')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block md:text-md lg:text-lg font-bold mb-2">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                        class="w-full border-gray-700 rounded-md px-3 py-2" placeholder="Masukkan Alamat"
                        value="{{ old('alamat', $mahasiswa->alamat) }}">
                    @error('alamat')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="role" class="block md:text-md lg:text-lg font-bold mb-2">Status Kuliah</label>
                    <select name="status_kuliah" id="status" class="w-full border-gray-700 rounded-md px-3 py-2">
                        <option selected disabled>Pilih Status</option>
                        <option value="aktif" {{ old('role') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="non-aktif" {{ old('role') == 'Non-Aktif' ? 'selected' : '' }}>Non-Aktif</option>
                    </select>
                    @error('status')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block md:text-md lg:text-lg font-bold mb-2">Password</label>
                    <div class="relative">
                        <input type="password" name="password" id="password"
                            class="w-full border-gray-700 rounded-md px-3 py-2" placeholder="Masukkan Password">
                        <span id="togglePassword"
                            class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                            <i id="iconEye" class="fas fa-eye-slash"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mt-6 flex">
                    <a href="{{ route('admin.data_mahasiswa') }}"
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
