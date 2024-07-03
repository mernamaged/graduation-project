<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin login</title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" type="x-icon" href="{{ asset('assets/img/shirt-solid.svg') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('adminstyle/adminlogin.css') }}">
</head>

<body>
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
                    <h2>Admin Login</h2>
                </div>
                <div class="social">
                    <i class="fa-brands fa-facebook-f"></i>
                    <i class="fa-brands fa-google-plus-g"></i>
                    <i class="fa-brands fa-instagram"></i>
                </div>
                <div class="email">
                    <input type="email" class="input" id="email" name="email" placeholder=" Email" autofocus>
                </div>
                <div class="usemail"></div>
                <div class="password" style="position:relative;">
                    <input type="password" class="input"   id="password" minlength="6" maxlength="20" placeholder="Password" name="password">
                    <a id="show" style="position: absolute; right: 5px; top: 40%; transform: translateY(-50%);"><i class="fa-solid fa-eye-slash show"></i></a>
                </div>

                <div class="uspass"></div>
                <div class="forgot">
                    <a href="#"></a>
                </div>
                <div class="b">
                    <input type="submit" id="submit" value="Sign In">
                </div>
            </form>
        </div>


    </div>
    <script src="../adminstyle/adminlogin.js"></script>
    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
    <script src="{{ asset('adminstyle/adminlogin.js') }}"></script>

</html>
