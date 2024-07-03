<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6Ms registeration</title>
    <link rel="icon" type="x-icon" href="{{asset('assets/img/shirt-solid.svg') }}">
    <link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/css/register.css')}}">
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
    <div class="background" style="background-image: url(assets/img/back2.jpg);"></div>
    <section class="home" style="background-image: url(assets/img/back2.jpg);">
        <div class="content">
            <a href="#" class="logo"><i class="fa-solid fa-shirt" style="color: #Ffff;"></i> 6Ms</a>
            <h2>Welcome!</h2>
            <h3>To our website</h3>
            <pre>Lorem ipsum dolor sit, amet consectetur
                adipisicing elit. Beatae,asperiores</pre>
            <div class="icon">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-facebook-f"></i>
                <i class="fa-brands fa-twitter"></i>
                <i class="fa-brands fa-github"></i>
            </div>
        </div>
        <div class="login">
            <div class="container">
                <form action="{{route('register')}}" method="POST">
                    @csrf
                    <div class="container">
                        @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{session::get('success')}}
                        </div>
                        @endif
                        <h2 class="text-center">Sign Up</h2>
                        <div class="input">
                            <input type="text" class="input1 required" name="UserName" id="username" placeholder="username" style="color:#fff">
                            <i class="fa-solid fa-user m"></i>
                            <div class="msg usname"></div>
                        </div>
                        <div class="input">
                            <input type="email" name="email" id="email" class="input1 required" placeholder="Email">
                            <i class="fa-solid fa-envelope m"></i>
                        </div>
                        <div class="msg usemail"></div>
                        <div class="input">
                            <input type="text" name="user_address" id="address" class="input1 required" placeholder="address">
                            <i class="fa-solid fa-location-dot m"></i>
                        </div>
                        <div class="msg usaddress"></div>

                        <div class="input">
                            <input type="tel" name="user_phone" id="phone" class="input1 required" placeholder="phone">
                            <i class="fa-solid fa-phone m"></i>
                        </div>
                        <div class="input">
                            <input type="hidden" name="GroupID" value="0">
                        </div>
                        <div class="msg usphone"></div>
                        <div class="input input-container">

                            <input type="password" class="input1 required" name="password" minlength="6" maxlength="20" id="password" placeholder="Password">
                            <a id="show" style="display: none;"><i class="fa-solid fa-eye-slash show"></i></a>
                            <i class="fa-solid fa-lock m"></i>
                        </div>
                        <div class="msg uspass"></div>
                        <div class="input input-container">
                            <input type="password" class="input1 required" name="Password" minlength="6" maxlength="20" id="confirm" placeholder="confirm password">
                            <a id="showe" style="display: none;"><i class="fa-solid fa-eye-slash show"></i></a>
                            <i class="fa-solid fa-lock m"></i>
                        </div>

                        <div class="msg confirm"></div>
                        <div id="msg" style="color: #fff;"></div>
                        <div class="button">
                            <button type="submit" class="btn">Sign Up</button>
                        </div>


                        <div class="sign-up">
                            <p>Have an account?</p>
                            <a href="{{ route('login') }}">Login</a>
                        </div>

                </form>
            </div>
        </div>
    </section>
    <script src="{{asset('assets/js/jquery.js')}}"></script>
    <script src="{{asset('assets/js/all.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/register.js')}}"></script>


</body>

</html>
