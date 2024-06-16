<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    <!-- Navbar -->
    <nav class="bg-[#13947D] px-3 lg:px-10 fixed top-0 w-full z-50">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <img id="profile-picture" src="{{ asset('asset/logo_siakad.jpg') }}" alt="Profile Picture"
                    class="w-10 lg:w-14 object-cover p-0">
                <h1 class="text-white text-sm lg:text-2xl font-bold ml-2 font-[Oswald]">UNIVERSITAS ACADEMY</h1>
            </div>
            <div class="lg:hidden">
                <button id="menu-button" class="text-white text-lg focus:outline-none">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <ul id="nav-links" class="hidden lg:flex ml-auto space-x-4">
                <li>
                    <a href="{{ route('dashboard') }}"
                        class="text-white text-md hover:text-gray-200 font-semibold">Home</a>
                </li>
                <li>
                    <a href="" class="text-white text-md hover:text-gray-200 font-semibold ml-3">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="mobile-menu" class="lg:hidden hidden bg-[#13947D] px-3">
        <ul class="space-y-2 pb-3 pt-14">
            <li>
                <a href="{{ route('dashboard') }}" class="text-white text-md hover:text-gray-200 font-semibold">Home</a>
            </li>
            <li>
                <a href="" class="text-white text-md hover:text-gray-200 font-semibold">Tentang Kami</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <main class="container mx-auto px-3 lg:px-20 mt-16 lg:mt-20 flex flex-col lg:flex-row gap-8">
        <!-- Form login kanan (Mobile view: top, Desktop view: right) -->
        <div class="bg-white w-full lg:w-1/4 shadow-md rounded-md lg:order-2">
            <h2 class="lg:text-lg py-2 lg:py-3 text-white font-semibold mb-4 text-center bg-[#13947D] my-auto"><i
                    class="fa-solid fa-house-chimney text-white mr-2"></i>SIAKAD UNADEMY</h2>
            <div class="mb-4 px-6">
                <a href="{{ route('login.mahasiswa') }}" class="block"><i class="fa-solid fa-user mr-2"></i>Login
                    Mahasiswa</a>
            </div>
            <div class="mb-4 px-6">
                <a href="{{ route('login.dosen') }}" class="block"><i class="fa-solid fa-user mr-2"></i>Login Dosen</a>
            </div>
            <div class="mt-3">
                <h1 class="bg-[#13947D] text-center font-bold lg:text-lg text-white py-2 lg:py-3"><i
                        class="fa-solid fa-circle-info text-white mr-2"></i>Panduan Siakad</h1>
                <div class="py-3 px-6">
                    <p>Jika ada kendala dalam mengakses siakad, harap lapor BAAK kampus UNADEMY</p>
                    <div class="mt-3 text-center">
                        <a href="" class="text-xl font-bold text-[#13947D]"><i
                                class="fa-brands fa-whatsapp mr-3 text-[#13947D]"></i>BAAK UNADEMY</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Konten kiri -->
        <div class="bg-white w-full lg:w-3/4 shadow-md rounded-md lg:order-1">
            <h2 class="lg:text-xl bg-[#13947D] font-semibold py-2 lg:py-3 text-white mb-4 text-center">Visi Misi
                Universitas
                Academy</h2>
            <div class="mt-2 p-6">
                <h1 class="font-semibold underline">Visi Universitas Academy</h1>
                <p>Menjadikan Universitas Academy sebagai pusat pendidikan yang unggul, inovatif, dan berorientasi pada
                    pemberdayaan masyarakat.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-[#13947D] text-center py-4 text-white mt-auto">
        <p class="text-sm">© 2024 Universitas Academy Indonesia. All rights reserved.</p>
        <p class="text-sm">Contact: info@unademy.ac.id</p>
    </footer>

    <script src="{{ asset('js/toggleActiveDashboard.js') }}"></script>
</body>

</html>
