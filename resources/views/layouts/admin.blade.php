<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <!-- Font Awesome -->


</head>
<body>
     @yield('content')

     <footer id="footer">
      
        <div id="footer-links-container">
            <ul>
                <li><a href="#">Adicionando CSS</a></li>
                <li><a href="#">Fazendo CRUD</a></li>
                <li><a href="#">E conhecendo o Framework</a></li>
            </ul>
        </div>
        <p>&copy; 2024 Praticando Laravel</p>
    </footer>
