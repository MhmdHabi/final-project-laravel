<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto">
            <h1 class="text-white text-2xl font-bold">Universitas</h1>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mx-auto mt-8">
        <div class="flex justify-center">
            <div class="w-full md:w-2/3 lg:w-1/3 bg-white p-6 shadow-md rounded-md">
                <h2 class="text-lg font-semibold mb-4 text-center">Silakan Login</h2>
                <div class="mb-4">
                    <a href="{{ route('login.mahasiswa') }}"
                        class="block text-center bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Login
                        Mahasiswa</a>
                </div>
                <div class="mb-4">
                    <a href="{{ route('login.dosen') }}"
                        class="block text-center bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Login
                        Dosen</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
