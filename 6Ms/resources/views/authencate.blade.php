<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6Ms Authencated</title>
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
    <link rel="icon" type="x-icon" href="{{asset('assets/img/shirt-solid.svg') }}">
    <link href="{{asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('assets/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{asset('assets/css/authencate.css')}}">
</head>

<body id="page-top">
    <div class="card-body">
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
                        <li class="nav-item"><a class="nav-link" disabled href="#Factory product">Factory product</a></li>
                        <li class="nav-item"><a class="nav-link" disabled href="#counter">Statistics</a></li>
                        <li class="nav-item"><a class="nav-link" disabled href="#Supplier product">Supplier product</a></li>
                        <li class="nav-item"><a class="nav-link" disabled href="#contact">Contact Us</a></li>
                    </ul>
                    <form class="d-flex" action="{{ route('auth.index') }}" method="GET" role="search">
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
                            <li class="portfolio-item col-md-4 col-sm-6 hoodie">
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
                                @endphp
                                @endforeach
                                Total Price: {{ $totalPrice }} EGP 
                            </div>
                        </div>
                        <div style="display: flex; align-items: center;">
                            <form method="POST" action="{{ route('cash.store') }}" style="margin-right: 10px;">
                                @csrf
                                @foreach($endProducts as $endProduct)
                                <input type="hidden" name="endPro_id" value="{{$endProduct->endPro_id}}">
                                @endforeach
                                @foreach ($products as $product)
                                <input type="hidden" name="prod_id" value="{{$product->prod_id}}">
                                @endforeach
                                <button type="submit" class="btn-buy">Cash on Delivery</button>
                            </form>
                            <a href="{{url('stripe',$totalPrice)}}" class="btn-buy">Card Payment</a>
                        </div>
                        <!-- CART CLOSE  -->
                    </div>
                </div>
            </div>
        </nav>

        <!-- carousel -->
        <div id="carouselExampleCaptions" class="carousel slide carsoul-fade" data-bs-ride="carousel" data-bs-interval="2000" style=" margin-bottom: 90px;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/R.jpeg" class="d-block w-100 kl" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h5>First slide label</h5>
                        <p>Some representative placeholder content for the first slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/b.jpg" class="d-block w-100 kl" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h5>second slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/p.jpeg" class="d-block w-100 kl" alt="...">
                    <div class="carousel-caption d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- CRUD => [CREATE , READ , UPDATE , DELETE ] -->
    @if(Session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session()->get('success') }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    </div>
    @if (Session::has('error'))
                <div class="alert alert-danger" role="alert">
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
                    {{Session::get('error')}}
                </div>
                @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--#portfolio-filter-->
    <!--#portfolio-filter-->
    <div class="menu" id="menu">
        <h2 class="text-center" style="margin-bottom: 70px;">By<span>Our Factories</span></h2>
        <section id="Factory product" class="container">
            <ul class="row portfolio-items">
                @foreach($endpros as $endpro)
                <li class="portfolio-item col-md-4 col-sm-6 hoodie">
                    <div class="card">
                        <div class="menu_image">
                            <img src="{{asset('adminimg/'.$endpro->endPro_image)}}" style="width: 100%; height: 100%; object-fit: cover; object-position: center; transition: 0.3s;">
                        </div>
                        <div class="menu_info">
                            <h3 class="product-title">{{$endpro->p_name}}</h3>
                            <p class="product-price">{{$endpro->p_price}}</p>
                            <form action="{{route('carts.store',['id' => $endpro->prod_id])}}" method="POST" style="display: flex; flex-direction: column; align-items: center;">
                                @csrf
                                <input type="hidden" name="order_prod_id" value="{{$endpro->prod_id}}">
                                <input type="hidden" name="p_price" value="{{$endpro->p_price}}">
                                <input type="hidden" name="p_name" value="{{$endpro->p_name}}">
                                <input type="hidden" name="cart_img" value="{{$endpro->endPro_image}}">
                                <input type="hidden" name="product_type" value="{{$endpro->product_type}}">
                                <div style="display: flex; align-items: center;">
                                    <label for="size">Size</label>
                                    <select id="size" class="cart-size" name="size">
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                </div>
                                <input type="hidden" name="order_quanitity" value="1">
                                <input type="submit" class="menu-btn add-cart" value="Add to Cart" style="width: 50%;">
                            </form>
                        </div>
                    </div>
                </li>
                @endforeach
            </ul>
        </section>
    </div>

    <!--#portfolio-filter-->
    <div class="section-counter paralax-mf bg-image" id="counter" style="background-image: url(assets/img/counterback.jpeg)">
        <div class="overlay-mf"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-lg-3">
                    <div class="counter-box counter-box pt-4 pt-md-0">
                        <div class="counter-ico">
                            <span class="ico-circle"><i class="fa-solid fa-truck"></i></span>
                        </div>
                        <div class="counter-num">
                            <p class="counter">{{$orders->count()}}</p>
                            <span class="counter-text">WORKS COMPLETED</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="counter-box pt-4 pt-md-0">
                        <div class="counter-ico">
                            <span class="ico-circle"><i class="fa-regular fa-calendar"></i></span>
                        </div>
                        <div class="counter-num">
                            <p class="counter">{{$products->count()}}</p>
                            <span class="counter-text">OUR PRODUCTS</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="counter-box pt-4 pt-md-0">
                        <div class="counter-ico">
                            <span class="ico-circle"><i class="fa-solid fa-users"></i></span>
                        </div>
                        <div class="counter-num">
                            <p class="counter">{{$users0->count()}}</p>
                            <span class="counter-text">TOTAL CLIENTS</span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3">
                    <div class="counter-box pt-4 pt-md-0">
                        <div class="counter-ico">
                            <span class="ico-circle"><i class="fa-solid fa-face-smile"></i></span>
                        </div>
                        <div class="counter-num">
                            <p class="counter">{{$contracts->count()}}</p>
                            <span class="counter-text">OUR SUPPLIERS DEALS</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- our Gallary -->
<div class="gallary" id="Supplier product">
    <h2 class="text-center" style="margin-top: 20px;"><span>Local brands</span></h2>
    <div class="container">
        <div class="row">
            @foreach($lonleys as $lonely)
            <div class="col-md-4 col-sm-6">
                <div class="gallary_image_box" style="position: relative;">
                    <div class="gallary_image">
                        <img src="{{ asset('adminimg/'.$lonely->endPro_image) }}" class="product-img">
                        <h3 class="product-title">{{ $lonely->p_name }}</h3>
                        <p class="product-price">price: {{ $lonely->p_price }}</p>
                        <form action="{{route('carts.store',['id' => $lonely->prod_id])}}" method="POST">
                            @csrf
                            <div class="menu-btn add-cart">
                                <input type="hidden" name="order_prod_id" value="{{ $lonely->prod_id }}">
                                <input type="hidden" name="p_price" value="{{ $lonely->p_price }}">
                                <input type="hidden" name="p_name" value="{{ $lonely->p_name }}">
                                <input type="hidden" name="cart_img" value="{{ $lonely->endPro_image }}">
                                <input type="hidden" name="product_type" value="{{ $lonely->product_type }}">
                                <input type="hidden" name="order_quanitity" value="1">

                                <div style="position: absolute; bottom: 10px; left: 55%; display: flex; align-items: center;">
                                    <label for="size" class="custom-style">Size</label>
                                    <select id="size" class="cart-sizes" name="size">
                                        <option>S</option>
                                        <option>M</option>
                                        <option>L</option>
                                        <option>XL</option>
                                    </select>
                                </div>

                                <input type="submit" class="gallary_btn add-cart" value="Add to Cart">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>



    <!--/#portfolio-filter-->
    <!--/#portfolio-filter-->
    <div class="menu" id="menu">
     <h2 class="text-center" style="margin-bottom: 70px;"><span>How to get like this</span></h2>
          <section id="Factory product" class="container">
            <ul class="row portfolio-items">
              <li class="portfolio-item col-md-4 col-sm-6">
                <div class="card">
                  <div class="menu_image">
                    <img src="assets/img/F.jpeg" class="product-img">
                  </div>
                  <div class="menu_info">
                    <h3 class="product-title">Hoddie</h3>
                  </div>
                  <a href="{{ route('detail2.index') }}" class="detail">design details</a>
                </div>
            </li>
            <!--/.portfolio-item-->
            <li class="portfolio-item  col-md-4 col-sm-6">
                <div class="card">
                  <div class="menu_image">
                    <img src="assets/img/Op.jpeg" class="product-img">
                  </div>
                  <div class="menu_info">
                    <h3 class="product-title">T-shirt</h3>
                  </div>
                  <a href="{{ route('detail2.index') }}" class="detail">design details</a>
                </div>
            </li>
            <!--/.portfolio-item-->
            <li class="portfolio-item col-md-4 col-sm-6">
                <div class="card">
                    <div class="menu_image">
                      <img src="assets/img/black.jpg" class="product-img">
                    </div>
                    <div class="menu_info">
                      <h3 class="product-title">hoodie</h3>
                    </div>
                    <a href="{{ route('detail2.index') }}" class="detail">design details</a>
                </div>
            </li>
            <!--/.portfolio-item-->
            <!--/.portfolio-item-->
        </ul>
    </section>
</div>



    <!-- contact us -->
    <section class="page-section" id="contact" style="background-image: url(img/map-image.png);">
        <div class="container">
            <div class="text-center" style="margin-top:40px">
                <h2 class="section-heading text-uppercase" style="margin-bottom: 100px;"><span>Contact</span> Us</h2>
            </div>
            <form id="contactForm" method="post" action="{{route('contact.store')}}">
                @csrf
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control lp" name="contactName" id="name" type="text" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <!-- Email address input-->
                            <input class="form-control lp" id="email" name="email" type="email" placeholder="Your Email">
                        </div>
                        <div class="form-group mb-md-0">
                            <!-- Phone number input-->
                            <input class="form-control lp" id="phone" name="phone" type="tel" pattern="[0-9]+" placeholder="Your Phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group form-group-textarea mb-md-0">
                            <!-- Message input-->
                            <textarea class="form-control lp" id="message" name="message" placeholder="Your Message" style="resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="msg" style="display: block ; color:red ; margin-top: 10px;"></div>
                </div>
                <!-- Submit Button-->
                <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit">Send Message</button></div>
            </form>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <div class="container-fluid footer-content">
            <div class="row">
                <div class="col-sm-12 col-md-4 text-center">
                    <h5><a class="navbar-brand" style="color: #fed136;" href="#"> <img src="assets/img/logo1.png" alt="" class="lf"></a>
                    </h5>
                    <p class="k">Fast Delivery</p>
                    <p class="k">Easy Payments</p>
                    <p class="k">24 x 7 Service</p>
                </div>
                <div class="col-sm-6 col-md-2 text-center">
                    <h5 class="k" style="font-weight: bold;">Location</h5>
                    <p class="k">Cairo</p>
                    <p class="k">Giza</p>
                    <p class="k">Alex</p>
                    <p class="k">Other cities</p>
                </div>
                <div class="col-sm-6 col-md-2 text-center">
                    <h5 class="k" style="font-weight: bold;">Contact</h5>
                    <a href="tel:+02 12 737 14 393" class="k m mb-3">+02 12 737 14 393</a>
                    <a href="tel:+02 12 892 44 552" class="k m mb-3">+02 12 892 44 552</a>
                    <a href="mailto:mernamaged1990@gmail.com" class="k m">mernamaged1990@gmail.com</a>

                </div>
                <div class="col-sm-12 col-md-4 text-center">
                    <h5 class="k si" style="font-weight: bold;">Clothing sizes according to weight and height</h5>
                    <p class="k">Small : (45:55) and (150:164)</p>
                    <p class="k">Medium: (56:70) and (164:173)</p>
                    <p class="k">Large : (71:85) and (174:179)</p>
                    <p class="k">X-large: (86+) and (180+)</p>
                </div>
                <p class="end text-center" style="margin-top: 3px;">Design by<span style="color: #fed136 ;"><i class="fa-solid fa-face-smile-wink"></i> Michel Nasr</span></p>



            </div>
        </div>
    </footer>
    <!-- scrollup -->

    <div class="scroll-top">

        <div class="scrollup">
            <i class="fa fa-angle-double-up"></i>
        </div>

    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/authencate.js"></script>
    <script src="assets/js/test.js"></script>



    <script>
        AOS.init();
    </script>


</body>

</html>
