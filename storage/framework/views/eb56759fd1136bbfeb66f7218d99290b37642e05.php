<?php $__env->startSection('title','Dashbord'); ?>

<?php $__env->startSection('content'); ?>

<div>
    <pre>
        <ul>
            <li class="fontt">Kullanıcılar sayısı : => <?php echo e($users); ?></li>
            <li class="fontt">kategori sayısı     : => <?php echo e($cats); ?></li>
            <li class="fontt">Ürünler sayısı      : => <?php echo e($products); ?></li>
            <li class="fontt">Sipariş sayısı      : => <?php echo e($orders); ?></li>
            <li class="fontt">address sayısı      : => <?php echo e($addresses); ?></li>
        </ul>
    </pre>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my\my project\laravel\p3\myProject\resources\views/admin/index.blade.php ENDPATH**/ ?>