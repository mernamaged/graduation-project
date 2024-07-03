<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Edit </title>
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="icon" type="x-icon" href="{{ asset('assets/img/shirt-solid.svg') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <style>
          .card {
            margin: 0 auto; /* Center the card horizontally */
        }
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

.col-12, .col-md-6 {
    display: flex;
    justify-content: center;
    align-items: center;
}
        </style>
</head>

<body>

<div class="container">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Edit page</h2>
                        <form id="editForm" action="{{ route('products.update', $product->prod_id) }}" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <input type="text" name="p_name" placeholder="Product Name" class="form-control mb-3" value="{{ $product->p_name }}">
                            <input type="text" name="p_price" placeholder="Price" class="form-control mb-3" value="{{ $product->p_price }}">
                            <input type="text" name="product_type" placeholder="Product Type" class="form-control mb-3" value="{{ $product->product_type }}">
                            <input type="file" name="endPro_image" class="form-control mb-3">
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
