<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portofolio - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="portofolio_style.css">
</head>

<body id="home">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="https://github.com/Bandfal">Muhammad Naufal Akif Magal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" href="{{ route('home') }}">Home</a>
                    <a class="nav-link active" href="{{ route('about') }}">About</a>
                    <a class="nav-link active" href="{{ route('project') }}">Projects</a>
                    <a class="nav-link active" href="{{ route('contact') }}">Contact</a>
                </div>
            </div>
        </div>
    </nav>
    <!--End of navbar-->

    @yield('content')

    <!--Footer-->
    <footer class="bg-primary text-white text-center p-3">
        <p>Made with ❤ by <a href="https://github.com/Bandfal" class="text-white fw-bold">Muhammad Naufal Akif Magal</a></p>
    </footer>
    <!--End of footer-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>