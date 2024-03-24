<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'My App')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    <header>
        @include('components.header')
    </header>

    <h1>List Produk</h1>
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