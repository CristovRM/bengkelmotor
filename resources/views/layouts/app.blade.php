<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bengkel Motor L Sitohang')</title> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
   
    <nav class="bg-gray-100 text-white py-4">
        <div class="container mx-auto px-4">
        </div>
    </nav>

   
    @yield('content')

   
    <footer class="bg-gray-200 text-white py-4">
        <div class="container mx-auto px-4">
           @include('components.footer')
        </div>
    </footer>

    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
