

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
<h1 class="h3 mb-4">Tambah Kategori</h1>

<form action="<?php echo e(route('categories.store')); ?>" method="POST">
<?php echo csrf_field(); ?>

<div class="form-group">
    <label>Nama Kategori</label>
    <input type="text" name="name" class="form-control" required>
</div>

<button class="btn btn-primary">Simpan</button>
<a href="<?php echo e(route('categories.index')); ?>" class="btn btn-secondary">Kembali</a>
</form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir\resources\views/categories/create.blade.php ENDPATH**/ ?>