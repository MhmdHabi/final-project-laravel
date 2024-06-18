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
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .slider-container {
            position: relative;
            overflow: hidden;
            width: 100%;
            margin: 0 auto;
            height: 600px;
        }

        .slider-img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .slider-img.active {
            opacity: 1;
        }

        .slider-buttons {
            position: absolute;
            top: 40%;
            transform: translateY(-50%);
            display: flex;
            justify-content: space-between;
            gap: 10px;
            z-index: 10;
            width: 100%;
        }

        .slider-button {
            background: rgba(255, 255, 255, 0.5);
            border: none;
            color: black;
            font-size: 24px;
            padding: 10px 15px;
            cursor: pointer;
            transition: background 0.3s ease;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .slider-button:hover {
            background: rgba(255, 255, 255, 0.8);
        }

        @media (max-width: 768px) {

            .slider-container {
                height: 180px;
            }

            .slider-buttons {
                position: static;
                margin-top: 25%;
                display: flex;
                justify-content: space-between;
            }

            .slider-button {
                font-size: 20px;
                padding: 8px 12px;

            }
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

    <!-- Image Slider -->
    <div class="slider-container mt-10 lg:mt-24">
        <div class="slider-img active">
            <img src="/asset/slider1.jpg" alt="Slider 1" class="w-full h-auto lg:h-full">
        </div>
        <div class="slider-img slide-in-right">
            <img src="/asset/slider2.jpg" alt="Slider 2" class="w-full h-auto lg:h-full">
        </div>
        <div class="slider-img slide-in-right">
            <img src="/asset/slider3.png" alt="Slider 3" class="w-full h-auto lg:h-full">
        </div>
        <div class="slider-buttons">
            <button class="slider-button" onclick="prevSlide()">&#10094;</button>
            <button class="slider-button" onclick="nextSlide()">&#10095;</button>
        </div>
    </div>

    <!-- Content -->
    <main class="container mx-auto px-3 lg:px-20 mt-5 lg:mt-20 flex flex-col lg:flex-row gap-8 mb-5">
        <!-- Konten kiri -->
        <div class="w-full lg:order-1">
            <div class="mb-3 bg-gray-100 w-full lg:w-full lg:order-1 border border-gray-300">
                <h2 class="lg:text-xl bg-[#0463CA] font-semibold py-2 lg:py-3 text-white mb-4 text-center">Visi Misi
                    Universitas Academy</h2>
                <div class="mt-2 p-6">
                    <h1 class="font-semibold underline">Visi Universitas Academy</h1>
                    <p>Menjadikan Universitas Academy sebagai pusat pendidikan yang unggul, inovatif, dan berorientasi
                        pada pemberdayaan masyarakat.</p>
                    <h1 class="font-semibold underline mt-4">Misi Universitas Academy</h1>
                    <ul class="list-disc pl-6 mt-2">
                        <li>Menyediakan pendidikan berkualitas tinggi yang berfokus pada pengembangan keterampilan
                            praktis dan pengetahuan teoritis.</li>
                        <li>Mengembangkan penelitian inovatif yang memberikan solusi nyata bagi tantangan masyarakat.
                        </li>
                        <li>Mendorong kolaborasi dengan industri dan komunitas untuk memperkuat pemberdayaan masyarakat.
                        </li>
                        <li>Memfasilitasi lingkungan akademik yang inklusif dan mendukung keberagaman.</li>
                        <li>Mengintegrasikan teknologi dalam proses belajar-mengajar untuk meningkatkan efektivitas
                            pendidikan.</li>
                    </ul>
                </div>
            </div>
            <!-- Bagian Berita dengan latar belakang warna dan garis batas -->
            <div class="bg-gray-100 w-full lg:w-full shadow-md lg:order-1 mt-10 border-t-2 border-gray-300">
                <div class="p-6">
                    <h1 class="font-semibold underline">Berita Terbaru</h1>
                    <ul class="list-disc pl-6">
                        <li class="mt-4">
                            <a href="#" class="font-semibold">Pendaftaran Semester Baru
                                Dibuka</a>
                            <p class="text-gray-700 text-sm">Pendaftaran untuk semester baru telah dibuka. Mahasiswa
                                dapat melakukan pendaftaran melalui SIAKAD.</p>
                        </li>
                        <li class="mt-4">
                            <a href="#" class="font-semibold">Seminar Nasional 2024</a>
                            <p class="text-gray-700 text-sm">Universitas Academy akan mengadakan seminar nasional pada
                                bulan Juli 2024. Daftarkan diri Anda segera.</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
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
    <script>
        let slideIndex = 0;
        const slides = document.querySelectorAll('.slider-img');

        function showSlide(index) {
            if (index < 0) {
                slideIndex = slides.length - 1;
            } else if (index >= slides.length) {
                slideIndex = 0;
            }

            slides.forEach((slide) => {
                slide.classList.remove('active');
            });

            slides[slideIndex].classList.add('active');
        }

        function nextSlide() {
            slideIndex++;
            showSlide(slideIndex);
        }

        function prevSlide() {
            slideIndex--;
            showSlide(slideIndex);
        }

        // Auto slide
        setInterval(() => {
            slideIndex++;
            showSlide(slideIndex);
        }, 5000); // Ganti gambar setiap 5 detik (5000 milidetik)
    </script>


</body>

</html>
