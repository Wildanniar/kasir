

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
<h1 class="h3 mb-4">Transaksi Kasir</h1>

<?php if(session('error')): ?>
<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
<?php endif; ?>

<div class="row">
<div class="col-md-7">
    <div class="card shadow">
        <div class="card-header">Produk</div>
        <div class="card-body">
            <table class="table table-bordered">
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($p->name); ?></td>
                    <td>Rp <?php echo e(number_format($p->price_sell)); ?></td>
                    <td>
                        <form action="<?php echo e(route('sales.add')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($p->id); ?>">
                            <button class="btn btn-success btn-sm">Tambah</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </table>
        </div>
    </div>
</div>

<div class="col-md-5">
    <div class="card shadow">
        <div class="card-header">Keranjang</div>
        <div class="card-body">
            <?php $total=0; ?>
            <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $subtotal = $item['qty']*$item['price']; $total+=$subtotal; ?>
                <div class="d-flex justify-content-between">
                    <span><?php echo e($item['name']); ?> (<?php echo e($item['qty']); ?>)</span>
                    <span>Rp <?php echo e(number_format($subtotal)); ?></span>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <hr>
            <h5>Total: Rp <?php echo e(number_format($total)); ?></h5>

            <form action="<?php echo e(route('sales.checkout')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <input type="number" name="paid" class="form-control mb-2" placeholder="Uang Bayar" required>
                <button class="btn btn-primary btn-block">Bayar</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir\resources\views/sales/index.blade.php ENDPATH**/ ?>