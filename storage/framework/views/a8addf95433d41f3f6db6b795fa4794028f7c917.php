<?php if($errors->any()): ?>
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="alert alert-danger "><?php echo e($error); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endif; ?>

<?php if(session('info')): ?>
    <?php if(session('status')=='ok'): ?>
        <div class="alert alert-success note"><?php echo e(session('info')); ?></div>
    <?php else: ?>
        <div class="alert alert-danger note"><?php echo e(session('info')); ?></div>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH D:\my\my project\laravel\p3\myProject\resources\views/paresial/error.blade.php ENDPATH**/ ?>