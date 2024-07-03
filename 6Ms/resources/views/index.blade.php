<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>6Ms</title>
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
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body id="page-top ">
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
                    <li class="nav-item"><a class="nav-link" disabled href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" disabled href="#portfolio">Gallery</a></li>
                    <li class="nav-item"><a class="nav-link" disabled href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" disabled href="#team">Team</a></li>
                </ul>
                <div class="ico pe-2">
                    <a href="{{ route('login') }}" title="login"><i class="fa-solid fa-right-to-bracket"></i></a>
                </div>
                <div class="ico pe-3 n">
                     <a href="{{ route('register') }}" title="registration"><i class="fa-solid fa-user"></i></a>
                </div>

            </div>
        </div>
    </nav>
    <!-- Header -->
    <header class="masthead">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in">Welcome To Our Studio!</div>
                <div class="intro-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
            </div>
        </div>
    </header>

    <!-- Services -->
    <section class="page-section" id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center " style="margin-bottom:100px ;">
                    <h2 class="section-heading text-uppercase">Services</h2>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa-solid fa-shirt" style="color: #fed136"></i>
                    </span>
                    <h4 class="service-heading">Textiling and Designing clothes</h4>
                    <p class="text-muted">We provide steps to make local clothes to help who want to start manufacturing.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa-solid fa-industry" style="color: #fed136"></i>
                    </span>
                    <h4 class="service-heading">Factory products</h4>
                    <p class="text-muted">We enable factories to display their products required for clothes manufacturing.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">
                        <i class="fa-solid fa-cart-plus" style="color: #fed136"></i>
                    </span>
                    <h4 class="service-heading">Showing final product</h4>
                    <p class="text-muted">We allow factories and other manufacturers to display their products.</p>
                </div>
                <div class="col-md-3">
                    <span class="fa-stack fa-4x">

                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse" style="color: #fed136"></i>
                    </span>
                    <h4 class="service-heading">Selling the final product</h4>
                    <p class="text-muted">We provide local readymade clothes.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- gallery-->
    <section class="bg-light page-section" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center info">
                    <h2 class="section-heading text-uppercase" style="margin-bottom: 100px;"><span>Our</span>gallery</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item" data-aos="fade-right">
                    <a class="portfolio-link" data-toggle="modal" href="#">
                        <img class="img-fluid" src="assets/img/5r9n5f3o.png" alt="">
                    </a>
                    <div class="portfolio-caption">

                    </div>
                </div>
                <div class="col-md-4 col-sm-6 portfolio-item" data-aos="zoom-in">
                    <a class="portfolio-link" data-toggle="modal" href="#">

                        <img class="img-fluid" src="assets/img/g42diyin.png" alt="">
                    </a>

                </div>
                <div class="col-md-4 col-sm-6 portfolio-item" data-aos="zoom-in">
                    <a class="portfolio-link" data-toggle="modal" href="#">
                        <img class="img-fluid" src="assets/img/l3aypflj.png" alt="">
                    </a>

                </div>
                <div class="col-md-4 col-sm-6 portfolio-item" data-aos="fade-right">
                    <a class="portfolio-link" data-toggle="modal" href="#">
                        <img class="img-fluid" src="assets/img/o39bw8it.png" alt="">
                    </a>

                </div>
                <div class="col-md-4 col-sm-6 portfolio-item" data-aos="zoom-in">
                    <a class="portfolio-link" data-toggle="modal" href="#">
                        <img class="img-fluid" src="assets/img/portfolio/01-thumbnail.jpg" alt="">
                    </a>

                </div>
                <div class="col-md-4 col-sm-6 portfolio-item" data-aos="zoom-in">
                    <a class="portfolio-link" data-toggle="modal" href="#">
                        <img class="img-fluid" src="assets/img/9.avif" alt="">
                    </a>

                </div>
            </div>
        </div>
    </section>
    <!-- About -->
    <section class="page-section" id="about">
        <div class="about">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-12 image">
                        <img src="assets/img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-6 col-sm-12 info">
                        <h2 class="text-uppercase ab"><span>About</span>Us</h2>
                        <h3>Why Choose us?</h3>
                        <p>
                        Our web application serves as a valuable resource for local investors, suppliers/manufacturers, and end users/customers. Whether you are looking to start your own business,
                        showcase your raw materials, or purchase high quality local products, our platform is designed to meet your needs and facilitate connections within the local business community.
                        </p>
                        <a href="login.blade.php" class="about-btn">order now</a>
                    </div>

                </div>

            </div>
        </div>

    </section>
    <!-- Team -->

    <section id="team">
        <div class="team ">
            <h2 class="section-heading text-uppercase text-center">Our Amazing Team</h2>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-aos="fade-right">
                        <div class="team_box">
                            <div class="profile">
                                <img src="assets/img/michel.jpg" alt="">
                                <div class="info">
                                    <h3 class="name">Michel Nasr</h3>
                                    <p class="bio">512191605</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-aos="zoom-in">
                        <div class="team_box">
                            <div class="profile">
                            <img src="assets/img/waelc.jpg" alt="">
                                <div class="info">
                                    <h3 class="name">Mohamed Wael</h3>
                                    <p class="bio">512191461</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="team_box">
                            <div class="profile">
                            <img src="assets/img/mina.jpg" alt="">
                                <div class="info">
                                    <h3 class="name">Mina Emad</h3>
                                    <p class="bio">512191609</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-aos="fade-right">
                        <div class="team_box">
                            <div class="profile">
                            <img src="assets/img/maria.jpg" alt="">
                                <div class="info">
                                    <h3 class="name">Maria Nasr</h3>
                                    <p class="bio">512191361</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12" data-aos="zoom-in">
                        <div class="team_box">
                            <div class="profile">
                            <img src="assets/img/merna.jpg" alt="">
                                <div class="info">
                                    <h3 class="name">Merna Maged</h3>
                                    <p class="bio">512191601</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                        <div class="team_box">
                            <div class="profile">
                            <img src="assets/img/marina.jpg" alt="">
                                <div class="info">
                                    <h3 class="name">Marina Nabil</h3>
                                    <p class="bio">512191376</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer>
        <div class="container-fluid footer-content">
            <div class="row">
                <div class="col-sm-12 col-md-4 text-center">
                    <h5><a class="navbar-brand"  href="#"> <img src="assets/img/logo1.png" alt="" class="lf"></a>
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
                    <h5 class="k" style="font-weight: bold;">Quick Link</h5>
                    <p class="k">Home</p>
                    <p class="k">About AS</p>
                    <p class="k">Team</p>
                    <p class="k">Special Orders</p>
                </div>
                <div class="col-sm-12 col-md-4 text-center">
                    <h5 class="k" style="font-weight: bold;">Contact</h5>
                    <a href="tel:+02 12 737 14 393" class="k m mb-3">+02 12 737 14 393</a>
                    <a href="tel:+02 12 892 44 552" class="k m mb-3">+02 12 892 44 552</a>
                    <a href="mailto:mernamaged1990@gmail.com" class="k m">mernamaged1990@gmail.com</a>
                </div>
                <p class="end text-center" style="margin-top: 10px;">Design by<span style="color: #fed136"><i class="fa-solid fa-face-smile-wink"></i> Michel Nasr</span></p>



            </div>
        </div>
    </footer>
    <!-- scrollup -->

    <div class="scroll-top">

        <div class="scrollup">
            <i class="fa fa-angle-double-up"></i>
        </div>

    </div>
    <!-- loader-->
    <div class="loader-container">
        <img src="assets/img/loading.gif" alt="">
    </div>



    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/all.min.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="{{ asset('assets/js/main.js') }}"></script>


    <script>
        AOS.init();
    </script>

</body>

</html>
