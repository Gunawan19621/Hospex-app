<?php $__env->startSection('content'); ?>
<div class="m-grid m-grid--hor m-grid--root m-page">
    <div class="m-login m-login--signin  m-login--5" id="m_login" style="background-image: <?php echo e(url('assets11/app/media/img//bg/bg-3.jpg')); ?>;">

        <div class="m-login__wrapper-2 m-portlet-full-height">
            <div class="m-login__contanier">
                <div class="m-login__signin">
                    <div class="m-login__head">
                        <h3 class="m-login__title">Forgot Password</h3>
                    </div>
                    <form class="m-login__form m-form" method="POST" action="<?php echo e(route('front.forgotPasswordPost')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-group m-form__group">
                            <input id="email" class="form-control m-input m-login__form-input--last <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" type="email" name="email" required autocomplete="current-email" placeholder="email" required>
                            <?php echo $errors->first('email', '<em for="email" class="state-error">:message</em>'); ?>

                        </div>
                        
                        <div class="m-login__form-action mb-0">
                            <button type="submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air">Forgot Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/hospex2020/hospex_admin/resources/views/auth/passwords/forgot.blade.php ENDPATH**/ ?>