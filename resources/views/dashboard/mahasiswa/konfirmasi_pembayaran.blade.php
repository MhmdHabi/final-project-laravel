@extends('layouts.master')

@section('judul', 'Konfirmasi Pembayaran')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold md:text-xl sm:text-lg">FORM KONFIRMASI PEMBAYARAN</h1>
        </div>

        {{-- form konfirmasi pembayaran --}}
        <div class="px-5 pb-2 mt-7">
            <form action="{{ route('mahasiswa.konfirmasi_pembayaran.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="col-span-1">
                        <label for="jenis_tagihan" class="block text-md font-semibold text-gray-700">Jenis Tagihan</label>
                        <p class="text-gray-400 text-[12px]">Jenis tagihan yang dibayar</p>
                        <input type="text" id="jenis_tagihan" name="jenis_tagihan" value="Pembayaran Semester"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none sm:text-sm"
                            readonly>
                    </div>
                    <div class="col-span-1">
                        <label for="rekening_tujuan" class="block text-md font-semibold text-gray-700">Rekening
                            Tujuan</label>
                        <p class="text-gray-400 text-[12px]">Pilih rekening tujuan yang dilakukan pembayaran</p>
                        <select id="rekening_tujuan" name="rekening_tujuan"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option selected disabled>Pilih Bank</option>
                            <option value="BNI" {{ old('rekening_tujuan') == 'BNI' ? 'selected' : '' }}>BNI</option>
                            <option value="BRI" {{ old('rekening_tujuan') == 'BRI' ? 'selected' : '' }}>BRI</option>
                            <option value="Mandiri" {{ old('rekening_tujuan') == 'Mandiri' ? 'selected' : '' }}>Mandiri
                            </option>
                        </select>
                        @error('rekening_tujuan')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="metode_transfer" class="block text-md font-semibold text-gray-700">Metode
                            Transfer</label>
                        <p class="text-gray-400 text-[12px]">Pilih metode pembayaran yang dilakukan</p>
                        <select id="metode_transfer" name="metode_transfer"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option selected disabled>Pilih Pembayaran</option>
                            <option value="ATM" {{ old('metode_transfer') == 'ATM' ? 'selected' : '' }}>ATM</option>
                            <option value="E-Banking" {{ old('metode_transfer') == 'E-Banking' ? 'selected' : '' }}>
                                E-Banking</option>
                        </select>
                        @error('metode_transfer')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="nominal" class="block text-md font-semibold text-gray-700">Nominal</label>
                        <p class="text-gray-400 text-[12px]">Input tanpa menggunakan , atau . contoh: 6535000</p>
                        <input type="number" id="nominal" name="nominal" value="{{ old('nominal') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                        @error('nominal')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="tanggal_transfer" class="block text-md font-semibold text-gray-700">Tanggal
                            Transfer</label>
                        <p class="text-gray-400 text-[12px]">Input sesuai dengan tanggal transfer pembayaran</p>
                        <input type="date" id="tanggal_transfer" name="tanggal_transfer"
                            value="{{ old('tanggal_transfer') }}"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                        @error('tanggal_transfer')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="semester" class="block text-md font-semibold text-gray-700">Semester</label>
                        <p class="text-gray-400 text-[12px]">Pilih semester sesuai yang dibayar</p>
                        <select id="semester" name="semester"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option selected disabled>Pilih Semester</option>
                            @for ($i = 1; $i <= 14; $i++)
                                <option value="{{ $i }}" {{ old('semester') == $i ? 'selected' : '' }}>
                                    {{ $i }}</option>
                            @endfor
                        </select>
                        @error('semester')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1">
                        <label for="tahun_ajaran" class="block text-md font-semibold text-gray-700">Tahun Ajaran</label>
                        <p class="text-gray-400 text-[12px]">Pilih tahun ajaran sesuai semester</p>
                        <select id="tahun_ajaran" name="tahun_ajaran"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option selected disabled>Tahun Ajaran</option>
                            <option value="Ganjil" {{ old('tahun_ajaran') == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                            <option value="Genap" {{ old('tahun_ajaran') == 'Genap' ? 'selected' : '' }}>Genap</option>
                            <!-- Tambahkan opsi tahun ajaran sesuai kebutuhan -->
                        </select>
                        @error('tahun_ajaran')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1 lg:col-span-3">
                        <label for="deskripsi" class="block text-md font-semibold text-gray-700">Keterangan</label>
                        <p class="text-gray-400 text-[12px]">Tambahkan informasi terkait nama dan nim serta tambahkan
                            keterangan jenis tagihan</p>
                        <textarea id="deskripsi" name="deskripsi" rows="3"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Sertakan Nama dan Nim Anda">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-span-1 lg:col-span-3">
                        <label for="bukti_bayar" class="block text-md font-semibold text-gray-700">Upload Bukti
                            Bayar</label>
                        <p class="text-gray-400 text-[12px]">Upload bukti pembayaran sesuai dengan struk pembayaran yang
                            valid</p>
                        <input type="file" id="bukti_bayar" name="bukti_bayar"
                            class="mt-1 block w-full text-sm p-2 text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                        @error('bukti_bayar')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mt-6 flex flex-col lg:flex-row justify-end space-y-4 lg:space-y-0 lg:space-x-4">
                    <a href="{{ route('mahasiswa.tagihan') }}"
                        class="py-2 px-4 border border-transparent text-md font-semibold text-center rounded-md text-gray-700 bg-gray-300 lg:w-auto w-full">
                        Kembali
                    </a>
                    <button type="submit"
                        class="py-2 px-4 border border-transparent text-md font-semibold rounded-md text-white bg-[#2e4765] lg:w-auto w-full">
                        Konfirmasi Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
