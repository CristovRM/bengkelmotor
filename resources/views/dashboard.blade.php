<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
        }

        div {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 50px auto;
        }

        h1 {
            color: #333;
        }

        p {
            margin-bottom: 20px;
        }

        a {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div>
    <h1>Dashboard</h1>
    <p>Selamat datang di dashboard Bengkel Motor!</p>
    <a href="{{ route('list_barang') }}">Halaman List Barang</a>
</div>

</body>
</html>
