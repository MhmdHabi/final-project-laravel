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

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/dashboard.css" />

</head>

<body class="bg-gray-100 flex flex-col min-h-screen">
    @include('home.navbar')

    <!-- Image Slider -->
    <div class="slider-container mt-[60px] lg:mt-24">
        @include('home.slider')
    </div>

    <!-- Content -->
    <main class="container mx-auto px-3 lg:px-20 mt-5 lg:mt-20 flex flex-col lg:flex-row gap-8 mb-5">
        @include('home.visi_misi')
    </main>


    <!-- Footer -->
    <footer class="bg-[#0463CA] text-white py-8 px-10">
        @include('home.footer')
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

        setInterval(() => {
            slideIndex++;
            showSlide(slideIndex);
        }, 5000);
    </script>
</body>

</html>
