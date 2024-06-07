@extends('layouts.master')

@section('judul', 'Data Admin')

@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">DATA SEMUA ADMIN</h1>
        </div>

        <div class="px-5 mb-3">
            {{-- Notifikasi Success --}}
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
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
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative " role="alert">
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

        <div class="flex px-5">
            <a href="{{ route('admin.data_admin.add') }}"><button
                    class="px-4 py-2 bg-gray-500 text-white rounded-md w-full mb-2">Tambah</button></a>
        </div>

        {{-- Tabel Data Dosen --}}
        <div class="px-5 pb-2">
            <div class="overflow-x-auto w-full">
                <table class="min-w-full divide-y divide-gray-200" id="datatable">
                    <thead class="bg-gray-300">
                        <tr>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black">No</th>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black">Username</th>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black">Nama</th>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black">Email</th>
                            <th class="px-2 py-3 border border-gray-400 text-left text-md text-black text-center w-1/3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($admins as $admin)
                            <tr>
                                <td class="px-2 py-4 border border-gray-400">{{ $loop->iteration }}</td>
                                <td class="px-2 py-4 border border-gray-400">{{ $admin->username }}</td>
                                <td class="px-2 py-4 border border-gray-400">{{ $admin->name }}</td>
                                <td class="px-2 py-4 border border-gray-400">{{ $admin->email }}</td>
                                <td class="px-2 py-4 border border-gray-400">
                                    <a href="{{ route('admin.data_admin.edit', ['id' => $admin->id]) }}"><button
                                            class="px-4 py-2 bg-blue-500 text-white rounded-md w-full mb-2">Edit</button></a>
                                    <form action="{{ route('admin.data_admin.delete', ['id' => $admin->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="submit"
                                            class="px-4 py-2 bg-red-500 text-white rounded-md w-full">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
