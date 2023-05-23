<?php $__env->startSection('title','dashbord'); ?>

<?php $__env->startSection('content'); ?>

    
    <div class="d-flex flex-wrap box_main" style="min-height:80vh;margin:50px 10px 10px 10px; ">
        <div class="m-2">
            <?php if(isset($orders) && count($orders)>0): ?>

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="m-2">
                        <div class="imgtogle">
                            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php ($picnames=json_decode($item)); ?>
                                    <img class="imageee" src="<?php echo e('/storage/imgProductTemp/'.$picnames[0]); ?>" alt="">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div><?php echo e($orders[$key]['created_at']); ?></div> <!-- tarih -->

                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <div style="font-size: 3rem">
                    Siparişiniz bulunamadı
                </div>
                <div><a href="<?php echo e(route('home')); ?>">Alışverişe Devam Et</a></div>
            <?php endif; ?>
        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my\my project\laravel\p3\myProject\resources\views/dashbord.blade.php ENDPATH**/ ?>