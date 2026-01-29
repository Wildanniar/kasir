

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Produk</h1>

    
    <?php if(auth()->user()->role === 'admin'): ?>
    <a href="<?php echo e(route('products.create')); ?>" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Produk
    </a>
    <?php endif; ?>

    <?php if(session('success')): ?>
        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($p->code); ?></td>
                        <td><?php echo e($p->name); ?></td>
                        <td><?php echo e($p->category->name); ?></td>
                        <td>Rp <?php echo e(number_format($p->price_sell)); ?></td>
                        <td><?php echo e($p->stock); ?></td>
                        <td>
                            
                            <?php if(auth()->user()->role === 'admin'): ?>
                                <a href="<?php echo e(route('products.edit',$p->id)); ?>"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <form method="POST" action="<?php echo e(route('products.destroy',$p->id)); ?>"
                                        class="d-inline">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button onclick="return confirm('Hapus produk?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            <?php else: ?>
                                
                                <span class="badge badge-info">View Only</span>
                            <?php endif; ?>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <?php echo e($products->links()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir\resources\views/products/index.blade.php ENDPATH**/ ?>