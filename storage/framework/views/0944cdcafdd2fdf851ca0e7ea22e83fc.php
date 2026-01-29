<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(url('/dashboard')); ?>">
        <div class="sidebar-brand-icon">
            <i class="fas fa-cash-register"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Aplikasi Kasir</div>
    </a>

    <hr class="sidebar-divider my-0">

    
    <?php if(auth()->user()->role === 'admin'): ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>

    <?php else: ?>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('kasir.dashboard')); ?>">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
    <?php endif; ?>

    <hr class="sidebar-divider">

    
    <?php if(auth()->user()->role === 'admin'): ?>
        <div class="sidebar-heading">Admin</div>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('products.index')); ?>">
                <i class="fas fa-fw fa-box"></i>
                <span>Produk</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('categories.index')); ?>">
                <i class="fas fa-tags"></i>
                <span>Kategori</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-users"></i>
                <span>User</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('sales.index')); ?>">
                <i class="fas fa-cash-register"></i>
                <span>Transaksi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-chart-line"></i>
                <span>Laporan</span>
            </a>
        </li>
        
    <?php endif; ?>

    
    <?php if(auth()->user()->role === 'kasir'): ?>
        <div class="sidebar-heading">Kasir</div>

        <li class="nav-item">
            <a class="nav-link" href="<?php echo e(route('sales.index')); ?>">
                <i class="fas fa-cash-register"></i>
                <span>Transaksi</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-history"></i>
                <span>Riwayat</span>
            </a>
        </li>
    <?php endif; ?>

    <hr class="sidebar-divider d-none d-md-block">

    
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<?php /**PATH C:\xampp\htdocs\kasir\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>