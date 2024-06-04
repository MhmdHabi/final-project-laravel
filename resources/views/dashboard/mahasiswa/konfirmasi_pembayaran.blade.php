@extends('layouts.master')

@section('judul', 'Konfirmasi Pembayaran')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md ">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold md:text-xl sm:text-lg">FORM KONFIRMASI PEMBAYARAN</h1>
        </div>

        {{-- form konfirmasi pembayaran --}}
        <div class="px-5 pb-2 mt-7">
            <form action="/konfirmasi-pembayaran" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div class="col-span-1">
                        <label for="jenis_tagihan" class="block text-sm font-medium text-gray-700">Jenis Tagihan</label>
                        <input type="text" id="jenis_tagihan" name="jenis_tagihan" value="Pembayaran Semester"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-gray-100 rounded-md shadow-sm focus:outline-none sm:text-sm"
                            readonly>
                    </div>
                    <div class="col-span-1">
                        <label for="rekening_tujuan" class="block text-sm font-medium text-gray-700">Rekening Tujuan</label>
                        <select id="rekening_tujuan" name="rekening_tujuan"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="BNI">BNI</option>
                            <option value="BRI">BRI</option>
                            <option value="Mandiri">Mandiri</option>
                        </select>
                    </div>
                    <div class="col-span-1">
                        <label for="metode_transfer" class="block text-sm font-medium text-gray-700">Metode Transfer</label>
                        <select id="metode_transfer" name="metode_transfer"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option value="ATM">ATM</option>
                            <option value="E-Banking">E-Banking</option>
                        </select>
                    </div>
                    <div class="col-span-1">
                        <label for="nominal" class="block text-sm font-medium text-gray-700">Nominal</label>
                        <input type="number" id="nominal" name="nominal"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                    </div>
                    <div class="col-span-1">
                        <label for="tanggal_transfer" class="block text-sm font-medium text-gray-700">Tanggal
                            Transfer</label>
                        <input type="date" id="tanggal_transfer" name="tanggal_transfer"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            required>
                    </div>
                    <div class="col-span-1 lg:col-span-3">
                        <label for="keterangan" class="block text-sm font-medium text-gray-700">Keterangan</label>
                        <textarea id="keterangan" name="keterangan" rows="3"
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                    </div>
                    <div class="col-span-1 lg:col-span-3">
                        <label for="bukti_bayar" class="block text-sm font-medium text-gray-700">Upload Bukti Bayar</label>
                        <input type="file" id="bukti_bayar" name="bukti_bayar"
                            class="mt-1 block w-full text-sm p-2 text-gray-500 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    </div>
                </div>
                <div class="mt-6 flex flex-col lg:flex-row justify-end space-y-4 lg:space-y-0 lg:space-x-4">
                    <a href="{{ route('mahasiswa.tagihan') }}"
                        class="py-2 px-4 border border-transparent text-sm font-medium text-center rounded-md text-gray-700 bg-gray-300 lg:w-auto w-full">
                        Kembali
                    </a>
                    <button type="submit"
                        class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-[#2e4765] lg:w-auto w-full">
                        Konfirmasi Pembayaran
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
