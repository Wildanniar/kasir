

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Penjualan</h1>

    <form method="GET" class="row mb-3">
        <div class="col-md-3">
            <input type="date" name="start_date" class="form-control"
                   value="<?php echo e(request('start_date')); ?>">
        </div>
        <div class="col-md-3">
            <input type="date" name="end_date" class="form-control"
                   value="<?php echo e(request('end_date')); ?>">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary">Filter</button>
        </div>
        <div class="col-md-4 text-right">
            <a href="<?php echo e(route('reports.sales.pdf')); ?>" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> PDF
            </a>
            <a href="<?php echo e(route('reports.sales.excel')); ?>" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Excel
            </a>
        </div>
    </form>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Kasir</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($s->created_at->format('d-m-Y')); ?></td>
                        <td><?php echo e($s->invoice); ?></td>
                        <td><?php echo e($s->user->name); ?></td>
                        <td>Rp <?php echo e(number_format($s->total)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">TOTAL</th>
                        <th>Rp <?php echo e(number_format($total)); ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\kasir\resources\views/reports/sales.blade.php ENDPATH**/ ?>