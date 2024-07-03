<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User create </title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" type="x-icon" href="{{ asset('assets/img/shirt-solid.svg') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Ensures the container takes at least the full height of the viewport */
        }
        .row{
            width: 100%; 
        }

        .card {
            width: 100%; /* Full width of its parent column */
            max-width: 500px; /* Optional: Max width for the card */
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card bordered">
                    <div class="card-body">
                        <h2 class="text-center">Create page</h2>
                        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="UserName" placeholder="User Name" class="form-control mb-3" required>
                            <input type="text" name="Email" placeholder="Email" class="form-control mb-3" required>
                            <input type="hidden" name="GroupID" value="1" class="form-control mb-3" required>
                            <input type="password" name="password" placeholder="Password" minlength="8" class="form-control mb-3" required>
                            <input type="text" name="user_phone" placeholder="Phone" class="form-control mb-3" required>
                            <input type="text" name="user_address" placeholder="Address" class="form-control mb-3" required>
                            <button type="submit" class="btn btn-success mt-3">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
</body>
</html>
