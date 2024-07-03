<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit </title>
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
    min-height: 100vh; /* Full height of the viewport */
}

.row {
    width: 100%;
    display: flex;
    justify-content: center;
}

.col-12 {
    display: flex;
    justify-content: center;
    align-items: center;
}

.card {
    width: 100%; /* Full width of its parent column */
    max-width: 500px; /* Optional: Max width for the card */
}

        </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row">
        <div class="col-12 col-md-6">
            <div class="card bordered">
                <div class="card-body">
                    <h2 class="text-center">Edit page</h2>
                    <form id="editForm" action="{{ route('users.update', $user->UserID) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <input type="text" name="UserName" placeholder="user Name" class="form-control mb-3" value="{{ $user->UserName }}">
                        <input type="text" name="Email" placeholder="email" class="form-control mb-3" value="{{ $user->Email }}">
                        <input type="text" name="password" class="form-control mb-3" value="{{ $user->password }}">
                        <input type="text" name="GroupID" class="form-control mb-3" value="{{ $user->GroupID }}">
                        <input type="text" name="user_phone" class="form-control mb-3" value="{{ $user->user_phone }}">
                        <input type="text" name="user_address" class="form-control mb-3" value="{{ $user->user_address }}">
                        <button type="submit" class="btn btn-success mt-3">Save Changes</button>
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
