<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>{{ env('APP_NAME') }} | Özellik
    </title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">


    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/slider/slick-theme.min.css">
    <link rel="stylesheet" href="/slider/slick.min.css">
    <link rel="stylesheet" href="/css3/owel_jquery.css">
    <link rel="stylesheet" href="/css3/responsive.css">
    <link rel="stylesheet" href="/css3/style.css">

    <!-- slider-->
{{--    <link rel="stylesheet" href="/CURS/style.css"/>--}}
{{--    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">--}}

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
{{--    <script src="/CURS/jquery.flickgal.js"></script>--}}
    <style>
        body {
            background: #fafafa;
            font-family: 'Roboto Condensed';
        }
    </style>
    <script>
        $(function () {
            var $message = $('.message');

            $('.yourFlickgalWrap').flickGal({
                'infinitCarousel': true
            })
                .on('fg_flickstart', function (e, index) {
                    $message.html('The event <b>fg_flickstart</b> is dispatched.');
                })
                .on('fg_flickend', function (e, index) {
                    $message.html('The event <b>fg_flickend</b> is dispatched.');
                })
                .on('fg_change', function (e, index) {
                    $message.html('The event <b>fg_change</b> is dispatched.');
                });
        });
    </script>

</head>
<body>
<!-- banner bg main start -->
<div class="banner_bg_mainn">
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
                            <a href="{{ route('user.dashbord') }}" class="profile  d-flex flex-column align-items-center">
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
                    {{--
                      <a href="fashion.html">Fashion</a>
                      <a href="electronic.html">Electronic</a>
                      <a href="jewellery.html">Jewellery</a>
                      --}}
                </div>
                <div>
                    <span class="toggle_icon " onclick="openNav()"><img src="/images/toggle-icon.png"></span>
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


                {{--                ****************--}}

                @php($images=json_decode($product->imgpath))

                {{--
                @foreach($images as $image)
                    <img src="{{ '/storage/imgProductTemp/'.$image }}" alt="">
                @endforeach
                --}}
                {{--                    @dd($a)--}}
                {{--                    @dd($product->imgpath)--}}
                <div class="mainn d-flex flex-wrap " style="">
                    <div class="col-12 col-lg-6">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($images as $image)
                                    <div class="carousel-item @if($loop->index==0) active @endif ">
                                        <img class="d-block w-100 imagee" src="{{ '/storage/imgProducts/'.$image }}"
                                             alt="First slide">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                               data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                               data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6">
                        {{--                        @dd($product)--}}

                        {{--                        **--}}
                        <div class="my-2 my-lg-3  shishe fontt">
                            {{ $cati->name }} / {{ $product->name }}
                        </div>
                        <div class="my-2 my-lg-3  shishe">
                            <span class="spann mx-2">
                                <?php echo number_format((float)$product->price, 2, '.', '') ?>  TL
                            </span>
                        </div>
                        <div class="my-2 my-lg-3  shishe">
                            <a id="add2cart" name="{{ $product->id }}"
                               class="add btn btn-danger form-control font-weight-bold fontt text-black-50"
                               href="" onclick="return false">
                                sepete ekle
                            </a>
                        </div>
                        <div class="my-2 my-lg-3  shishe">
                            Özellikler :<br> {{ $product->title }}
                        </div>



                        {{--
                            "id" => 5
                            "catId" => 1
                            "name" => "re"
                            "imgpath" => "["2021-05-15-08-19-36-391334.jpg","2021-05-15-08-19-36-652285.jpg","2021-05-15-08-19-36-889757.jpg","2021-05-15-08-19-36-462405.jpg","2021-05-15-08-19-36-400746 ▶"
                            "number" => 3
                            "title" => "f  fvfdv fdv fdv fd"
                            "price" => 223
                            "created_at" => "2021-05-15 08:19:36"
                        --}}



                        {{--                        **--}}

                    </div>
                    {{--                    ********************--}}


                </div>


            </div>
        </div>
    </div>


    @yield('content')


</div>

<!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
        <div class="footer_logo"><h1 class="text-danger d-inline">NE </h1>
            <a href="{{ route('home') }}">
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
        <p class="copyright_text">© 2020 copy Rights </p>
    </div>
</div>


<!-- Javascript files-->
{{--<script src="js/jquery.min.js"></script>--}}
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
{{--<script src="/js/jquery-3.0.0.min.js"></script>--}}
<script src="/js/jquery.min.js"></script>
<script src="/js/plugin.js"></script>
<!-- sidebar -->
<script src="/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }

</script>
<script type="text/javascript">

//ajax add to cart
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
            // $("#cartbox").html(noo);
            $("body").append("<div class='note fixed-top alert alert-success'>* sepete eklendi</div>");
            rest();
        }
    });
});
//ajax add to cart






</script>
</body>
</html>
