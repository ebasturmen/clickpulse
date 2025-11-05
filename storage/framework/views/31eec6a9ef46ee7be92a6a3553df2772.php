<div class="p-2 mt-4" wire:key="register-form" data-step="<?php echo e($step); ?>">
    <form wire:submit.prevent="register" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="useremail" class="form-label">Email <span class="text-danger">*</span></label>
            <input
                type="email"
                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                wire:model="email"
                name="email"
                id="useremail"
                placeholder="Enter email address"
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
            <label for="username" class="form-label">Username <span class="text-danger">*</span></label>
            <input
                type="text"
                class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                wire:model="name"
                name="name"
                id="username"
                placeholder="Enter username"
            >
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
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
            <label for="userpassword" class="form-label">Password <span class="text-danger">*</span></label>
            <input
                type="password"
                class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                wire:model="password"
                name="password"
                id="userpassword"
                placeholder="Enter password"
            >
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

        <div class="mb-3">
            <label for="input-password" class="form-label">Confirm Password <span class="text-danger">*</span></label>
            <input
                type="password"
                class="form-control <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                wire:model="password_confirmation"
                name="password_confirmation"
                id="input-password"
                placeholder="Enter Confirm Password"
            >
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password_confirmation'];
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
            <div class="form-floating-icon">
                <i data-feather="lock"></i>
            </div>
        </div>

        <div class="mb-3">
            <label for="input-avatar">Avatar <span class="text-danger">*</span></label>
            <input
                type="file"
                class="form-control <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                wire:model="avatar"
                name="avatar"
                id="input-avatar"
                accept="image/jpeg,image/jpg,image/png"
            >
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['avatar'];
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
            <!--[if BLOCK]><![endif]--><?php if($avatar): ?>
                <div class="mt-2">
                    <small class="text-muted">Preview:</small><br>
                    <img src="<?php echo e($avatar->temporaryUrl()); ?>" alt="Avatar preview" class="img-thumbnail mt-2" style="max-width: 200px;">
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
            <div class="">
                <i data-feather="file"></i>
            </div>
        </div>

        <div class="mb-3">
            <label for="payment-method" class="form-label">Payment Method <span class="text-danger">*</span></label>
            <input
                type="text"
                class="form-control <?php $__errorArgs = ['payment_method'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                wire:model="payment_method"
                name="payment_method"
                id="payment-method"
                placeholder="Stripe payment method token"
            >
            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['payment_method'];
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
            <small class="text-muted">This will be replaced with Stripe Elements integration</small>
        </div>

        <div class="mb-3">
            <p class="mb-0 fs-12 text-muted fst-italic">By registering you agree to the
                Velzon <a href="#"
                    class="text-primary text-decoration-underline fst-normal fw-medium">Terms
                    of Use</a></p>
        </div>

        <div class="mt-3">
            <button class="btn btn-success w-100" type="submit" wire:loading.attr="disabled">
                <span wire:loading.remove>Sign Up</span>
                <span wire:loading>Signing Up...</span>
            </button>
        </div>

        <div class="mt-3 text-center">
            <div class="signin-other-title">
                <h5 class="fs-13 mb-4 title text-muted">Create account with</h5>
            </div>

            <div>
                <button type="button"
                    class="btn btn-primary btn-icon waves-effect waves-light"><i
                        class="ri-facebook-fill fs-16"></i></button>
                <button type="button"
                    class="btn btn-danger btn-icon waves-effect waves-light"><i
                        class="ri-google-fill fs-16"></i></button>
                <button type="button"
                    class="btn btn-dark btn-icon waves-effect waves-light"><i
                        class="ri-github-fill fs-16"></i></button>
                <button type="button"
                    class="btn btn-info btn-icon waves-effect waves-light"><i
                        class="ri-twitter-fill fs-16"></i></button>
            </div>
        </div>
    </form>
</div>

<?php /**PATH /var/www/html/resources/views/livewire/register-form.blade.php ENDPATH**/ ?>