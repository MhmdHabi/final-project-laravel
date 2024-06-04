<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100" style="font-family: 'Poppins', sans-serif;">
    <!-- Navbar -->
    <nav class="bg-blue-500 p-4">
        <div class="container mx-auto">
            <h1 class="text-white text-2xl font-bold">Universitas</h1>
        </div>
    </nav>

    <!-- Content -->
    <div class="container mx-auto py-6">
        <div class="max-w-md mx-auto bg-white p-8 rounded-md shadow-md">
            <h2 class="text-2xl font-bold mb-6 text-center">Login Mahasiswa</h2>
            <form action="" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="nim" class="block text-gray-700 mb-1">Nim</label>
                    <input type="nim" name="nim" id="nim"
                        class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                </div>
                <div class="mb-6">
                    <label for="password" class="block text-gray-700 mb-1">Password</label>
                    <input type="password" name="password" id="password"
                        class="w-full border border-gray-300 rounded-md px-3 py-2" required>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white rounded-md px-3 py-2">Login</button>
            </form>
        </div>
    </div>
</body>

</html>
