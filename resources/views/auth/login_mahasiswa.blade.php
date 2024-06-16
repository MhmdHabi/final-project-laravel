<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
        rel="stylesheet">
</head>

<body class="bg-gray-100" style="font-family: 'Poppins', sans-serif;">
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
                        class="text-white text-md hover:text-gray-200 font-semibold font-[Roboto]">Home</a>
                </li>
                <li>
                    <a href=""
                        class="text-white text-md hover:text-gray-200 font-semibold ml-3 font-[Roboto]">Tentang Kami</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="mobile-menu" class="lg:hidden hidden bg-[#13947D] px-3">
        <ul class="space-y-2 pb-3 pt-14">
            <li>
                <a href="{{ route('dashboard') }}"
                    class="text-white text-md hover:text-gray-200 font-semibold font-[Roboto]">Home</a>
            </li>
            <li>
                <a href="" class="text-white text-md hover:text-gray-200 font-semibold font-[Roboto]">Tentang
                    Kami</a>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="container mx-auto p-3 lg:p-0 mt-10">
        <div
            class="max-w-3xl mx-auto bg-white lg:border border-[#13947D] flex flex-col md:flex-row gap-3 mt-3 lg:mt-24">
            <div class="md:w-2/5 bg-[#13947D] text-center">
                <div class="p-4">
                    <h1 class="mt-2 font-bold text-xl text-white font-[Oswald]">SIAKAD UNADEMY</h1>
                    <img src="{{ asset('asset/logo_siakad.jpg') }}" alt="">
                    <p class="text-white text-lg mt-3 font-[Roboto]">Selamat Datang di Siakad Universitas Academy
                    </p>
                </div>
            </div>
            <div class="md:w-3/5 p-3 lg:p-0 flex flex-col justify-center items-center">
                <i class="fa-solid fa-graduation-cap text-5xl"></i>
                <h1 class="font-bold text-center text-xl mb-3 font-[Oswald]">Login Mahasiswa</h1>
                <form action="{{ route('post.login.mahasiswa') }}" method="POST">
                    @csrf
                    <div class="mb-4 relative">
                        <label for="nim" class="block text-gray-700 mb-1 font-[Roboto]">NIM</label>
                        <input type="text" name="nim" id="nim" placeholder="Masukkan NIM"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 pl-10 focus:outline-none focus:border-[#13947D] focus:border-2"
                            required>
                        <i class="fas fa-user absolute left-3 top-10 transform-translate-y-1/2 text-gray-400"></i>
                    </div>
                    <div class="mb-6 relative">
                        <label for="password" class="block text-gray-700 mb-1 font-[Roboto]">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukkan Password"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 pl-10 focus:outline-none focus:border-[#13947D] focus:border-2"
                            required>
                        <i class="fas fa-lock absolute left-3 top-10 transform-translate-y-1/2 text-gray-400"></i>
                        @error('password')
                            <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full bg-[#13947D] text-white rounded-md px-3 py-2 font-[Roboto]">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/toggleActiveDashboard.js') }}"></script>
</body>

</html>
