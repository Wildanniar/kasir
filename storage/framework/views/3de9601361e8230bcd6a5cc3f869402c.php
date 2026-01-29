<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo e(route('dashboard')); ?>">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-cash-register"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kasir App </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?php echo e(request()->routeIs('dashboard') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            
            <?php if(auth()->user()->role === 'admin'): ?>

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <!-- Nav Item - Kategori -->
            <li class="nav-item <?php echo e(request()->routeIs('categories.*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('categories.index')); ?>">
                    <i class="fas fa-tags"></i>
                    <span>Kategori</span>
                </a>
            </li>

            

            <!-- Nav Item - User Admin -->
            <li class="nav-item <?php echo e(request()->routeIs('users.*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('admin.dashboard')); ?>">
                    <i class="fas fa-user-shield"></i>
                    <span>Manajemen User</span>
                </a>
            </li>

            <?php endif; ?>
            

            <!-- Heading Transaksi -->
            <div class="sidebar-heading">
                Transaksi
            </div>

            <!-- Transaksi (Admin & Kasir) -->
            <li class="nav-item <?php echo e(request()->routeIs('sales.*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('sales.index')); ?>">
                    <i class="fas fa-cash-register"></i>
                    <span>Transaksi</span>
                </a>
            </li>

            <!-- PRODUK (ADMIN & KASIR) -->
            <li class="nav-item <?php echo e(request()->routeIs('products.*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('products.index')); ?>">
                    <i class="fas fa-box"></i>
                    <span>Produk</span>
                </a>
            </li>

            <!-- Nav Item - Laporan -->
            <li class="nav-item <?php echo e(request()->routeIs('reports.*') ? 'active' : ''); ?>">
                <a class="nav-link" href="<?php echo e(route('reports.sales')); ?>">
                    <i class="fas fa-chart-line"></i>
                    <span>Laporan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul><?php /**PATH C:\xampp\htdocs\kasir\resources\views/partials/sidebar.blade.php ENDPATH**/ ?>