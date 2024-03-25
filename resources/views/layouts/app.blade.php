<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <!-- Include any necessary CSS or CDN links here -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navigation Bar -->
    <nav class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4">
            <!-- Your navigation bar content goes here -->
        </div>
    </nav>

    <!-- Main Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4">
            <!-- Your footer content goes here -->
        </div>
    </footer>

    <!-- Include any necessary JavaScript or CDN links here -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>