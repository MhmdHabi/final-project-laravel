<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD UNADEMY</title>
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

    <link rel="icon" type="image/png" href="/asset/siakad_nobg.png">
</head>

<body class="bg-gray-100" style="font-family: 'Poppins', sans-serif;">
    @include('home.navbar')

    <!-- Content -->
    <div class="container mx-auto p-3 lg:p-0 mt-10">
        <div
            class="max-w-3xl mx-auto bg-white lg:border border-[#0463CA] flex flex-col md:flex-row gap-3 mt-6 lg:mt-32">
            <div class="md:w-2/5 bg-[#0463CA] text-center">
                <div class="p-4">
                    <h1 class="mt-2 font-bold text-xl text-white font-[Oswald]">SIAKAD UNADEMY</h1>
                    <img src="{{ asset('asset/siakad_nobg.png') }}" alt="" class="mx-auto">
                    <p class="text-white text-lg mt-3 font-[Roboto]">Selamat Datang di Siakad Universitas Academy
                    </p>
                </div>
            </div>
            <div class="md:w-3/5 p-3 lg:p-0 flex flex-col justify-center items-center">
                <i class="fa-solid fa-graduation-cap text-5xl"></i>
                <h1 class="font-bold text-center text-xl mb-3 font-[Oswald]">Login Admin</h1>
                <form action="{{ route('post.login.admin') }}" method="POST">
                    @csrf
                    <div class="mb-4 relative">
                        <label for="username" class="block text-gray-700 mb-1 font-[Roboto]">Username</label>
                        <input type="text" name="username" id="username" placeholder="Masukkan Username"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 pl-10" required>
                        <i class="fas fa-user absolute left-3 top-10 transform-translate-y-1/2 text-gray-400"></i>
                    </div>
                    <div class="mb-6 relative">
                        <label for="password" class="block text-gray-700 mb-1 font-[Roboto]">Password</label>
                        <input type="password" name="password" id="password" placeholder="Masukkan Password"
                            class="w-full border border-gray-300 rounded-md px-3 py-2 pl-10" required>
                        <i class="fas fa-lock absolute left-3 top-10 transform-translate-y-1/2 text-gray-400"></i>
                        @error('password')
                            <div class="text-red-500 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full bg-[#0463CA] text-white rounded-md px-3 py-2 font-[Roboto]">Login</button>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/toggleActiveDashboard.js') }}"></script>
</body>

</html>
