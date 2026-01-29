<!DOCTYPE html>
<html>
<head>
    <title>Struk Pembayaran</title>
    <style>
        @page {
        size: A4;
        margin: 20mm;
    }

    body {
        font-family: Arial, sans-serif;
        font-size: 12px;
        margin: 0;
        padding: 0;
    }

    .struk {
        width: 100%;
    }

    .header {
        text-align: center;
        margin-bottom: 20px;
    }

    .info,
    .total {
        margin-bottom: 15px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th,
    table td {
        border-bottom: 1px solid #ddd;
        padding: 6px 0;
        text-align: left;
    }

    table th {
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
    }

    .text-right {
        text-align: right;
    }

    .footer {
        text-align: center;
        margin-top: 30px;
        font-size: 11px;
    }

    @media print {
        button {
            display: none;
        }
    }
    </style>
</head>
<body>

<div class="struk">
    <center>
        <strong>NAMA TOKO</strong><br>
        Alamat Toko<br>
        Telp: 08xxxxxxxx<br>
    </center>

    <hr>

    <p>
        Invoice : <?php echo e($sale->invoice); ?><br>
        Tanggal : <?php echo e($sale->created_at->format('d/m/Y H:i')); ?><br>
        Kasir   : <?php echo e($sale->user->name); ?>

    </p>

    <hr>

    <?php $__currentLoopData = $sale->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <p>
            <?php echo e($item->product->name); ?><br>
            <?php echo e($item->qty); ?> x <?php echo e(number_format($item->price)); ?>

            <span style="float:right">
                <?php echo e(number_format($item->subtotal)); ?>

            </span>
        </p>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <hr>

    <p>
        Total :
        <span style="float:right">
            <?php echo e(number_format($sale->total)); ?>

        </span><br>

        Bayar :
        <span style="float:right">
            <?php echo e(number_format($sale->paid)); ?>

        </span><br>

        Kembali :
        <span style="float:right">
            <?php echo e(number_format($sale->change)); ?>

        </span>
    </p>

    <hr>

    <center>
        *** TERIMA KASIH ***<br>
        Barang yang sudah dibeli<br>
        tidak dapat dikembalikan
    </center>

    <br>

    <center>
        <button onclick="window.print()">PRINT</button>
    </center>
</div>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\kasir\resources\views/sales/receipt.blade.php ENDPATH**/ ?>