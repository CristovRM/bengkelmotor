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
    <div class="container">
        <h1>Hubungi Kami</h1>
        <div class="contact-info">
            <h2>Alamat:</h2>
            <p>Alamat Perusahaan Anda</p>
            <p>Kota, Kode Pos</p>
            <p>Negara</p>
        </div>
        <div class="contact-info">
            <h2>Telepon:</h2>
            <p>+XX-XXX-XXXXXXX</p>
        </div>
        <div class="contact-info">
            <h2>Email:</h2>
            <p>info@perusahaananda.com</p>
        </div>
        <div class="contact-form">
            <!-- Formulir Kontak dapat dimasukkan di sini jika diperlukan -->
        </div>
    </div>
    <footer>
        @include('components.footer')
    </footer>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
