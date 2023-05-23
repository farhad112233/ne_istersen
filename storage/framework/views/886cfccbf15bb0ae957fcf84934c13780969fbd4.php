<?php $__env->startSection('title','Users List'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('paresial.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(isset($products)): ?>
        <table class="table table-hover">
            <tr>
                <th>no</th>
                <th>kategori</th>
                <th>adı</th>
                <th>foto</th>
                <th>sayısı</th>
                <th>Özellikler</th>
                <th>fıyatı</th>
                <th>aksiyon</th>
            </tr>

            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(isset($product)): ?>
                <tr>
                    <td><?php echo e($product->id); ?></td>
                    <td><?php echo e($product->cat->name); ?></td>
                    <td><?php echo e($product->name); ?></td>
                    <?php ($images=json_decode($product->imgpath)); ?>
                    <td>
                        <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img class="adimg" src="<?php echo e('/storage/imgProductTemp/'.$image); ?>"   alt="">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </td>
                    <td><?php echo e($product->number); ?></td>
                    <td><?php echo e($product->title); ?></td>
                    <td><?php echo e($product->price); ?></td>
                    <td>
                        <div class="d-flex ">
                            <a href="<?php echo e(route('product.edit',$product->id)); ?>" class=" text-info col-6"><i class="fas fa-edit"></i></a>
                            <a href="<?php echo e(route('product.destroy',$product->id)); ?>" onclick="return confirm('Silinmeli mi?')" class=" text-danger col-6"><i class="fas fa-trash-alt"></i></a>
                        </div>
                    </td>
                </tr>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <div class="d-flex justify-content-center pt-2" >
            <div>
                <?php echo e($products->withQueryString()->links()); ?>

            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\my\my project\laravel\p3\myProject\resources\views/admin/showProducts.blade.php ENDPATH**/ ?>