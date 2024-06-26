@extends('layouts.master')

@section('judul', 'Edit Data Dosen')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">FORM UPDATE DOSEN</h1>
        </div>

        {{-- Form Update Dosen --}}
        <div class="px-5 pb-2">
            <form action="{{ route('admin.data_dosen.update', $dosen->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nidn" class="block md:text-md lg:text-lg font-bold mb-2">NIDN</label>
                    <input type="text" name="nidn" id="nidn" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan NIDN" value="{{ old('nidn', $dosen->nidn) }}">
                    @error('nidn')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="block md:text-md lg:text-lg font-bold mb-2">Email</label>
                    <input type="email" name="email" id="email" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Email" value="{{ old('email', $dosen->email) }}">
                    @error('email')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="name" class="block md:text-md lg:text-lg font-bold mb-2">Nama</label>
                    <input type="text" name="name" id="name" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Nama" value="{{ old('name', $dosen->name) }}">
                    @error('name')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="jabatan" class="block md:text-md lg:text-lg font-bold mb-2">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Jabatan" value="{{ old('jabatan', $dosen->jabatan) }}">
                    @error('jabatan')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="gender" class="block md:text-md lg:text-lg font-bold mb-2">Jenis Kelamin</label>
                    <select name="gender" id="gender" class="w-full border-gray-700 rounded-md px-3 py-2">
                        <option value="Laki-laki" {{ old('gender', $dosen->gender) == 'Laki-laki' ? 'selected' : '' }}>
                            Laki-laki</option>
                        <option value="Perempuan" {{ old('gender', $dosen->gender) == 'Perempuan' ? 'selected' : '' }}>
                            Perempuan</option>
                    </select>
                    @error('gender')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="no_hp" class="block md:text-md lg:text-lg font-bold mb-2">Nomor HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Nomor HP" value="{{ old('no_hp', $dosen->no_hp) }}">
                    @error('no_hp')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="tgl_lahir" class="block md:text-md lg:text-lg font-bold mb-2">Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" id="tgl_lahir"
                        class="w-full border-gray-700 rounded-md px-3 py-2"
                        value="{{ old('tgl_lahir', $dosen->tgl_lahir) }}">
                    @error('tgl_lahir')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="agama" class="block md:text-md lg:text-lg font-bold mb-2">Agama</label>
                    <input type="text" name="agama" id="agama" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan Agama" value="{{ old('agama', $dosen->agama) }}">
                    @error('agama')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block md:text-md lg:text-lg font-bold mb-2">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="w-full border-gray-700 rounded-md px-3 py-2"
                        placeholder="Masukkan alamat" value="{{ old('alamat', $dosen->alamat) }}">
                    @error('alamat')
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
                <div class="mb-4">
                    <label for="image" class="block md:text-md lg:text-lg font-bold mb-2">Foto Profil</label>
                    <input type="file" name="image" id="image"
                        class="w-full border-gray-700 rounded-md px-3 py-2">
                    @error('image')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                    @if ($dosen->image)
                        <div class="mt-2">
                            <img src="{{ Storage::url($dosen->image) }}" alt="Foto Dosen" class="w-32 h-32 rounded-md">
                        </div>
                    @endif
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
