<?php
session_start();
if (!isset($_SESSION['fullname'])) {
    header("Location: loginform2.php");
    exit();
    // echo "<span class='fs-6 text-muted dropdown-toggle'>" . $_SESSION['fullname'] . "</span>";

}


?>

<!DOCTYPE html>
<!-- < html lang="en"> -->

<head>
    <title>library management system</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/vendor.css">
    <link rel="stylesheet" href="mystyle.css">
    <link rel="stylesheet" type="text/css" href="style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

</head>



<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <defs>
        <symbol xmlns="http://www.w3.org/2000/svg" id="link" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M12 19a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0-4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm-5 0a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3Zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16Zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1ZM7 15a1 1 0 1 0-1-1a1 1 0 0 0 1 1Zm0 4a1 1 0 1 0-1-1a1 1 0 0 0 1 1Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="arrow-right" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M17.92 11.62a1 1 0 0 0-.21-.33l-5-5a1 1 0 0 0-1.42 1.42l3.3 3.29H7a1 1 0 0 0 0 2h7.59l-3.3 3.29a1 1 0 0 0 0 1.42a1 1 0 0 0 1.42 0l5-5a1 1 0 0 0 .21-.33a1 1 0 0 0 0-.76Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="category" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M19 5.5h-6.28l-.32-1a3 3 0 0 0-2.84-2H5a3 3 0 0 0-3 3v13a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3v-10a3 3 0 0 0-3-3Zm1 13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-13a1 1 0 0 1 1-1h4.56a1 1 0 0 1 .95.68l.54 1.64a1 1 0 0 0 .95.68h7a1 1 0 0 1 1 1Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="calendar" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M19 4h-2V3a1 1 0 0 0-2 0v1H9V3a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v12a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V7a3 3 0 0 0-3-3Zm1 15a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7h16Zm0-9H4V7a1 1 0 0 1 1-1h2v1a1 1 0 0 0 2 0V6h6v1a1 1 0 0 0 2 0V6h2a1 1 0 0 1 1 1Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="heart" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M20.16 4.61A6.27 6.27 0 0 0 12 4a6.27 6.27 0 0 0-8.16 9.48l7.45 7.45a1 1 0 0 0 1.42 0l7.45-7.45a6.27 6.27 0 0 0 0-8.87Zm-1.41 7.46L12 18.81l-6.75-6.74a4.28 4.28 0 0 1 3-7.3a4.25 4.25 0 0 1 3 1.25a1 1 0 0 0 1.42 0a4.27 4.27 0 0 1 6 6.05Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="plus" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="minus" viewBox="0 0 24 24">
            <path fill="currentColor" d="M19 11H5a1 1 0 0 0 0 2h14a1 1 0 0 0 0-2Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="cart" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M8.5 19a1.5 1.5 0 1 0 1.5 1.5A1.5 1.5 0 0 0 8.5 19ZM19 16H7a1 1 0 0 1 0-2h8.491a3.013 3.013 0 0 0 2.885-2.176l1.585-5.55A1 1 0 0 0 19 5H6.74a3.007 3.007 0 0 0-2.82-2H3a1 1 0 0 0 0 2h.921a1.005 1.005 0 0 1 .962.725l.155.545v.005l1.641 5.742A3 3 0 0 0 7 18h12a1 1 0 0 0 0-2Zm-1.326-9l-1.22 4.274a1.005 1.005 0 0 1-.963.726H8.754l-.255-.892L7.326 7ZM16.5 19a1.5 1.5 0 1 0 1.5 1.5a1.5 1.5 0 0 0-1.5-1.5Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="check" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M18.71 7.21a1 1 0 0 0-1.42 0l-7.45 7.46l-3.13-3.14A1 1 0 1 0 5.29 13l3.84 3.84a1 1 0 0 0 1.42 0l8.16-8.16a1 1 0 0 0 0-1.47Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="trash" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M10 18a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1ZM20 6h-4V5a3 3 0 0 0-3-3h-2a3 3 0 0 0-3 3v1H4a1 1 0 0 0 0 2h1v11a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8h1a1 1 0 0 0 0-2ZM10 5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v1h-4Zm7 14a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1V8h10Zm-3-1a1 1 0 0 0 1-1v-6a1 1 0 0 0-2 0v6a1 1 0 0 0 1 1Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="star-outline" viewBox="0 0 15 15">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                d="M7.5 9.804L5.337 11l.413-2.533L4 6.674l2.418-.37L7.5 4l1.082 2.304l2.418.37l-1.75 1.793L9.663 11L7.5 9.804Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="star-solid" viewBox="0 0 15 15">
            <path fill="currentColor"
                d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="search" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="user" viewBox="0 0 24 24">
            <path fill="currentColor"
                d="M15.71 12.71a6 6 0 1 0-7.42 0a10 10 0 0 0-6.22 8.18a1 1 0 0 0 2 .22a8 8 0 0 1 15.9 0a1 1 0 0 0 1 .89h.11a1 1 0 0 0 .88-1.1a10 10 0 0 0-6.25-8.19ZM12 12a4 4 0 1 1 4-4a4 4 0 0 1-4 4Z" />
        </symbol>
        <symbol xmlns="http://www.w3.org/2000/svg" id="close" viewBox="0 0 15 15">
            <path fill="currentColor"
                d="M7.953 3.788a.5.5 0 0 0-.906 0L6.08 5.85l-2.154.33a.5.5 0 0 0-.283.843l1.574 1.613l-.373 2.284a.5.5 0 0 0 .736.518l1.92-1.063l1.921 1.063a.5.5 0 0 0 .736-.519l-.373-2.283l1.574-1.613a.5.5 0 0 0-.283-.844L8.921 5.85l-.968-2.062Z" />
        </symbol>
    </defs>
</svg>

<div class="preloader-wrapper">
    <div class="preloader">
    </div>
</div>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasCart" aria-labelledby="My Cart">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your cart</span>
                <span class="badge bg-primary rounded-pill">3</span>
            </h4>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Growers cider</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$12</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Fresh grapes</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$8</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-sm">
                    <div>
                        <h6 class="my-0">Heinz tomato ketchup</h6>
                        <small class="text-body-secondary">Brief description</small>
                    </div>
                    <span class="text-body-secondary">$5</span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (USD)</span>
                    <strong>$20</strong>
                </li>
            </ul>

            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
        </div>
    </div>
</div>

<div class="offcanvas offcanvas-end" data-bs-scroll="true" tabindex="-1" id="offcanvasSearch" aria-labelledby="Search">
    <div class="offcanvas-header justify-content-center">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Search</span>
            </h4>
            <form role="search" action="index.html" method="get" class="d-flex mt-3 gap-0">
                <input class="form-control rounded-start rounded-0 bg-light" type="email"
                    placeholder="What are you looking for?" aria-label="What are you looking for?">
                <button class="btn btn-dark rounded-end rounded-0" type="submit">Search</button>
            </form>
        </div>
    </div>
</div>

<header>
    <div class="container-fluid">
        <div class="row py-3 border-bottom">

            <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                <div class="main-logo">
                    <a href="index.html" style="display: flex; align-items:center">
                        <img src="images/libraryimg/lib_logo_2.png" alt="logo" class="img-fluid"
                            style="height: 5rem; width:5rem;">
                        <!-- <p style="font-size: 20pX; color:chocolate;text-decoration:none ">BDC LIBRARY</p> -->
                    </a>
                </div>
            </div>

            <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
                <div class="search-bar row bg-light p-2 my-2 rounded-4">
                    <div class="col-md-4 d-none d-md-block">
                        <select class="form-select border-0 bg-transparent">
                            <option>All Categories</option>
                            <option>Title</option>
                            <option>Author</option>
                            <option>Text</option>
                            <option>Subject</option>
                            <option>List</option>
                            <option>Advanced</option>
                        </select>
                    </div>
                    <div class="col-11 col-md-7">

                        <form id="search-form" class="text-center" action="index.html" method="post">
                            <input type="text" class="form-control border-0 bg-transparent"
                                placeholder="Search Any Books.." />
                        </form>

                    </div>
                    <div class="col-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div
                class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
                <div class="support-box text-end d-none d-xl-block">
                    <span class="fs-6 text-muted">For Support?</span>
                    <h5 class="mb-0">+919284074596</h5>
                </div>

                <ul class="d-flex justify-content-end list-unstyled m-0">

                    <!-- <a href="register.php" class="rounded-circle bg-light p-2 mx-1"> -->
                    <!-- <a href="register.php" > -->

                    <!-- <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#user"></use>
                            </svg>  -->
                    <a href="logout.php">
                        <p style=" font: size: 1.25rem; text-decoration:none;">Logout</p>
                    </a>
                    <!-- <p style=" font: size: 1.25rem; text-decoration:none;">Login</p>  -->

                    <!-- </a> -->



                    </li>
                    <!-- <li>
                <a href="#" class="rounded-circle bg-light p-2 mx-1">
                  <svg width="24" height="24" viewBox="0 0 24 24"><use xlink:href="#heart"></use></svg>
                </a>
              </li> -->
                    <li class="d-lg-none">
                        <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#cart"></use>
                            </svg>
                        </a>
                    </li>
                    <li class="d-lg-none">
                        <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#search"></use>
                            </svg>
                        </a>
                    </li>
                </ul>

                <div class="cart text-end d-none d-lg-block dropdown">

                    <button class="border-0 bg-transparent d-flex flex-column gap-2 lh-1" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">


                        <!-- session code  -->

                        <?php
                        if (isset($_SESSION['fullname'])) {
                            echo "<p>" . htmlspecialchars($_SESSION['fullname']) . "</p>";
                        } else {
                            echo "<h2>Welcome, Guest!</h2>";
                        }


                        ?>



                        <span class="cart-total fs-5 fw-bold">Your Porfile</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row py-3">
            <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
                <nav class="main-menu d-flex navbar navbar-expand-lg">

                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">

                        <div class="offcanvas-header justify-content-center">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body">

                            <select class="filter-categories border-0 mb-0 me-5">
                                <option>Departments</option>
                                <option>Physics</option>
                                <option>chenmistry</option>
                                <option>Mathematics</option>
                                <option>Zoology</option>
                                <option>bootany</option>
                                <option>commerce</option>
                                <option>art</option>
                                <option>English</option>
                                <option>marathi</option>




                            </select>

                            <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                                <li class="nav-item active">
                                    <a href="index.php" class="nav-link">HOME</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a href="#men" class="nav-link">About Library </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#kids" class="nav-link">11th</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#accessories" class="nav-link">12th</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" role="button" id="pages"
                                        data-bs-toggle="dropdown" aria-expanded="false">Chatagory</a>
                                    <ul class="dropdown-menu" aria-labelledby="pages">
                                        <li><a href="index.html" class="dropdown-item">science fiction </a></li>
                                        <li><a href="index.html" class="dropdown-item">Economics </a></li>
                                        <li><a href="index.html" class="dropdown-item">exams </a></li>
                                        <li><a href="index.html" class="dropdown-item">adventures </a></li>
                                        <li><a href="index.html" class="dropdown-item">psychological </a></li>
                                        <li><a href="index.html" class="dropdown-item">self- help </a></li>
                                        <li><a href="index.html" class="dropdown-item">Historical </a></li>
                                        <!-- <li><a href="index.html" class="dropdown-item">Styles </a></li>
                        <li><a href="index.html" class="dropdown-item">Contact </a></li>
                        <li><a href="index.html" class="dropdown-item">Thank You </a></li>
                        <li><a href="index.html" class="dropdown-item">My Account </a></li>
                        <li><a href="index.html" class="dropdown-item">404 Error </a></li>  -->
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#brand" class="nav-link">New books</a>
                                </li>
                                <!-- <li class="nav-item">
                      <a href="#sale" class="nav-link">Sale</a>
                    </li>
                    <li class="nav-item">
                      <a href="#blog" class="nav-link">Blog</a>
                    </li> -->
                            </ul>

                        </div>

                    </div>
            </div>
        </div>
    </div>
</header>

<section class="py-3"
    style="background-image: url('images/background-pattern.jpg');background-repeat: no-repeat;background-size: cover;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="banner-blocks">

                    <div class="banner-ad large bg-info block-1 img-adding">

                        <div class="swiper main-swiper">
                            <div class="swiper-wrapper">

                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories my-3">Learn More</div>
                                            <h3 class="display-4 h3color">Welcome To BDC Library</h3>
                                            <p style="color: white;">Welcome to [BDC library] - A World of Knowledge
                                                at Your Fingertips
                                                Explore a vast collection of books, e-books, and resources!.</p>
                                            <a href="#"
                                                class="btn btn-outline-light btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3 text-color-white">Book
                                                List</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <!-- <img src="images/product-thumb-1.png" class="img-fluid"> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories mb-3 pb-3">Learn More</div>
                                            <h3 class="banner-title h3color">Welcome To BDC Library</h3>
                                            <p style="color: white;">Welcome to [BDC library] - A World of Knowledge
                                                at Your Fingertips
                                                Explore a vast collection of books, e-books, and resources!.</p>
                                            <a href="#"
                                                class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Shop
                                                Collection</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <!-- <img src="images/product-thumb-1.png" class="img-fluid"> -->
                                        </div>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="row banner-content p-5">
                                        <div class="content-wrapper col-md-7">
                                            <div class="categories mb-3 pb-3">Learn More</div>
                                            <h3 class="banner-title h3color">Welcome To BDC Library</h3>
                                            <p style="color: white;">Welcome to [BDC library] - A World of Knowledge
                                                at Your Fingertips
                                                Explore a vast collection of books, e-books, and resources!.</p>
                                            <a href="#"
                                                class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">Shop
                                                Collection</a>
                                        </div>
                                        <div class="img-wrapper col-md-5">
                                            <!-- <img src="images/product-thumb-2.png" class="img-fluid"> -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-pagination"></div>

                        </div>
                    </div>

                    <div class="banner-ad bg-success-subtle block-2"
                        style="background:url('images/libraryimg/library.png') no-repeat;background-position: right bottom;background-size:contain">
                        <div class="row banner-content p-5">

                            <div class="content-wrapper col-md-7">
                                <div class="categories sale mb-3 pb-3">100%</div>
                                <h3 class="banner-title">Explore Our Collection</h3>
                                <a href="#" class="d-flex align-items-center nav-link">Books Collection <svg width="24"
                                        height="24">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg></a>
                            </div>

                        </div>
                    </div>

                    <div class="banner-ad bg-danger block-3"
                        style="background:url('images/libraryimg/lib_3.png') no-repeat;background-position: right bottom; background-size:contain">
                        <div class="row banner-content p-5">

                            <div class="content-wrapper col-md-7">
                                <div class="categories sale mb-3 pb-3">100%</div>
                                <h3 class="item-title">Unlock the World of Books</h3>
                                <a href="#" class="d-flex align-items-center nav-link">books Collection <svg width="24"
                                        height="24">
                                        <use xlink:href="#arrow-right"></use>
                                    </svg></a>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- / Banner Blocks -->

            </div>
        </div>
    </div>
</section>



<section class="py-5">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h2 class="mb-4">Newly Arrived Books</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 g-4">
          <?php

         




            require_once "register_db.php";
            $con = mysqli_connect('localhost', 'root', '', 'library_registration');
            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            $query = "SELECT book_image, Book_name, author FROM books_table";
            $result = mysqli_query($con, $query);
            if (!$result) {
                die("Invalid query: " . $con->error);
            }

            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='col'>
                  <div class='card h-100 shadow-sm border-0'>
                    <img src='images/Books/" . $row['book_image'] . "' class='card-img-top' style='height:200px; object-fit:cover;' alt='" . $row['Book_name'] . "'>
                    <div class='card-body'>
                      <h5 class='card-title'>" . $row['Book_name'] . "</h5>
                      <p class='card-text text-muted'>Author: " . $row['author'] . "</p>
                          <button type='submit' name='borrow_now' class='btn btn-primary'>Borrow Now</button>
                    </div>
                  </div>
                </div>
                ";
                    //this is borrow book code 

                
                 
                    $query = "SELECT book_image, Book_name, author, volume_no, book_code FROM books_table";
                    $result = mysqli_query($con, $query);
                    if (!$result) {
                        die("Invalid query: " . $con->error);
                    }
        
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <div class='col'>
                          <div class='card h-100 shadow-sm border-0'>
                            <img src='images/Books/" . $row['book_image'] . "' class='card-img-top' style='height:200px; object-fit:cover;' alt='" . $row['Book_name'] . "'>
                            <div class='card-body'>
                              <h5 class='card-title'>" . $row['Book_name'] . "</h5>
                              <p class='card-text text-muted'>Author: " . $row['author'] . "</p>
                              <form method='POST' action='admin_headqouter.php'>
                                <input type='hidden' name='book_image' value='" . $row['book_image'] . "'>
                                <input type='hidden' name='book_name' value='" . $row['Book_name'] . "'>
                                <input type='hidden' name='author' value='" . $row['author'] . "'>
                                <input type='hidden' name='volume' value='" . $row['volume_no'] . "'>
                                <input type='hidden' name='book_code' value='" . $row['book_code'] . "'>
                                <button type='submit' name='borrow_now' class='btn btn-primary'>Borrow Now</button>
                              </form>
                            </div>
                          </div>
                        </div>";
                    }
                  
          
      

            }
            
        // this code is above <p> class card test muted</p>    <form method='POST' action='admin_headqouter.php'>
        //    
        //   </form>
          ?>
        </div>
      </div>
    </div>
  </div>
</section>


                

<!-- <!- footer contatiner  -->

<footer>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Footer Styles */
        footer {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 40px 0;
            text-align: center;
        }

        footer .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        footer .social-icons {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        footer .social-icons li {
            display: inline-block;
            margin-right: 15px;
        }

        footer .social-icons a {
            text-decoration: none;
            color: #ecf0f1;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        footer .social-icons a:hover {
            color: #3498db;
        }

        footer .copyright {
            font-size: 14px;
        }

        footer .links {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        footer .links li {
            display: inline-block;
            margin-right: 15px;
        }

        footer .links a {
            color: #ecf0f1;
            text-decoration: none;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        footer .links a:hover {
            color: #3498db;
        }

        /* Mobile responsiveness */
        @media (max-width: 768px) {
            footer .container {
                flex-direction: column;
                text-align: center;
            }

            footer .social-icons {
                margin-top: 20px;
            }

            footer .links {
                margin-top: 20px;
            }
        }
    </style>


    <!-- Footer Content -->

    <div class="container">
        <!-- Links Section -->
        <ul class="links">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Privacy Policy</a></li>
        </ul>

        <!-- Social Media Icons -->
        <ul class="social-icons">
            <li><a href="#" target="_blank" title="Facebook"><i class="fab fa-facebook-f"></i> F</a></li>
            <li><a href="#" target="_blank" title="Twitter"><i class="fab fa-twitter"></i> T</a></li>
            <li><a href="#" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i> L</a></li>
            <li><a href="#" target="_blank" title="Instagram"><i class="fab fa-instagram"></i> I</a></li>
        </ul>
    </div>
    <!-- Copyright Section -->
    <p class="copyright">&copy; 2025 Your Company. All Rights Reserved.</p>


    <!-- Include Font Awesome for icons -->


</footer>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="js/jquery-1.11.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<script src="js/plugins.js"></script>
<script src="js/script.js"></script>
</body>

</html>