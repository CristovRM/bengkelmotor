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
    <p>Silahkan Hubungi Kami melalui Contact Info Dibawah ini:</p>
    <ul>
        <li>Gmail: SIBengkelMotor@gmail.com</li>
        <li>Whatsapp: 081266002776</li> 
    </ul>
    <footer>
        @include('components.footer')
    </footer>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<style>
        /* CSS untuk bagian konten */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }