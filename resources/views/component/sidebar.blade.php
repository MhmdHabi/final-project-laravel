<div class="sidebar bg-[#13947D] text-white md:w-[245px] lg:w-64 fixed h-full hidden md:block" id="side_nav">
    <div class="header-box flex justify-between border-b-2">
        <div class="flex">
            <img id="profile-picture" src="{{ asset('asset/logo_siakad.jpg') }}" alt="Profile Picture"
                class="w-16 lg:w-20 object-cover p-0">
            <h3 class="my-auto text-md lg:text-lg font-bold">Universitas <span class="block">Academy</span></h3>
        </div>
        <button class="btn-close block md:hidden close-btn px-1 py-0 me-3 text-white">
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
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-house mr-4 text-white"></i>Beranda
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.presensi') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-user mr-5 text-white"></i>Presensi
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.profil') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-user mr-5 text-white"></i>Profil Mahasiswa
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.krs') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-address-card mr-4 text-white"></i>KRS
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.khs') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-address-card mr-4 text-white"></i>KHS
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.perpustakaan') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-book-open mr-4 text-white"></i>Perpustakaan
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.kontrak_matkul') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-book mr-5 text-white"></i>Kontrak Matkul
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.transkip') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-chart-pie mr-4 text-white"></i>Transkip
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('mahasiswa.tagihan') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-money-bill-1 mr-4 text-white"></i>Tagihan
                        </a>
                    </li>
                @elseif (Auth::user()->roles[0]->name == 'dosen')
                    <li class="sidebar-item">
                        <a href="{{ route('dosen.mengajar') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-money-bill-1 mr-3 text-white"></i>Jadwal Mengajar
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dosen.profil') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-user mr-5 text-white"></i>Profil Dosen
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dosen.presensi') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-user mr-5 text-white"></i>Presensi
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dosen.input.nilai') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-list-ol mr-5 text-white"></i>Input Nilai
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('dosen.konfirmasi_krs') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-user-check mr-3 text-white"></i>Konfirmasi KRS
                        </a>
                    </li>
                @elseif (Auth::user()->roles[0]->name == 'admin')
                    <li class="sidebar-item">
                        <a href="{{ route('admin.data_mahasiswa') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-user mr-4 text-white"></i>Data Mahasiswa
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.data_dosen') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-user mr-4 text-white"></i>Data Dosen
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.data_admin') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-user mr-4 text-white"></i>Data Admin
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.data_dospem') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-user mr-4 text-white"></i>Data Dospem
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.data_buku') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-book-open mr-3 text-white"></i>Data Buku
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.konfirmasi_pembayaran') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-money-bill-1 mr-3 text-white"></i>Pembayaran
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.konfirmasi_perpustakaan') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-book-open mr-3 text-white"></i>Konfirmasi Buku
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="{{ route('admin.pembukaan_matkul') }}"
                            class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white">
                            <i class="fa-solid fa-book-open-reader mr-3 text-white"></i>Aktifasi KRS
                        </a>
                    </li>
                @endif
            @endauth
            <li class="sidebar-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                        class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-white hover:text-black">
                        <i class="fa-solid fa-right-from-bracket mr-4 hover:text-white"></i>Logout</button>
                </form>
            </li>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var currentUrl = window.location.href;
        var sidebarItems = document.querySelectorAll('.sidebar-item a');

        sidebarItems.forEach(function(link) {
            if (currentUrl.includes(link.href)) {
                link.classList.add('active');
            }
        });
    });
</script>
