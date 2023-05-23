<?php $__env->startSection('title',$catss->name); ?>

<?php $__env->startSection('content'); ?>
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital"><?php echo e($catss->name); ?></h1>
                        <div class="fashion_section_2">
                            <div class="row">
                                <?php $__currentLoopData = $catss->product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <div class="col-lg-4 col-sm-6 col-md-6">
                                        <div class="box_main" style="width: 300px">
                                            <h4 class="shirt_text"><?php echo e($pro->name); ?></h4>
                                            <p class="price_text">Price <span style="color: #262626;"><?php echo e($pro->price); ?> TL</span>
                                            </p>
                                            <?php ($imgpaths=json_decode($pro->imgpath)); ?>
                                            <div>
                                                <div class="pb-3">
                                                    <section class="slider-area slider">
                                                        <?php $__currentLoopData = $imgpaths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $imgpath): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <div>
                                                                <img src="<?php echo e('/storage/imgProductTemp/'.$imgpath); ?>"
                                                                     width="200" height="200"
                                                                     class="mx-auto text-center">
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </section>
                                                </div>
                                            </div>
                                            <div class="btn_main">
                                                <div class="buy_bt">
                                                    <a class="add" id="add2cart" name="<?php echo e($pro->id); ?>"
                                                       href="" onclick="return false">
                                                        sepete ekle
                                                    </a>
                                                </div>
                                                <div class="seemore_bt">
                                                    <a href="<?php echo e(route('seemore',$pro->id)); ?>">daha fazla gör</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>














    <!-- jewellery  section start
    <div class="jewellery_section">
        <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
            <div class="loader_main">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my\my project\laravel\p3\myProject\resources\views/home-showcat.blade.php ENDPATH**/ ?>