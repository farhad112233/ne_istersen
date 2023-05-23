<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="/js/jquery.min.js"></script>


    <style>
        .note{
         position: fixed;
            top: 0;
            left: 0;
            right: 0;
        }
        .adimg{
            width: 30px;
            height: 30px;
        }
        body{
            background-color: #ededee;
        }
        .fontt{
            font-size: 1.5rem;
        }
    </style>
    <title>Ne Itersen AdminPanel</title>
</head>
<body>
<!--  menu     -->
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand" href="<?php echo e(route('admin.dashbord')); ?>">Dashbord</a>
    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Kullanıcılar</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo e(route('users.list')); ?>">Kullanıcılar Listesi</a>
                    <a class="dropdown-item" href="<?php echo e(route('users.create')); ?>">yeni kullanım ekle</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">kategori</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo e(route('cat.show')); ?>">kategori Listesi</a>
                    <a class="dropdown-item" href="<?php echo e(route('cat.create')); ?>">yeni kategori Ekle</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Ürünler</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo e(route('product.show')); ?>">Ürün Listesi</a>
                    <a class="dropdown-item" href="<?php echo e(route('product.create')); ?>">Yeni Ürün Ekle</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('order.show')); ?>">Sipariş</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('addres.show')); ?>">address</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container-fluid bg-light p-lg-5 p-md-3">
    <h1> <?php echo $__env->yieldContent('title'); ?></h1>
</div>
<div class="container">
    <?php echo $__env->yieldContent('content'); ?>
</div>
<script src="/js/jquery.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.bundle.min.js"></script>
<script>
    function rest() {
        setTimeout(function (){ $(".note").fadeOut(1000); } , 3000);
    }
    rest();
</script>
</body>
</html>
<?php /**PATH D:\my\my project\laravel\p3\myProject\resources\views/admin/menu.blade.php ENDPATH**/ ?>