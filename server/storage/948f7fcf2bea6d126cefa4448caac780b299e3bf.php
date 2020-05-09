<?php $__env->startSection('title', '商品詳細'); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startSection('maincopy', '商品詳細'); ?>

    <?php if($item !== ''): ?>
        <div class="headcopy">商品名</div><hr>
        <div class="text"><?php echo e($item->product_name); ?></div>

        <div class="headcopy">商品説明</div><hr>
        <div class="text"><?php echo e($item->product_content); ?></div>
    <?php endif; ?>

    <a href="/product"><img src="<?php echo e(asset('img/edit.svg')); ?>" class="add" alt="topへ"></a>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>