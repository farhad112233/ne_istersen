<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title><?php echo e(env('APP_NAME')); ?> | Özellik
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



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>

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
                            <li><a href="<?php echo e(route('home')); ?>">AnaSayfa</a></li>
                            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('home',['cat'=>  $cat->id])); ?>"><?php echo e($cat->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <a href="<?php echo e(route('home')); ?>">
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
                    <a href="<?php echo e(route('home')); ?>">AnaSayfa</a>

                    <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('home',['cat'=>  $cat->id])); ?>"><?php echo e($cat->name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div style="height: 15px">
                        <?php if(auth()->user()): ?>
                            <a href="<?php echo e(route('user.dashbord')); ?>" class="profile  d-flex flex-column align-items-center">
                                <img style="border-radius: 50%;" class="bg-white w-50 text-center" src="/image/user.svg" alt="user">
                                <p style="font-size: 1.2rem"><?php echo e(auth()->user()->name); ?></p>
                            </a>
                            <form  action="<?php echo e('logout'); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <button style="font-size: 1.5rem" class="btn btn-danger form-control">çıkış</button>
                            </form>
                        <?php else: ?>
                            <br>
                            <a  class="btn btn-success font-weight-bold" href="<?php echo e(route('login')); ?>">Giriş yap</a>
                        <?php endif; ?>
                    </div>
                    
                </div>
                <div>
                    <span class="toggle_icon " onclick="openNav()"><img src="/images/toggle-icon.png"></span>
                </div>
                <div class="header_box">
                    <div class="login_menu">
                        <ul>
                            <li><a href="<?php echo e(route('cart')); ?>">
                                    <i class="fa fa-shopping-cart" aria-hidden="true">
                                        <mark class="cartkh" id="cartbox">
                                            <?php echo e(session('cart')?count(session('cart')):0); ?>

                                        </mark>
                                    </i>
                                    <span class="padding_10">Sepet</span></a>
                            </li>
                            
                            
                            
                            
                        </ul>
                    </div>
                </div>


                

                <?php ($images=json_decode($product->imgpath)); ?>

                
                
                
                <div class="mainn d-flex flex-wrap " style="">
                    <div class="col-12 col-lg-6">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="carousel-item <?php if($loop->index==0): ?> active <?php endif; ?> ">
                                        <img class="d-block w-100 imagee" src="<?php echo e('/storage/imgProducts/'.$image); ?>"
                                             alt="First slide">
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        

                        
                        <div class="my-2 my-lg-3  shishe fontt">
                            <?php echo e($cati->name); ?> / <?php echo e($product->name); ?>

                        </div>
                        <div class="my-2 my-lg-3  shishe">
                            <span class="spann mx-2">
                                <?php echo number_format((float)$product->price, 2, '.', '') ?>  TL
                            </span>
                        </div>
                        <div class="my-2 my-lg-3  shishe">
                            <a id="add2cart" name="<?php echo e($product->id); ?>"
                               class="add btn btn-danger form-control font-weight-bold fontt text-black-50"
                               href="" onclick="return false">
                                sepete ekle
                            </a>
                        </div>
                        <div class="my-2 my-lg-3  shishe">
                            Özellikler :<br> <?php echo e($product->title); ?>

                        </div>



                        



                        

                    </div>
                    


                </div>


            </div>
        </div>
    </div>


    <?php echo $__env->yieldContent('content'); ?>


</div>

<!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
        <div class="footer_logo"><h1 class="text-danger d-inline">NE </h1>
            <a href="<?php echo e(route('home')); ?>">
                <h1 class="text-info d-inline">istersen</h1>
            </a>
        </div>

        <div class="footer_menu">
            <ul>
                <li><a href="<?php echo e(route('home')); ?>">AnaSayfa</a></li>
                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><a href="<?php echo e(route('home',['cat'=>  $cat->id])); ?>"><?php echo e($cat->name); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        </div>
        <div class="location_main">müşteri Hizmetleri : <a href="javascript:void(0)"><?php echo e(ENV('PHONE_NUMBER')); ?></a></div>
    </div>
</div>

<!-- copyright section start -->
<div class="copyright_section">
    <div class="container">
        <p class="copyright_text">© 2020 copy Rights </p>
    </div>
</div>


<!-- Javascript files-->

<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>

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
<?php /**PATH D:\my\my project\laravel\p3\myProject\resources\views/seemore.blade.php ENDPATH**/ ?>