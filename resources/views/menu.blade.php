<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>{{ env('APP_NAME') }} |
        @yield('title')
    </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="/favicon.ico"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/slider/slick-theme.min.css">
    <link rel="stylesheet" href="/slider/slick.min.css">
    <link rel="stylesheet" href="/css3/owel_jquery.css">
    <link rel="stylesheet" href="/css3/responsive.css">
    <link rel="stylesheet" href="/css3/style.css">
    <script src="/slider/jquery.min.js"></script>

    <style>
        body { background: #fafafa; font-family: 'Roboto Condensed'; }
    </style>
</head>

<body>
<!-- banner bg main start -->
<div class="banner_bg_main">
    <!-- header top section start -->
    <div class="container">
        <div class="header_section_top">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom_menu">
                        <ul>
                            <li><a href="{{ route('home') }}">AnaSayfa</a></li>
                            @foreach($cats as $cat)
                                <li><a href="{{ route('home',['cat'=>  $cat->id]) }}">{{ $cat->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header top section start -->
    <!-- logo section start -->
    <div class="logo_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="logo">
                        <a href="{{ route('home') }}">
                            <h1 class="d-inline text-danger fon">NE</h1>
                            <h2 class="d-inline text-info fon">istersen</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- header section start -->
    <div class="header_section">
        <div class="container">
            <div class="containt_main">
                <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="{{ route('home') }}">AnaSayfa</a>

                    @foreach($cats as $cat)
                        <a href="{{ route('home',['cat'=>  $cat->id]) }}">{{ $cat->name }}</a>
                    @endforeach

                    <div style="height: 15px">
                        @if(auth()->user())
                            <a href="{{ route('user.dashbord') }}" class="profile d-flex flex-column align-items-center">
                                <img style="border-radius: 50%;" class="bg-white w-50 text-center" src="/image/user.svg" alt="user">
                                <p style="font-size: 1.2rem">{{ auth()->user()->name }}</p>
                            </a>
                            <form  action="{{ 'logout' }}" method="post">
                                @csrf
                                <button style="font-size: 1.5rem" class="btn btn-danger form-control">çıkış</button>
                            </form>
                        @else
                            <br>
                            <a  class="btn btn-success font-weight-bold" href="{{ route('login') }}">Giriş yap</a>
                        @endif
                    </div>
                </div>
                <span class="toggle_icon" onclick="openNav()"><img src="/images/toggle-icon.png"></span>
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TÜM KATEGORİLER
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item"  href="{{ route('home') }}">tüm</a>
                    @foreach($cats as $cat)
                            <a class="dropdown-item"  href="{{ route('home',['cat'=>  $cat->id]) }}">{{ $cat->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="main">
                    <!-- Another variation with a button -->
                    <varit></varit>
                    <form action="{{ route('search') }}">
                    <div class="input-group">
                        <input type="text" name="text" class="form-control" value="@isset($ser){{ $ser }} @endisset" placeholder="Ara...">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit" style="background-color: #f26522; border-color:#f26522 ">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="header_box">
                    <div class="login_menu">
                        <ul>
                            <li><a href="{{ route('cart') }}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true">
                                        <mark class="cartkh" id="cartbox">
                                            {{ session('cart')?count(session('cart')):0 }}
                                        </mark>
                                    </i>
                                    <span class="padding_10">Sepet</span></a>
                            </li>
                            {{--                            <li><a href="#">--}}
                            {{--                                    <i class="fa fa-user" aria-hidden="true"></i>--}}
                            {{--                                    <span class="padding_10">Cart</span></a>--}}
                            {{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- header section end -->
    <!-- banner section start -->
    <div class="banner_section layout_padding">
        <div class="container">
            <div id="my_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <!-- slider -->
                    <!--
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                        <div class="buynow_bt"><a href="#">Buy Now</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                        <div class="buynow_bt"><a href="#">Buy Now</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                                        <div class="buynow_bt"><a href="#">Buy Now</a></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                        -->
                </div>
            </div>
        </div>
        <!-- banner section end -->

    </div>




    @yield('content')


</div>

<!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
        <div class="footer_logo">
            <a href="{{ route('home') }}">
                <h1 class="text-danger d-inline">NE </h1>
                <h1 class="text-info d-inline">istersen</h1>
            </a>
        </div>

        <div class="footer_menu">
            <ul>
                <li><a href="{{ route('home') }}">AnaSayfa</a></li>
                @foreach($cats as $cat)
                    <li><a href="{{ route('home',['cat'=>  $cat->id]) }}">{{ $cat->name }}</a></li>
                @endforeach
            </ul>
        </div>
        </div>
        <div class="location_main">müşteri Hizmetleri : <a href="javascript:void(0)">{{ ENV('PHONE_NUMBER') }}</a></div>
    </div>
</div>

<!-- copyright section start -->
<div class="copyright_section">
    <div class="container">
        <p class="copyright_text">© 2020 copy Rights  </p>
    </div>
</div>


<!-- Javascript files-->
{{--<script src="js/jquery.min.js"></script>--}}
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>

{{--<script src="/js/jquery-3.0.0.min.js"></script>--}}
<script src="/js/jquery.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
<script src="/js/plugin.js"></script>
<!-- sidebar -->
<script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="/slider/slick.min.js"></script>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

    function rest() {
        setTimeout(function () {
            $(".note").fadeOut(1000);
        }, 3000);
    }

    $('.add').click(function () {
        add2 = $(this).attr("name");
        $.get("/ajax", {add2cart: add2}, function (data, status) {
            // alert (data+' '+status);
            if (status != "success") {
                $("body").append("<div class='note fixed-top alert alert-danger'>* invalid value</div>");
                rest();
            } else {
                $("#cartbox").html(data);
                $("body").append("<div class='note fixed-top alert alert-success'>* sepete eklendi</div>");
                rest();
            }
        });
    });

    $(".slider-area").slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
</script>

</body>
</html>
