<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail2 design</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content=" Our web application serves as a valuable resource for local investors,
    suppliers/manufacturers, and end users/customers. Whether you are looking to start
    your own business, showcase your raw materials, or purchase high-quality local
    products, our platform is designed to meet your needs and facilitate connections
    within the local business community.

    For local investors seeking to start their own business, our platform provides
    valuable resources and information about the entire process of creating a local
    brand.

    Suppliers and manufacturers also benefit from our web application. They have the
    opportunity to showcase their raw materials on our website, gaining visibility and
    attracting potential buyers.

    Finally, our web application caters to the needs of end users or customers who are
    interested in purchasing locally made products. ">
    <meta name="keywords" content="6Ms, local investors ,Suppliers and manufacturers, customers ,clothes">
    <meta name="author" content="Michel Nasr">
    <link rel="icon" type="x-icon" href="assets/img/shirt-solid.svg">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/detail2.css">
    <style>
        .bu {
            position: relative;
            display: inline-block;
            background: #fff;
            font-size: 15px;
            padding: 10px 20px;
            margin-top: 10px;
            border-radius: 10px;
            text-decoration: none;
            color: #000;
            cursor: pointer;
        }

        .bu:hover {
            background-color: #03cad8;
            color: white;
        }
    </style>
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <img src="assets/img/logo1.png" alt="" class="navbar-brand lo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars ms-1"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="ll" href="{{ route('auth.index') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" disabled href="#raw">Raw material</a></li>
                    <li class="nav-item"><a class="nav-link" disabled href="#package">Package</a></li>
                </ul>
                <form class="d-flex" action="{{ route('detail2.index') }}" method="GET" role="search">
                    @csrf
                    <input class="form-control me-1 sea" type="search" name="search" placeholder="Search..." aria-label="Search">
                    <button class="btn btn-sidebar" type="submit" style="color: #fed136; border: #fed136; background-color: transparent;">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </form>
                <div class="ico pe-2">
                    <a id="cart-icon"><i class="fa-solid fa-cart-shopping custom-smaller-icon"></i></a>
                    <span>{{ $carts->count() }}</span>
                </div>
                <div class="ico pe-2">
                    <form action="{{route('logout')}}" method="post" role="search">
                        @method('DELETE')
                        @csrf
                        <button type="submit" title="logout" class="out"><i class="fa-solid fa-right-from-bracket custom-smaller-icon"></i></button>
                    </form>
                </div>
                <!-- cart -->
                <div class="cart">
                    <h2 class="cart-title">Your cart</h2>
                    <a id="cart-close"><i class="fa-solid fa-xmark" style="font-size: 18px;"></i></a>
                    <!-- content -->
                    <div class="cart-content">
                    </div>
                    <!-- total -->
                    @foreach ($carts as $cart)
                    <ul class="row portfolio-items">
                        <li class="portfolio-item col-md-4 col-sm-6">
                            <div class="cart-item" style="display: flex; align-items: center; justify-content: space-between;">
                                <div style="display: flex; align-items: center;">
                                    <div class="menu_image">
                                        <img src="{{asset('adminimg/'.$cart->cart_img)}}" class="cart-img" style="width: 150px; height: 150px; margin-top:10px ; margin-left:-20px">
                                    </div>
                                    <div class="menu_info" style="margin-left: 5px; margin-top:20px">
                                        <h3 class="cart-product-title">{{$cart->p_name}}</h3>
                                        <p class="cart-price">
                                            {{$cart->p_price}}
                                            {{$cart->size}}
                                        </p>
                                        <form id="editForm" action="{{ route('carts.update', $cart->cart_id) }}" method="POST" enctype="multipart/form-data" style="margin-top: 10px; text-align: center;">
                                            @method('PUT')
                                            @csrf
                                            <input type="number" name="order_quanitity" placeholder="Quantity" style=" margin-left: -80px;" class="cart-quantity" value="{{ $cart->order_quanitity }}">
                                            <button type="submit" class="btn-buy" style="font-size:15px; width:120px; margin-top: 10px;">Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                                <div>
                                    <form action="{{route('carts.destroy',$cart->cart_id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="cart-remove"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="total">
                        <div class="total-price">
                            @php
                            $totalPrice = 0;
                            @endphp
                            @foreach ($carts as $cart)
                            @php
                            $totalPrice += $cart->total_price;
                            $totalPrice += $cart->space_price;
                            @endphp
                            @endforeach
                            Total Price: {{ $totalPrice }} EGP
                        </div>
                    </div>
                    <div style="display: flex; align-items: center;">
                            <form method="POST" action="{{ route('cash.store') }}" style="margin-right: 10px;">
                                @csrf
                                @foreach ($carts as $cart)
                                    <input type="hidden"  name="design_img"  value="{{$cart->design_img}}">
                                    @endforeach
                                <button type="submit" class="btn-buy">Cash on Delivery</button>
                            </form>
                        <a href="{{ url('stripe', $totalPrice) }}" class="btn-buy">Card Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Card Section -->
    <div class="card-section" style="margin-top: 150px;" id="raw">
        <h2 class="text-center" style="margin-bottom: 30px">our <span>Material</span></h2>
        @foreach($raws as $raw)
        @if($raw->raw_id == 1 || $raw->raw_id == 5)
        <div class="card" style="margin-top: 2px;">
            <div class="content">
                <h2 class="product-title">{{$raw->material_type}}</h2>
                <p class="product-price">price: {{$raw->price_raw}} EGP per kg</p>
                <img src="{{asset('adminimg/'.$raw->raw_image)}}" class="product-img">
                <form action="{{route('detail2.store',['id' => $raw->raw_id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="p_price" value="{{$raw->price_raw}}">
                    <input type="hidden" name="total_price" value="{{$raw->price_raw}}">
                    <input type="hidden" name="p_name" value="{{$raw->material_type}}">
                    <input type="hidden" name="raw_id" value="{{$raw->raw_id}}">
                    <input type="hidden" name="product_type" value="raw">
                    <input type="hidden" name="cart_img" value="{{$raw->raw_image}}">
                    <input type="hidden" name="order_quanitity" value="1">
                    <input type="submit" class=" add-cart  bu" value="add to cart">
                </form>
            </div>
        </div>
        @endif
        @endforeach
    </div>

    <h2 class="text-center" style="margin-top: 30px; margin-bottom: 30px" id="package">Our <span>Packages</span></h2>


    @foreach($products as $product)
    @foreach($product->packages as $package)
    <div class="card" style="margin-top: 2px;"id="package">
        <div class="content">
            <h2 class="product-title">{{$product->p_name}}</h2>
            <p class="product-price">price: {{$product->p_price}} EGP</p>
            <p>{{$package->describe}}</p>

            <img src="{{ asset('adminimg/' . $product->endPro_image) }}" class="product-img">

            <div style="display: flex; align-items: center;">
                <form id="package1-form-{{$product->prod_id}}" action="{{ route('detail2.store',['id' => $product->prod_id])}}" method="POST" enctype="multipart/form-data" style="margin: 0;">
                    @csrf
                    <div style="display: flex; align-items: center;">
                        <label for="size" class="label-margin" style="color:#fff;">Size:</label>
                        <select id="size" class="cart-size" name="size">
                            <option>S</option>
                            <option>M</option>
                            <option>L</option>
                            <option>XL</option>
                        </select>
                    </div>
                    <input type="hidden" name="p_price" value="{{$product->p_price}}">
                    <input type="hidden" name="total_price" value="{{$product->p_price}}">
                    <input type="hidden" name="p_name" value="{{$product->p_name}}">
                    <input type="hidden" name="order_quanitity" value="1">
                    <input type="hidden" name="product_type" value="{{$product->product_type}}">
                    <input type="hidden" name="cart_img" value="{{$product->endPro_image}}">
                    <input type="submit" class="add-cart bu" id="add-cart-package-{{$product->prod_id}}-{{$package->id}}" value="add to cart" style="position: relative; display: inline-block; background: #fff; font-size: 15px; padding: 10px 20px; border-radius: 10px; text-decoration: none; color: #000; cursor: pointer;">

                    <a class="sp" onclick="toggleGallery('{{$product->prod_id}}-{{$package->id}}', this)" style="margin-right: 10px; cursor: pointer;">Read More</a>

            </div>
    </div>

            <div id="menu-{{$product->prod_id}}-{{$package->id}}" class="menu" style="background-color: #fff; display: none;">
                @foreach($package->rawMaterials as $rawMaterial)
                <div class="container">
                    <ul class="row portfolio-items">
                        <li class="portfolio-item col-md-4 col-sm-6">
                            <div class="card2">
                                <div class="menu_image">
                                   <img src="{{ asset('adminimg/' . $rawMaterial->raw_image) }}" class="product-img">
                                </div>
                                <div class="menu_info">
                                    <h3 class="product-title">{{$rawMaterial->material_type}}</h3>
                                    <p class="product-price">{{$rawMaterial->price_raw}}$</p>
                                </div>
                            </div>
                        </li>
                        <li class="portfolio-item col-md-4 col-sm-6">
                            <div class="card2">
                                  <div class="menu_image">
                                     <img src="assets/img/cus.jpg" alt="">
                                    </div>
                                <div class="menu_info">
                                    <h3 class="product-title">Custom clothes</h3>
                                </div>
                            </div>
                        </li>
                        <li class="portfolio-item col-md-4 col-sm-6">
                            <div class="card2">
                                    <div class="menu_image">
                                         <img src="assets/img/pop.jpg" alt="">
                                        </div>
                                <div class="menu_info">
                                    <h3 class="product-title" style="margin-top: 5px; margin-bottom: 5px;">Design</h3>
                                    <div class="design">
                                        <input type="file" id="design-file-{{$product->prod_id}}-{{$package->id}}" placeholder="Enter your design" name="design_img">
                                    </div>
                                    <label class="de">Space</label>
                                    <select name="space_price">
                                        <optgroup label="30EGP ">
                                            <option value="30">17.5:19</option>
                                        </optgroup>
                                        <optgroup label="50EGP ">
                                            <option value="50">19.5:25</option>
                                        </optgroup>
                                        <optgroup label="70EGP ">
                                            <option value="70">35:40</option>
                                        </optgroup>
                                    </select>
                                    <a class="add-design" id="add-design-btn-{{$product->prod_id}}-{{$package->id}}" onclick="addDesign('{{$product->prod_id}}-{{$package->id}}')">Add design</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                </form>
                @endforeach
            </div>
        </div>
    </div>

    @endforeach
@endforeach

<script src="assets/js/jquery.js"></script>
<script src="assets/js/all.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="assets/js/detail2.js"></script>
<script src="assets/js/test.js"></script>

<script>
    function toggleGallery(packageId, button) {
        var gallery = document.getElementById("menu-" + packageId);

        if (gallery.style.display === "none" || gallery.style.display === "") {
            gallery.style.display = "block";
            button.textContent = "Read Less";
        } else {
            gallery.style.display = "none";
            button.textContent = "Read More";
        }
    }

    function addDesign(packageId) {
        // Get the file input element
        var designFile = document.getElementById("design-file-" + packageId);

        // Check if a file has been selected
        if (designFile.files.length === 0) {
            // Show an alert message if no file is selected
            alert("Please select a design file before clicking the 'Add design' button.");
        } else {
            // Proceed with the design addition logic
            // ...
        }
    }

    // Attach event listeners to all "Add to Cart" buttons
    document.querySelectorAll('.add-cart').forEach(function(button) {
        button.addEventListener('click', function(event) {
            var packageId = this.id.split('-').slice(-2).join('-'); // Extract package id from button id
            var designFile = document.getElementById('design-file-' + packageId);

            // Check if a file has been selected
            if (designFile.files.length === 0) {
                // Prevent the form from being submitted if no file is selected
                event.preventDefault();
                alert('Please upload a design before adding the product to the cart.');
            }
        });
    });
</script>



</body>

</html>
