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
    @include('home.navbar')

    <main class="container mx-auto lg:px-3 lg:px-20 mt-1 mt-20 lg:mt-32 mb-5">
        <!-- Team Section -->
        <section class="w-full">
            <h2 class="text-2xl lg:text-4xl font-bold text-center mb-5 lg:mb-10">Tentang Kami</h2>
            <div class="flex flex-wrap justify-center">
                <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center w-full max-w-xs mx-4 my-4">
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
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center w-full max-w-xs mx-4 my-4">
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
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center w-full max-w-xs mx-4 my-4">
                    <img src="{{ asset('asset/aulia.jpg') }}" alt="Team Member 3"
                        class="w-32 object-cover h-32 rounded-full mb-4">
                    <h3 class="text-xl font-bold mb-2">Aulia Annisa Fajra</h3>
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
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center w-full max-w-xs mx-4 my-4">
                    <img src="{{ asset('asset/fahim.jpg') }}" alt="Team Member 4" class="w-32 h-32 rounded-full mb-4">
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
                <div class="bg-white rounded-lg shadow-lg p-6 flex flex-col items-center w-full max-w-xs mx-4 my-4">
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
        @include('home.footer')
    </footer>
    <script src="{{ asset('js/toggleActiveDashboard.js') }}"></script>
</body>

</html>
