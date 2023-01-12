

<?php $__env->startSection('container'); ?>
<div class="row justify-content-center mb-3">

    <?php if(session()->has('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>

    <?php if(session()->has('loginError')): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo e(session('loginError')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php endif; ?>
    

    <div class="col-md-4">
        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please Login</h1>
                <form action="/login" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-floating">
                        <input value="<?php echo e(old('email')); ?>" required autofocus type="username" name="username" class="form-control <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="username" placeholder="Username">
                        <label for="floatingInput">Username</label>
                        <?php $__errorArgs = ['username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="form-floating">
                        <input required type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                    </div>
                
                    <button class="w-100 btn btn-lg btn-primary " type="submit">Login</button>
                </form>
                <small class="mt-3 d-block text-center">Not registerd? <a href="/register">Register Now</a></small>
        </main>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\tuf\meubelku\resources\views/login/index.blade.php ENDPATH**/ ?>