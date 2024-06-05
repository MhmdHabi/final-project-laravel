<div class="sidebar bg-white text-white md:w-[245px] lg:w-64 fixed h-full hidden md:block" id="side_nav">
    <div class="header-box flex justify-between">
        <h1 class="ml-3 text-3xl font-bold mt-2 text-black">Siakad</h1>
        <button class="btn-close block md:hidden close-btn px-1 py-0 me-3 text-[#2e4765]">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    {{-- List menu sidebar start --}}
    <div class="left-menu mt-4 overflow-y-auto h-full">
        <ul class="list-unstyled px-2">
            @auth
                @if (Auth::user()->roles[0]->name == 'mahasiswa')
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.beranda') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-house mr-4 text-black"></i>Beranda
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.presensi') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-user mr-5 text-black"></i>Presensi
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.profil') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-user mr-5 text-black"></i>Profil Mahasiswa
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.krs') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-regular fa-address-card mr-4 text-black"></i>KRS
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.khs') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-address-card mr-4 text-black"></i>KHS
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.perpustakaan') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-book-open mr-4 text-black"></i>Perpustakaan
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.kontrak_matkul') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-book mr-5 text-black"></i>Kontrak Matkul
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.transkip') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-chart-pie mr-4 text-black"></i>Transkip
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.tagihan') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-money-bill-1 mr-4 text-black"></i>Tagihan
                        </a>
                    </li>
                @elseif (Auth::user()->roles[0]->name == 'dosen')
                    <li class="sidebar-item">
                        <a href="{{ route('dosen.profil') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-user mr-5 text-black"></i>Profil Dosen
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-user mr-5 text-black"></i>Presensi Dosen
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dosen.mengajar') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-money-bill-1 mr-3 text-black"></i>Jadwal Mengajar
                        </a>
                    </li>
                @elseif (Auth::user()->roles[0]->name == 'admin')
                    <li class="sidebar-item">
                        <a href="{{ route('admin.data_mahasiswa') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-user mr-4 text-black"></i>Data Mahasiswa
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.data_dosen') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-user mr-4 text-black"></i>Data Dosen
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.data_admin') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-user mr-4 text-black"></i>Data Admin
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="" class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-money-bill-1 mr-3 text-black"></i>Pembayaran
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.konfirmasi_perpustakaan') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black">
                            <i class="fa-solid fa-book-open mr-3 text-black"></i>Konfirmasi Buku
                        </a>
                    </li>
                @endif
            @endauth
            <li class="sidebar-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black hover:text-white"><i
                            class="fa-solid fa-right-from-bracket mr-4 hover:text-white"></i>Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>
