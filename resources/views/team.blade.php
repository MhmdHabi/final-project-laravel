<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD UNADEMY</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="/asset/siakad_nobg.png">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Small Navbar -->
    <nav class="bg-[#0080FF] hidden lg:block px-3 py-1 lg:px-10 fixed top-0 w-full z-50">
        <div class="flex justify-between items-center">
            <p class="text-white text-sm lg:text-md font-semibold">Info Kontak Kampus: info@unademy.ac.id | 123-456-7890
            </p>
            <p class="text-white text-sm lg:text-md font-semibold">Jam Buka: Senin-Jumat, 08:00-16:00 WIB</p>
        </div>
    </nav>
    <!-- Main Navbar -->
    <nav class="bg-[#0463CA] px-3 lg:px-10 fixed lg:top-7 w-full z-50 navbar">
        <div class="flex justify-between items-center relative">
            <div class="flex items-center">
                <img id="profile-picture" src="{{ asset('asset/siakad.png') }}" alt="Profile Picture"
                    class="w-40 lg:w-64 object-cover p-0">
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
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="lg:hidden hidden bg-[#0463CA] px-3">
        <ul class="space-y-2 pb-3 pt-14">
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

    <!-- Content -->
    <main class="container mx-auto px-3 lg:px-20 mt-1 mt-12 lg:mt-32 mb-5">
        <!-- Team Section -->
        <section class="w-full">
            <h2 class="text-2xl lg:text-4xl font-bold text-center mb-10">Tentang Kami</h2>
            <div class="grid px-4 lg:px-24 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center w-full max-w-xs mx-auto">
                    <img src="{{ asset('asset/fathin.jpg') }}" alt="Team Member 1"
                        class="w-32 h-32 object-cover rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2">Fathin Fayyadh</h3>
                    <p class="text-gray-600 mb-4">Project Manager</p>
                    <div class="flex space-x-3">
                        <a href="https://www.instagram.com/fathin_fayyadh09" class="text-gray-600 hover:text-[#E1306C]">
                            <i class="fab fa-instagram text-[#E1306C] fa-lg fa-lg"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/fathinfayyadh" class="text-gray-600 hover:text-[#0077B5]">
                            <i class="fab fa-linkedin text-[#0077B5] fa-lg"></i>
                        </a>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center w-full max-w-xs mx-auto">
                    <img src="{{ asset('asset/habi.jpg') }}" alt="Team Member 2"
                        class="w-32 h-32 object-cover rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2">Muhammad Habi</h3>
                    <p class="text-gray-600 mb-4">Frontend Developer</p>
                    <div class="flex space-x-3">
                        <a href="https://www.instagram.com/mhmdhabi_" class="text-gray-600 hover:text-[#E1306C]">
                            <i class="fab fa-instagram text-[#E1306C] fa-lg"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/muhammadhabi" class="text-gray-600 hover:text-[#0077B5]">
                            <i class="fab fa-linkedin text-[#0077B5] fa-lg"></i>
                        </a>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center w-full max-w-xs mx-auto">
                    <img src="{{ asset('asset/aulia.jpg') }}" alt="Team Member 3"
                        class="w-32 object-cover h-32 rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2">Aulia Anisa Fajra</h3>
                    <p class="text-gray-600 mb-4">Backend Developer</p>
                    <div class="flex space-x-3">
                        <a href="https://www.instagram.com/auliannisafjra" class="text-gray-600 hover:text-[#E1306C]">
                            <i class="fab fa-instagram text-[#E1306C] fa-lg"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/auliannisafjra "
                            class="text-gray-600 hover:text-[#0077B5]">
                            <i class="fab fa-linkedin text-[#0077B5] fa-lg"></i>
                        </a>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center w-full max-w-xs mx-auto ">
                    <img src="{{ asset('asset/fahim.jpg') }}" alt="Team Member 4"
                        class="w-32 h-32 rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2">Muhammad Fahim Arba</h3>
                    <p class="text-gray-600 mb-4">DevOps</p>
                    <div class="flex space-x-3">
                        <a href="https://www.instagram.com/arbafahim" class="text-gray-600 hover:text-[#E1306C]">
                            <i class="fab fa-instagram text-[#E1306C] fa-lg"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-[#0077B5]">
                            <i class="fab fa-linkedin text-[#0077B5] fa-lg"></i>
                        </a>
                    </div>
                </div>
                <!-- Card 5 -->
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center w-full max-w-xs mx-auto">
                    <img src="{{ asset('asset/pina.jpg') }}" alt="Team Member 5"
                        class="w-32 object-cover h-32 rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2">Pina Nindiani</h3>
                    <p class="text-gray-600 mb-4">UI/UX Designer</p>
                    <div class="flex space-x-3">
                        <a href="https://www.instagram.com/pina_nindiani" class="text-gray-600">
                            <i class="fab fa-instagram text-[#E1306C] fa-lg"></i>
                        </a>
                        <a href="#" class="text-gray-600 hover:text-[#0077B5]">
                            <i class="fab fa-linkedin text-[#0077B5] fa-lg"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-[#0463CA] text-white py-8 px-10">
        <div class="container mx-auto flex flex-col lg:flex-row lg:justify-center gap-x-20">
            <!-- Left Section -->
            <div class="block text-center lg:text-left mb-3 lg:flex lg:mb-0">
                <img src="{{ asset('asset/siakad_nobg.png') }}" alt="Universitas Academy Logo"
                    class="w-32 mb-2 lg:mr-6 mx-auto">
                <div>
                    <h4 class="text-lg font-bold">UNIVERSITAS ACADEMY</h4>
                    <p class="text-sm">Tentang Kampus Lainnya</p>
                    <div class="ml-3">
                        <p class="text-sm mt-2">Address : Jl. BudiUtomo No.21 Indonesia</p>
                        <p class="text-sm mt-2">Phone : 012123838112</p>
                        <p class="text-sm mt-2">Email : info@unademy.ac.id</p>
                    </div>
                </div>
            </div>
            <!-- Center Section -->
            <div class="text-center lg:text-left mb-4 lg:mb-0">
                <h4 class="text-lg font-bold">Program Studi</h4>
                <ul class="text-sm mt-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">Teknik Informatika</a></li>
                </ul>
            </div>
            <!-- Right Section -->
            <div class="text-center lg:text-left">
                <h4 class="text-lg font-bold">Sistem Informasi</h4>
                <ul class="text-sm mt-2">
                    <li><a href="#" class="text-gray-300 hover:text-white">Portal Mahasiswa</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Portal Dosen</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">SIAKAD</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Perpustakaan</a></li>
                    <li><a href="#" class="text-gray-300 hover:text-white">Tagihan</a></li>
                </ul>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/toggleActiveDashboard.js') }}"></script>
</body>

</html>
