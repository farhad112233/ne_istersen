<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>{{ env('APP_NAME') }} | onayla
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
    <style>
        body {
            background: #fafafa;
            font-family: 'Roboto Condensed';
        }
    </style>
</head>
<body class="banner_bg_mainnn">
<!-- banner bg main start -->
<div class="">
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
                <div class=" d-flex flex-wrap " style="margin-top: 50px; width: 500px;height: 50px">
                </div>
            </div>
        </div>
    </div>
</div>
@include('paresial.error')
{{--  content   --}}
<div class="d-flex flex-wrap box_main" style="min-height:80vh;margin:150px 10px; ">
    <div class="col-12 col-lg-6 ">
        <table class="table table-active">
            <tr>
                <th>name</th>
                <th>urun / fiyat</th>
            </tr>
            @foreach($products as $item)
                @php($pics=json_decode($item->imgpath))
                <tr>
                    <td>{{ $item->name }}</td>
                    <td><img width="60" src="{{ 'storage/imgProductTemp/'.$pics[0] }}" alt=""> {{ $item->price }} <span
                            class="text-danger">TL</span></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-12 col-lg-6">
        <div>Saygın: {{ $user }}</div>

        @if(gettype($addresses)==='object')
            <p>adreseniz:</p>
            <form action="{{ route('finishbuy') }}" method="post" class="d-flex flex-column">
                @csrf
                @foreach($addresses as $address)
                    <div class="d-flex flex-row align-items-center ">
                        <input id="id{{ $address->id }}" type="radio" name="successadress"
                               value="{{ $address->id }}" {{ $loop->index == 0?"checked" : "" }}>
                        <label for="id{{ $address->id }}" class="m-3 p-3 flex-fill" style="border-radius: 10px;border: 2px solid blue">
                            {{ $address->province }} &nbsp;&nbsp;
                            {{ $address->city }} &nbsp;&nbsp;
                            {{ $address->adress }} &nbsp;&nbsp;
                            {{ $address->zipcode }} &nbsp;&nbsp;
                            {{ $address->number }} &nbsp;&nbsp;
                        </label>
                    </div>
                @endforeach
                <div>
                    <a class="btn btn-danger m-3" href="{{ route('addaddress') }}">yeni bir adres ekle</a>
                    <button class="btn btn-success m-3">Bu adresle devam et</button>
                </div>

            </form>
        @else
            <div class="font-weight-bold text-danger fontt">
                adreseniz bulunamadı<br>
                Devam etmek için lütfen bir adres ekleyin <br>
                <a class="btn btn-success" href="{{ route('addaddress') }}">yeni bir adres ekle</a>
            </div>


        @endif
    </div>
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

    // ------------------
    // $(document).ready(function () {
    //     $('#Carousel').carousel({
    //         interval: 5000
    //     })
    // });
    // ---------------------
</script>
{{--

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
--}}

</body>
</html>
