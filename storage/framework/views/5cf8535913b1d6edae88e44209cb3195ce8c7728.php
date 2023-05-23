<?php $__env->startSection('title','Kullanıcılar Listesi'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('paresial.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php if(isset($users)): ?>
    <table class="table table-hover">
        <tr>
            <th>id</th>
            <th>adı</th>
            <th>E-posta</th>
            <th>rulo</th>
            <th>doğrulanmış tarıhı</th>
            <th>aksyon</th>
        </tr>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($user['id']); ?></td>
                <td><?php echo e($user['name']); ?></td>
                <td><?php echo e($user['email']); ?></td>
                <td><?php echo e($user['rol']); ?></td>
                <td><?php echo e($user['email_verified_at']); ?></td>
                <td>
                    <div class="d-flex ">
                        <a href="<?php echo e(route('users.edit',$user->id)); ?>" class=" text-info col-6"><i class="fas fa-edit"></i></a>
                        <a href="<?php echo e(route('users.destroy',$user->id)); ?>" onclick="return confirm('Silinmeli mi?')" class=" text-danger col-6"><i class="fas fa-trash-alt"></i></a>


                    </div>
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <div class="d-flex justify-content-center pt-2" >
        <div>
            <?php echo e($users->withQueryString()->links()); ?>

        </div>

    </div>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my\my project\laravel\p3\myProject\resources\views/admin/showusers.blade.php ENDPATH**/ ?>