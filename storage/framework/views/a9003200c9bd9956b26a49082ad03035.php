<div class="form-group">
    <label>Kode Produk</label>
    <input type="text" name="code" class="form-control"
        value="<?php echo e(old('code',$product->code ?? '')); ?>">
</div>

<div class="form-group">
    <label>Nama Produk</label>
    <input type="text" name="name" class="form-control"
        value="<?php echo e(old('name',$product->name ?? '')); ?>">
</div>

<div class="form-group">
    <label>Kategori</label>
    <select name="category_id" class="form-control">
        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($c->id); ?>"
                <?php if(old('category_id',$product->category_id ?? '')==$c->id): echo 'selected'; endif; ?>>
                <?php echo e($c->name); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<div class="form-group">
    <label>Harga Jual</label>
    <input type="number" name="price_sell" class="form-control"
        value="<?php echo e(old('price_sell',$product->price_sell ?? '')); ?>">
</div>

<div class="form-group">
    <label>Stok</label>
    <input type="number" name="stock" class="form-control"
        value="<?php echo e(old('stock',$product->stock ?? '')); ?>">
</div>

<div class="form-group">
    <label>Gambar</label>
    <input type="file" name="image" class="form-control">
</div>
<?php /**PATH C:\xampp\htdocs\kasir\resources\views/products/form.blade.php ENDPATH**/ ?>