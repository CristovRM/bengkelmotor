<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Sistem Informasi Bengkel Motor')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    <header>
        @include('components.header')
    </header>
        @include('components.slider')
    <div class="container">
        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        @include('components.footer')
    </footer>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>