@extends('layouts.master')
@section('judul', 'Data Mahasiswa')
@section('content')
    <div class="card-body shadow-[0px_5px_60px_-15px_rgba(0,0,0,0.4)] px-3 py-5 rounded-md">
        <div class="flex mb-3 justify-center">
            <h1 class="font-bold text-xl">DATA SEMUA MAHASISWA UNIVERSITAS</h1>
        </div>
        <div class="px-5 mb-3">
            {{-- Notifikasi Sukses --}}
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
                <div id="successMessage" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
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
        <div class="flex px-5 justify-between items-center mb-5">
            <div class="flex gap-3">
                <a href="{{ route('admin.data_mahasiswa.add') }}">
                    <button class="px-4 py-2 bg-[#13947D] text-white rounded-md mb-2">Tambah</button>
                </a>
                <a href="{{ route('export.mahasiswa') }}"><button
                        class="px-4 py-2 bg-amber-500 text-white rounded-md w-full mb-2"><i
                            class="fa-solid fa-print mr-2 text-white"></i>Export</button></a>
            </div>
            <div class="relative">
                <select id="dropdownMenu" name="status_kuliah" class="px-4 py-2 bg-green-500 text-white rounded-md">
                    <option selected disabled>status</option>
                    <option value="aktif">aktif</option>
                    <option value="non-aktif">non-aktif</option>
                </select>
            </div>
        </div>
        {{-- Tabel Data Mahasiswa --}}
        <div class="px-5 pb-2">
            <div class="overflow-x-auto w-full">
                <table class="min-w-full divide-y divide-gray-200" id="datatable">
                    <thead class="bg-[#13947D]">
                        <tr>
                            <th class="px-3 py-3 border border-gray-300 text-left text-md text-white">No</th>
                            <th class="px-3 py-3 border border-gray-300 text-left text-md text-white">NIM</th>
                            <th class="px-3 py-3 border border-gray-300 text-left text-md text-white">Email</th>
                            <th class="px-3 py-3 border border-gray-300 text-left text-md text-white">Nama</th>
                            <th class="px-3 py-3 border border-gray-300 text-left text-md text-white">Nomor HP</th>
                            <th class="px-3 py-3 border border-gray-300 text-left text-md text-white">Jurusan</th>
                            <th class="px-3 py-3 border border-gray-300 text-left text-md text-white">Status</th>
                            <th class="px-3 py-3 border border-gray-300 text-left text-md text-white text-center w-28">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($mahasiswa as $user)
                            <tr>
                                <td class="px-2 py-4 border border-gray-300">{{ $loop->iteration }}</td>
                                <td class="px-2 py-4 border border-gray-300">{{ $user->nim }}</td>
                                <td class="px-2 py-4 border border-gray-300">{{ $user->email }}</td>
                                <td class="px-2 py-4 border border-gray-300">{{ $user->name }}</td>
                                <td class="px-2 py-4 border border-gray-300">{{ $user->no_hp }}</td>
                                <td class="px-2 py-4 border border-gray-300">{{ $user->jurusan }}</td>
                                <td class="px-2 py-4 border border-gray-300">{{ $user->status_kuliah }}</td>
                                <td class="px-2 py-4 border border-gray-300">
                                    <a href="{{ route('admin.data_mahasiswa.edit', ['id' => $user->id]) }}"><button
                                            class="px-4 py-2 bg-blue-500 text-white rounded-md w-full mb-2">Edit</button></a>
                                    <a href="{{ route('admin.data_mahasiswa.detail', ['id' => $user->id]) }}"><button
                                            class="px-4 py-2 bg-amber-500 text-white rounded-md w-full mb-2">Detail</button></a>
                                    <form action="{{ route('admin.data_mahasiswa.delete', ['id' => $user->id]) }}"
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
@section('js')
    <script src="{{ asset('js/sessionTime.js') }}"></script>

    <script>
        $(document).ready(function() {
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.mahasiswa.get_datatable') }}",
                    type: 'GET'
                },
                lengthMenu: [5, 10, 25, 50, 100],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'nim',
                        name: 'nim',
                        orderable: true,
                        searchable: true,
                        className: 'orderable-column'
                    },
                    {
                        data: 'email',
                        name: 'email',
                        orderable: true,
                        searchable: true,
                        className: 'orderable-column'
                    },
                    {
                        data: 'name',
                        name: 'name',
                        orderable: true,
                        searchable: true,
                        className: 'orderable-column'
                    },
                    {
                        data: 'no_hp',
                        name: 'no_hp',
                        orderable: true,
                        searchable: true,
                        className: 'orderable-column'
                    },
                    {
                        data: 'jurusan',
                        name: 'jurusan',
                        orderable: true,
                        searchable: true,
                        className: 'orderable-column'
                    },
                    {
                        data: 'status_kuliah',
                        name: 'status_kuliah',
                        orderable: true,
                        searchable: true,
                        className: 'orderable-column'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ],
                order: [
                    [1, 'asc']
                ],
                createdRow: function(row, data, dataIndex) {
                    $(row).addClass('border border-gray-300');
                    $('td', row).addClass('border border-gray-300');
                }
            });

            // Implement search functionality for each column
            $('#datatable thead tr:eq(1) th').each(function(i) {
                $('input', this).on('keyup change', function() {
                    if (table.column(i).search() !== this.value) {
                        table.column(i).search(this.value).draw();
                    }
                });
            });

            $('#dropdownMenu').change(function() {
                table.ajax.url("{{ route('admin.mahasiswa.get_datatable') }}" + '?status_kuliah=' + $(this)
                    .val()).load();
            });
        });
    </script>


@endsection

@endsection
