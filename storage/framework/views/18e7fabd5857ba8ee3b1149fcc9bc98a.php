

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
<h1 class="h3 mb-4">Edit Produk</h1>

<form action="<?php echo e(route('products.update',$product->id)); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>

<?php echo $__env->make('products.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<button class="btn btn-primary">Update</button>
<a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary">Kembali</a>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir\resources\views/products/edit.blade.php ENDPATH**/ ?>