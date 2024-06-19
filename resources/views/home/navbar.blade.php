<!-- Small Navbar -->
<nav class="bg-[#0080FF] hidden lg:block px-3 py-1 lg:px-10 fixed top-0 w-full z-50">
    <div class="flex justify-between items-center">
        <p class="text-white text-sm lg:text-md font-semibold">Info Kontak Kampus: info@unademy.ac.id | 123-456-7890
        </p>
        <p class="text-white text-sm lg:text-md font-semibold">Jam Buka: Senin-Jumat, 08:00-16:00 WIB</p>
    </div>
</nav>
<!-- Main Navbar -->
<nav class="bg-[#0463CA] px-3 lg:px-10 fixed top-0 lg:top-7 w-full z-50 navbar">
    <div class="flex justify-between items-center relative">
        <div class="flex items-center">
            <img id="profile-picture" src="{{ asset('asset/siakad.png') }}" alt="Profile Picture"
                class="w-56 lg:w-64 object-cover p-0">
        </div>
        <div class="hidden lg:flex lg:justify-center lg:items-center">
            <a href="{{ route('dashboard') }}"
                class="text-white text-md nav-link hover:text-gray-200 font-semibold">Home</a>
            <a href="{{ route('dashboard.team') }}"
                class="text-white text-md nav-link hover:text-gray-200 font-semibold ml-3">Tentang Kami</a>
        </div>
        <div class="hidden lg:flex items-center space-x-4">
            <a href="{{ route('login.mahasiswa') }}" class="text-white text-md font-semibold"><button
                    class="bg-[#0080FF] p-2 rounded-lg hover:bg-[#0463CA] hover:rounded-lg hover:border">Login
                    Mahasiswa</button></a>
            <a href="{{ route('login.dosen') }}" class="text-white text-md font-semibold"><button
                    class="p-2 rounded-lg border hover:bg-[#0080FF] hover:rounded-lg">Login Dosen</button></a>
        </div>
        <div class="lg:hidden">
            <button id="menu-button" class="text-white text-lg focus:outline-none">
                <i class="fas fa-bars fa-xl"></i>
            </button>
        </div>
    </div>
</nav>

<!-- Mobile Menu -->
<div id="mobile-menu" class="lg:hidden hidden bg-[#0463CA] px-3">
    <ul class="space-y-2 pb-3 pt-16">
        <li>
            <a href="{{ route('dashboard') }}" class="text-white text-md font-semibold">Home</a>
        </li>
        <li>
            <a href="{{ route('dashboard.team') }}" class="text-white text-md font-semibold">Tentang Kami</a>
        </li>
        <li>
            <a href="{{ route('login.mahasiswa') }}" class="text-white text-md font-semibold"><button
                    class="bg-[#0080FF] p-2 rounded-lg hover:bg-[#0463CA] hover:rounded-lg hover:border">Login
                    Mahasiswa</button></a>
        </li>
        <li>
            <a href="{{ route('login.dosen') }}" class="text-white text-md font-semibold"><button
                    class="p-2 rounded-lg border hover:bg-[#0080FF] hover:rounded-lg">Login Dosen</button></a>
        </li>
    </ul>
</div>
