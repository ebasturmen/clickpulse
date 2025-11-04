<div class="p-2 mt-4">
    <form wire:submit.prevent="login">
        <div class="mb-3">
            <label for="email" class="form-label"><?php echo app('translator')->get('translation.email'); ?> <span class="text-danger">*</span></label>
            <input
                type="text"
                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                wire:model="email"
                id="email"
                name="email"
                placeholder="<?php echo app('translator')->get('translation.enter-email'); ?>"
            >
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                <span class="invalid-feedback" role="alert">
                    <strong><?php echo e($message); ?></strong>
                </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="mb-3">
            <div class="float-end">
                <a href="<?php echo e(route('password.update')); ?>" class="text-muted"><?php echo app('translator')->get('translation.forgot-password'); ?></a>
            </div>
            <label class="form-label" for="password-input"><?php echo app('translator')->get('translation.password'); ?> <span class="text-danger">*</span></label>
            <div class="position-relative auth-pass-inputgroup mb-3">
                <input
                    type="password"
                    class="form-control pe-5 password-input <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    wire:model="password"
                    placeholder="<?php echo app('translator')->get('translation.enter-password'); ?>"
                    id="password-input"
                >
                <button
                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                    type="button"
                    id="password-addon"
                >
                    <i class="ri-eye-fill align-middle"></i>
                </button>
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        </div>

        <div class="form-check">
            <input
                class="form-check-input"
                type="checkbox"
                wire:model="remember"
                id="auth-remember-check"
            >
            <label class="form-check-label" for="auth-remember-check"><?php echo app('translator')->get('translation.remember-me'); ?></label>
        </div>

        <div class="mt-4">
            <button class="btn btn-success w-100" type="submit" wire:loading.attr="disabled">
                <span wire:loading.remove><?php echo app('translator')->get('translation.sign-in'); ?></span>
                <span wire:loading><?php echo app('translator')->get('translation.signing-in'); ?>...</span>
            </button>
        </div>

        <!--[if BLOCK]><![endif]--><?php if($showSocialLogin): ?>
            <div class="mt-4 text-center">
                <div class="signin-other-title">
                    <h5 class="fs-13 mb-4 title"><?php echo app('translator')->get('translation.sign-in-with'); ?></h5>
                </div>
                <div>
                    <button type="button" class="btn btn-primary btn-icon waves-effect waves-light">
                        <i class="ri-facebook-fill fs-16"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-icon waves-effect waves-light">
                        <i class="ri-google-fill fs-16"></i>
                    </button>
                    <button type="button" class="btn btn-dark btn-icon waves-effect waves-light">
                        <i class="ri-github-fill fs-16"></i>
                    </button>
                    <button type="button" class="btn btn-info btn-icon waves-effect waves-light">
                        <i class="ri-twitter-fill fs-16"></i>
                    </button>
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </form>
</div>

<?php /**PATH /var/www/html/resources/views/livewire/login-form.blade.php ENDPATH**/ ?>