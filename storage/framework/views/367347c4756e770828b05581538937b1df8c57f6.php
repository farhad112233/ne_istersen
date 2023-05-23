<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title><?php echo e(env('APP_NAME')); ?> | ödeme
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
                <div class=" d-flex flex-wrap " style="margin-top: 50px; width: 500px;height: 50px">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex flex-wrap box_main" style="min-height:80vh;margin:50px 10px 150px 10px; ">
    <div class="col-12 col-lg-6 ">
        <table class="table table-active">
            <tr>
                <th>name</th>
                <th>urun / fiyat</th>
            </tr>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php ($pics=json_decode($item->imgpath)); ?>
            <tr>
                <td><?php echo e($item->name); ?></td>
                <td><img width="60" src="<?php echo e('storage/imgProductTemp/'.$pics[0]); ?>" alt=""> <?php echo e($item->price); ?> <span
                        class="text-danger">TL</span></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>
    <div class="col-12 col-lg-6">
        <div>Saygın: <?php echo e($user); ?></div>

        <?php if(gettype($addresses)==='object'): ?>
        <p>adreseniz:</p>
            <?php $__currentLoopData = $addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="d-flex flex-row align-items-center ">
                <dıv for="id<?php echo e($address->id); ?>" class="m-3 p-3 flex-fill" style="border-radius: 10px;border: 2px solid blue">
                    <?php echo e($address->province); ?> &nbsp;&nbsp;
                    <?php echo e($address->city); ?> &nbsp;&nbsp;
                    <?php echo e($address->adress); ?> &nbsp;&nbsp;
                    <?php echo e($address->zipcode); ?> &nbsp;&nbsp;
                    <?php echo e($address->number); ?> &nbsp;&nbsp;
                </dıv>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <a class="btn btn-success m-3" href="<?php echo e(route('finishbuyget')); ?>">Onayla</a>
        <?php endif; ?>
    </div>
</div>

<!-- footer section start -->
<div class="footer_section layout_padding">
    <div class="container">
        <div class="footer_logo">
            <a href="<?php echo e(route('home')); ?>">
                <h1 class="text-danger d-inline">NE </h1>
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

    // ------------------
    // $(document).ready(function () {
    //     $('#Carousel').carousel({
    //         interval: 5000
    //     })
    // });
    // ---------------------
</script>


</body>
</html>
<?php /**PATH D:\my\my project\laravel\p3\myProject\resources\views/finishbuy.blade.php ENDPATH**/ ?>