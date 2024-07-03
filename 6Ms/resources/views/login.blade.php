<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6Ms login</title>
    <link rel="icon" type="x-icon" href="assets/img/shirt-solid.svg">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/css/loginstyle.css')}}">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <img src="assets/img/logo1.png" alt="" class="navbar-brand lo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('index')}}">Team</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="login" id="login">
        <div class="container">
            <form action="{{route('login')}}" method="POST">
                @csrf
                @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
                @endif
                <div class="header">
                    <h2>Sign In</h2>
                </div>
                <div class="social">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-google-plus-g"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <div class="account">
                    <a href="{{ route('register') }}">or make your account</a>
                </div>
                <div class="email">
                    <input type="email" class="input" id="email" name="email" placeholder="Email" autofocus>
                </div>
                <div class="usemail"></div>
                <!-- Hidden input to store the email -->
                <input type="hidden" id="user-email" name="user-email">
                <div class="password" style="position: relative;">
                    <input type="password" class="input" id="password" minlength="6" maxlength="20" placeholder="Password" name="password">
                    <a id="show" style="position: absolute; right: 5px; top: 40%; transform: translateY(-50%);"><i class="fa-solid fa-eye-slash show"></i></a>
                </div>


                <div class="uspass"></div>
                <div class="b">
                    <input type="submit" id="submit" value="Sign In">
                </div>
            </form>
        </div>
        <script src="{{asset('assets/js/jquery.js')}}"></script>
        <script src="{{asset('assets/js/all.min.js')}}"></script>
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/js/login.js')}}"></script>
        <script src="{{asset('assets/js/test.js')}}"></script>
        </script>
</body>

</html>
