@extends('layouts.master')

@section('judul', 'Profil Mahasiswa')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 rounded py-5 md:w-full lg:w-full mx-auto">
        <h1 class="text-2xl text-center lg:text-left text-3xl font-bold mb-3">Biodata Mahasiswa</h1>
        <div class="mb-3">
            {{-- Notifikasi Success --}}
            @if (session('success'))
                <div id="successMessage"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
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
                <div id="successMessage" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative "
                    role="alert">
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
        <div class="lg:flex md:block w-full">
            @if ($mahasiswa->image)
                <img id="profile-picture" src="{{ asset(str_replace('public/', 'storage/', $mahasiswa->image)) }}"
                    alt="Profile Picture" class="w-52 object-cover h-56 m-3 mx-auto md:mx-0">
            @else
                <img id="profile-picture" src="{{ asset('asset/default_profile.png') }}" alt="Profile Picture"
                    class="w-52 object-cover h-56 m-3 mx-auto md:mx-0">
            @endif

            <div class="lg:ml-5 w-full mt-3 mr-3">
                <form action="{{ route('mahasiswa.update', ['id' => $mahasiswa->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="list flex py-3 border-b ">
                        <label for="name" class="w-36">Nama</label>
                        <input type="text" name="name" id="name" value="{{ $mahasiswa->name }}"
                            class="bg-gray-100 focus:outline-none w-full">
                    </div>
                    <div class="list flex py-3 border-b ">
                        <label for="nim" class="w-36">NIM</label>
                        <input type="text" name="nim" id="nim" value="{{ $mahasiswa->nim }}"
                            class="bg-gray-100 focus:outline-none w-full" readonly>
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="email" class="w-36">Email</label>
                        <input type="email" name="email" id="email" value="{{ $mahasiswa->email }}"
                            class="bg-gray-100 focus:outline-none w-full">
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="gender" class="w-36">Jenis Kelamin</label>
                        <input type="text" name="gender" id="gender" value="{{ $mahasiswa->gender }}"
                            class="bg-gray-100 focus:outline-none w-full" readonly>
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="no_hp" class="w-36">Nomor HP</label>
                        <input type="text" name="no_hp" id="no_hp" value="{{ $mahasiswa->no_hp }}"
                            class="bg-gray-100 focus:outline-none w-full">
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="tgl_lahir" class="w-36">Tanggal Lahir</label>
                        <input type="date" name="tgl_lahir" id="tgl_lahir" value="{{ $mahasiswa->tgl_lahir }}"
                            class="bg-gray-100 focus:outline-none w-full" readonly>
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="agama" class="w-36">Agama</label>
                        <input type="text" name="agama" id="agama" value="{{ $mahasiswa->agama }}"
                            class="bg-gray-100 focus:outline-none w-full" readonly>
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="jurusan" class="w-36">Jurusan</label>
                        <input type="text" name="jurusan" id="jurusan" value="{{ $mahasiswa->jurusan }}"
                            class="bg-gray-100 focus:outline-none w-full" readonly>
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="alamat" class="w-36">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="{{ $mahasiswa->alamat }}"
                            class="bg-gray-100 focus:outline-none w-full">
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="status_kuliah" class="w-36">Status Kuliah</label>
                        <input type="text" name="status_kuliah" id="status_kuliah"
                            value="{{ $mahasiswa->status_kuliah }}" class="bg-gray-100 focus:outline-none w-full"
                            readonly>
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="image" class="w-36">Image</label>
                        <input type="file" name="image" id="image" class="bg-gray-100 w-full">
                    </div>
                    <div class="mb-4 flex items-center py-3">
                        <label for="password" class="block w-48">Change Password</label>
                        <div class="relative w-full">
                            <input type="password" name="password" id="password"
                                class="w-full border-gray-700 rounded-md py-2 px-2 focus:outline-none"
                                placeholder="Masukkan Password">
                            <span id="togglePassword"
                                class="absolute inset-y-0 right-0 flex items-center pr-3 cursor-pointer">
                                <i id="iconEye" class="fas fa-eye-slash"></i>
                            </span>
                        </div>
                        @error('password')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-center lg:justify-end mt-2">
                        <button type="submit"
                            class="bg-amber-500 hover:bg-amber-700 text-white font-bold py-2 px-6 rounded">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Dosen Pembimbing --}}
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 rounded py-5 md:w-full lg:w-full mx-auto mt-10">
        <h1 class="text-2xl text-center lg:text-left lg:text-3xl font-bold mb-3">Dosen Pembimbing Akademik</h1>
        <div class="lg:flex md:block w-full">
            @if ($dosen_pa->dosen->image)
                <img id="profile-picture" src="{{ asset(str_replace('public/', 'storage/', $dosen_pa->dosen->image)) }}"
                    alt="Profile Picture" class="w-52 object-cover h-56 m-3 mx-auto md:mx-0">
            @else
                <img id="profile-picture" src="{{ asset('asset/default_profile.png') }}" alt="Profile Picture"
                    class="w-52 object-cover h-56 m-3 mx-auto md:mx-0">
            @endif

            <div class="lg:ml-5 w-full mt-3 mr-3">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="list flex py-3 border-b">
                        <label for="name" class="w-36">Nama</label>
                        <input type="text" name="name" id="name"
                            class="bg-gray-100 focus:outline-none w-full" readonly
                            value="{{ $dosen_pa->dosen->name ?? '' }}">
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="nidn" class="w-36">NIDN</label>
                        <input type="text" name="nidn" id="nidn"
                            class="bg-gray-100 focus:outline-none w-full" readonly
                            value="{{ $dosen_pa->dosen->nidn ?? '' }}" readonly>
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="email" class="w-36">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-100 focus:outline-none w-full" readonly
                            value="{{ $dosen_pa->dosen->email ?? '' }}">
                    </div>
                    <div class="list flex py-3 border-b">
                        <label for="no_hp" class="w-36">Nomor HP</label>
                        <input type="text" name="no_hp" id="no_hp" readonly
                            value="{{ $dosen_pa->dosen->no_hp }}" class="bg-gray-100 focus:outline-none w-full">
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Jquery Start --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/togglePasswordAdd.js') }}"></script>
    <script src="{{ asset('js/sessionTime.js') }}"></script>
@endsection
