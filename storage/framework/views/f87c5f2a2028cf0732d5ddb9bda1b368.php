<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Aplikasi Kasir</title>

    <link href="<?php echo e(asset('vendor/fontawesome-free/css/all.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('css/sb-admin-2.min.css')); ?>" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-4">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">
                            Login Aplikasi Kasir
                        </h1>
                    </div>

                    
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <?php echo e($errors->first()); ?>

                        </div>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group">
                            <input type="email" name="email"
                                   class="form-control form-control-user"
                                   placeholder="Email" required autofocus>
                        </div>

                        <div class="form-group">
                            <input type="password" name="password"
                                   class="form-control form-control-user"
                                   placeholder="Password" required>
                        </div>

                        <button type="submit"
                                class="btn btn-primary btn-user btn-block">
                            Login
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo e(asset('vendor/jquery/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('vendor/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/sb-admin-2.min.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\kasir\resources\views/auth/login.blade.php ENDPATH**/ ?>