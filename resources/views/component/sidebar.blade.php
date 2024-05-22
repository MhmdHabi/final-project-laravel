<div class="sidebar bg-white text-white md:w-[245px] lg:w-64 fixed h-full hidden md:block" id="side_nav">
    <div class="header-box flex justify-between">
        <h1 class="ml-3 text-3xl font-bold mt-2 text-black">Siakad</h1>
        <button class="btn-close block md:hidden close-btn px-1 py-0 me-3 text-[#2e4765]"><i
                class="fa-solid fa-xmark"></i></button>
    </div>

    {{-- List menu side bar start --}}
    <div class="left-menu mt-4 overflow-y-auto h-full">
        <ul class="list-unstyled px-2">
            <li class="sidebar-item">
                <a href="{{ route('mahasiswa.beranda') }}"
                    class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black"><i
                        class="fa-solid fa-house mr-4 text-black"></i>Beranda</a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('mahasiswa.profil') }}"
                    class="active text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black"><i
                        class="fa-solid fa-user mr-5 text-black"></i>Profil Mahasiswa</a>
            </li>
            <li class="sidebar-item">
                <a href=" {{ route('mahasiswa.krs') }}"
                    class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black"><i
                        class="fa-regular fa-address-card mr-4 text-black"></i>KRS</a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('mahasiswa.khs') }}"
                    class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black"><i
                        class="fa-solid fa-address-card mr-4 text-black"></i>KHS</a>
            </li>
            <li class="sidebar-item">
                <a href="#"
                    class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black dropdown-toggle"><i
                        class="fa-solid fa-book-open mr-4 text-black"></i>Perpustakaan <i
                        class="fa-solid fa-angle-down ml-2 ml-5"></i></a>
                <ul class="dropdown-content pl-8 mt-2 space-y-2">
                    <li><a href="" class="text-decoration-none text-black"><i
                                class="fa-solid fa-book mr-3"></i>Data Buku</a></li>
                    <li><a href="" class="text-decoration-none text-black"><i
                                class="fa-solid fa-book mr-3"></i>Peminjaman Buku</a></li>
                    <li><a href="" class="text-decoration-none text-black"><i
                                class="fa-solid fa-book mr-3"></i>Pengembalian Buku</a></li>
                </ul>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('mahasiswa.kontrak_matkul') }}"
                    class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black"><i
                        class="fa-solid fa-book mr-5 text-black"></i>Kontrak Matkul</a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('mahasiswa.perpustakaan') }}"
                    class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black"><i
                        class="fa-solid fa-book mr-5 text-black"></i>List Matkul</a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('mahasiswa.perpustakaan') }}"
                    class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black"><i
                        class="fa-solid fa-money-bill-1 mr-4 text-black"></i>Tagihan</a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('mahasiswa.perpustakaan') }}"
                    class="text-decoration-none px-3 py-2 block md:text-lg lg:text-xl text-black"><i
                        class="fa-solid fa-right-from-bracket mr-4 text-black"></i>Logout</a>
            </li>
        </ul>
    </div>
    {{-- List menu side bar end --}}
</div>
