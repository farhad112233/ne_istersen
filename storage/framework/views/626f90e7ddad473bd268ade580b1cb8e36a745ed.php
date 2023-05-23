<?php $__env->startSection('title','kategori Listesi'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('paresial.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(isset($cats)): ?>
        <table class="table table-hover">
            <tr>
                <th>sıra no</th>
                <th>adı</th>
                <th>aksyon</th>
            </tr>
            <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($cat['sort']); ?></td>
                    <td><?php echo e($cat['name']); ?></td>
                    <td>
                        <div class="d-flex ">
                            <a href="<?php echo e(route('cat.edit',$cat->id)); ?>" class=" text-info col-6"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo e(route('cat.destroy',$cat->id)); ?>" onclick="return confirm('Silinmeli mi?')" class=" text-danger col-6"><i class="fas fa-trash-alt"></i></a>


                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>


    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my\my project\laravel\p3\myProject\resources\views/admin/showcat.blade.php ENDPATH**/ ?>