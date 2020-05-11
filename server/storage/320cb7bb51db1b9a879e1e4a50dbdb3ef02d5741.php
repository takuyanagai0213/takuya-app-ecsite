<?php $__env->startSection('title', 'ECサイト'); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startSection('maincopy', '投稿してください'); ?>

    <!-- 投稿フォーム -->
    <form action="/product" method="post">
        <?php echo e(csrf_field()); ?>


        <?php if($errors->has('product_name')): ?>
            <div class="error_msg"><?php echo e($errors->first('product_name')); ?></div>
        <?php endif; ?>
        <input type="text" class="form" name="product_name" placeholder="商品名" value="<?php echo e(old('product_name')); ?>">

        <?php if($errors->has('product_content')): ?>
            <div class="error_msg"><?php echo e($errors->first('product_content')); ?></div>
        <?php endif; ?>
        <div>
            <textarea class="form" name="product_content" placeholder="詳細"><?php echo e(old('product_content')); ?></textarea>
        </div>
        
        <input type="submit" class="create" value="出品">
    </form>

    <!-- 記事描画部分 -->
    <?php if(count($items) > 0): ?>
        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="alert alert-primary" role="alert">
                <a href="/product/<?php echo e($item->id); ?>" class="alert-link"><?php echo e($item->product_name); ?></a>
                <form action="/product/<?php echo e($item->id); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class="delete" value="削除">
                </form>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div>商品がありません</div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>