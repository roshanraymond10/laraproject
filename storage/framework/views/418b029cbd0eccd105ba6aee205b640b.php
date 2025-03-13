<?php $__env->startSection('title', 'User'); ?>
<?php $__env->startSection('body'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/login.css']); ?>
    <div class="col-12 d-flex justify-content-center align-items-center " id="login">
        <div class="col-md-6 col-lg-6  img-fluid text-center d-none d-lg-block">
            <img src=<?php echo e(asset('images/inter.jpeg')); ?> alt="LoginPage">
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-4">
            <div class="border p-5">
                <div class="h6 text-center text-muted red mt-3">
                    <p>Login</p>
                </div>
                <form method="POST" action="<?php echo e(route('login')); ?>">
                    <?php echo csrf_field(); ?>
                    <div class="mb-1 ">
                        <input type="email" name="email" class="formborder form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" placeholder="Phone number,username, or email">
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="alert alert-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="mb-3 ">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger mb-1 text-start"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="mb-1 ">
                        <input type="password" name="password" class=" form-control" id="exampleInputPassword1"
                            placeholder="password">
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="alert alert-danger"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class=" mb-3">
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="text-danger mb-1 text-start"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class=" mb-1">
                        <button type="submit" class="btn lightblue w-100 text-light">Login</button>
                    </div>
                    <div>
                        
                    <div class="text-center">
                        <a href="<?php echo e(route('password.request')); ?>">forget password?</a>
                    </div>
                </form>
            </div>
            <div class="border mt-3 w-100 p-3 text-center">
                <p>Don't have an account? <a href="<?php echo e(route('register')); ?>">Sign up</a></p>
            </div>
            
        </div>
        <div class="col-0 col-sm-0 col-md-0 col-lg-2"></div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Instagram-Clone\resources\views/auth/login.blade.php ENDPATH**/ ?>