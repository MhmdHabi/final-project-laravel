<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIAKAD UNIVERSITAS</title>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css" />
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 h-screen">
    <div class="flex h-full">
        <!-- Sidebar start-->
        @include('component.sidebar')
        <!-- Sidebar end -->

        <!-- Konten Utama -->
        <div class="main flex-1 flex relative flex-col md:ml-64">
            <!-- Navbar start-->
            @include('component.navbar')
            <!-- Navbar end -->

            <!-- Konten dan Footer Wrapper -->
            <main class="flex-1 flex flex-col px-4 mt-16">
                <!-- Isi Konten -->
                <div class="md:px-4 sm:pl-0 rounded-lg mt-2 grow max-w-[100%]">
                    @yield('content')
                </div>
                <!-- Footer start-->
                @include('component.footer')
                <!-- Footer end-->
            </main>
        </div>
    </div>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    @yield('js')
    <script>
        $(document).ready(function() {
            const $openBtn = $(".open-btn");
            const $closeBtn = $(".close-btn");
            const $sideNav = $("#side_nav");
            const $sidebarItems = $(".sidebar-item");

            $openBtn.on("click", function() {
                $sideNav.removeClass("hidden");
            });

            $closeBtn.on("click", function() {
                $sideNav.addClass("hidden");
            });

            $sidebarItems.on("click", function() {
                $sidebarItems.removeClass("active");
                $(this).addClass("active");
            });

            $('.toggle-icon').click(function() {
                $('.logout').toggleClass('hidden');
            });

        });
    </script>

</body>

</html>
