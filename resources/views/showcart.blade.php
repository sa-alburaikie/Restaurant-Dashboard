<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public" <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--
    
TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ url('/') }}" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                            <!-- 
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li>
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>
                            <li class="scroll-to-section">
                                @auth
                                    <a href="{{ url('show-cart', Auth::user()->id) }}">
                                        Cart[{{ $count }}]
                                    </a>
                                @endauth

                                @guest
                                    Cart[0]
                                @endguest
                                </a>
                            </li>
                            <li class="scroll-to-section">
                                @if (Route::has('login'))
                                        @auth
                                            <li><x-app-layout>
                                                </x-app-layout>
                                            </li>
                                        @else
                                        <li><a href="{{ route('login') }}">Log
                                                in</a></li>

                                        @if (Route::has('register'))
                                            <li> <a href="{{ route('register') }}">Register</a></li>
                                        @endif
                                    @endauth
                                @endif
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="cart-table" id="top">
        <table>
            <thead>
                <tr>
                    <th>Food Image</th>
                    <th>Food Name</th>
                    <th>Food Price</th>
                    <th>Quantity</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <form action="{{ url('order-confirm') }}" method="POST">
                    @csrf
                    @foreach ($items as $item)

                        <tr>
                            <td>
                                <input type="text" name="image[]" value="{{ $item->image }}" id="" hidden>
                                <img src="/foodimage/{{ $item->image }}" height="100" width="100"
                                    style="border-radius: 50px;margin:0 auto;" alt="">
                            </td>
                            <td>
                                <input type="text" name="food_name[]" value="{{ $item->title }}" id="" hidden>
                                {{ $item->title }}
                            </td>
                            <td>
                                <input type="text" name="price[]" value="{{ $item->price }}" id="" hidden>
                                {{ $item->price }}
                            </td>
                            <td>
                                <input type="text" name="quantity[]" value="{{ $item->quantity }}" id="" hidden>
                                {{ $item->quantity }}
                            </td>
                            <td><a href="{{ url('/remove-from-cart', $item->cart_id) }}" class="btn btn-danger">Remove</a>
                            </td>
                        </tr>
                    @endforeach
            </tbody>
        </table>

        <div class="order">
            <button class="btn btn-primary" type="button" id="order">Order Now</button>
        </div>

        <div class="order-info" id="appear">
            <div class="center-box">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="" placeholder="Enter Your Name">
            </div>
            <br>
            <div class="center-box">
                <label for="phone">Phone</label>
                <input type="number" name="phone" class="form-control" id="" placeholder="Enter Your Phone">
            </div>
            <br>
            <div class="center-box">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="" placeholder="Enter Your address">
            </div>
            <br>
            <div class="center-box btns">
                <input class="btn btn-success form-control" type="submit" value="Order Confirm">
            </div>
            <div class="center-box btns">
                <button id="close" type="button" class="btn btn-danger form-control">Close</button>
            </div>
        </div>
        </form>
    </div>

    <script>
        $("#order").click(
            function () {
                $("#appear").show();
            }
        );
        $("#close").click(
            function () {
                $("#appear").hide();
            }
        );
    </script>
    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>

        $(function () {
            var selectedClass = "";
            $("p").click(function () {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function () {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });

    </script>
</body>

</html>