<div class="card overflow-hidden m-0">
        <div class="row justify-content-center g-0" wire:key="register-form" data-step="<?php echo e($step); ?>">
            <div class="col-lg-6">
                <div class="p-lg-5 p-4 auth-one-bg-small h-100">
                    <div class="bg-overlay"></div>
                    <div class="position-relative h-100 d-flex flex-column">
                        <div class="mb-4 text-center">
                            <img class="mb-1" src="<?php echo e(URL::asset('build/images/google.png')); ?>" alt="Google API" height="70">
                            <h5 class="mb-2">Google API verified</h5>
                            <h2>More than a free trial</h2>
                            <h2 class="col--grad-green">An opportunity for better traffic</h2>
                            <h5 class="mt-3 fs-14 fw-medium">We help you block fake clicks, bots, and invalid traffic. And we're ready to show you the data for all this with automated reports. All set up and ready to 🚀 in minutes.</h5>
                            <h5 class="mt-4">Easy Installation, No developer needed</h5>
                        </div>
                        <div class="mt-auto">
                            <div class="mb-3">
                                <i class="ri-double-quotes-l display-5 text-success"></i>
                            </div>

                            <div id="qoutescarouselIndicators" class="carousel slide"
                                data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner text-center text-black-50 pb-5">
                                    <div class="carousel-item active" wire:ignore.self>
                                        <p class="fs-15 fst-italic">"Just copy and paste a few lines of code into your website."</p>
                                    </div>
                                    <div class="carousel-item" wire:ignore.self>
                                        <p class="fs-15 fst-italic">"Just copy and paste a few lines of code into your website."</p>
                                    </div>
                                    <div class="carousel-item" wire:ignore.self>
                                        <p class="fs-15 fst-italic">"Just copy and paste a few lines of code into your website."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 tab-content">
                <!-- Step 1: Account Information -->
                <div class="tab-pane fade <?php if($step == 1): ?>show active <?php endif; ?>" id="steparrow-gen-info" role="tabpanel">
                    <div>
                        <div class="p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary">Get your free account</h5>
                                <p class="text-muted mb-1">Install in minutes and start blocking fraud today.</p>
                            </div>
                            <div class="p-2">
                                <div class="mb-3">
                                    <label for="website" class="form-label">Website to Protect</label>
                                    <input type="text" class="form-control <?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="website" wire:model.lazy="website" placeholder="example.com" required autofocus="autofocus">
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['website'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" wire:model.lazy="email" placeholder="protext@example.com" required>
                                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="invalid-feedback d-block" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                </div>

                                <div class="mb-2">
                                    <label for="password-input" class="form-label">Password</label>
                                    <div class="position-relative auth-pass-inputgroup mb-1">
                                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password-input" wire:model.lazy="password" required>
                                        <button style="right: 4%!important;" class="btn btn-link position-absolute end-50 top-0 text-decoration-none text-muted" type="button" id="password-addon">
                                            <i class="ri-eye-fill align-middle"></i>
                                        </button>
                                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <p class="mb-0 fs-12 text-muted fst-italic">Your password must be at least 8 characters. We recommend at least 1 lowercase, 1 uppercase, and 1 number.</p>
                                </div>

                                <div class="mt-4">
                                    <div class="hstack gap-2 justify-content-between">
                                        <div class="hstack flex-wrap gap-2 w-100">
                                            <button type="button" class="btn btn-success btn-load w-100" wire:click="firstStepSubmit" wire:loading.attr="disabled">
                                                <span wire:loading wire:target="firstStepSubmit" class="d-flex align-items-center">
                                                    <span wire:loading wire:target="firstStepSubmit" class="spinner-border flex-shrink-0" style="margin-right: 6px" role="status">
                                                        <span wire:loading wire:target="firstStepSubmit" class="visually-hidden">Next</span>
                                                    </span>
                                                    <span class="flex-grow-1" wire:loading wire:target="firstStepSubmit">Processing</span>
                                                    <span class="flex-grow-1" wire:loading.remove wire:target="firstStepSubmit">Next</span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!--[if BLOCK]><![endif]--><?php if(config('auth.social_login')): ?>
                                    <div class="mt-3 text-center">
                                        <div class="signin-other-title">
                                            <h5 class="fs-13 mb-4 title text-muted"><?php echo e(__('auth.register_create_account_with')); ?></h5>
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
                            </div>
                        </div>

                        <div class="mb-2 text-center">
                            <p class="mb-0">Already have an account ? <a href="<?php echo e(route('login')); ?>" class="fw-semibold text-primary text-decoration-underline"> Sign in</a></p>
                        </div>
                    </div>
                </div>

                <!-- Step 2: Subscription -->
                <div class="tab-pane fade <?php if($step == 2): ?>show active <?php endif; ?>" id="steparrow-description-info" role="tabpanel">
                    <div>
                        <div class="p-4">
                            <div class="text-center mt-2">
                                <h5 class="text-primary"><?php echo e(__('auth.register_subscription')); ?></h5>
                                <p class="text-muted mb-1"><?php echo e(__('auth.register_subscription_message')); ?></p>
                            </div>
                            <div class="p-2">
                                <!--[if BLOCK]><![endif]--><?php if($selected_plan): ?>
                                    <div class="mb-3">
                                        <div class="card mb-1">
                                            <div class="card-body">
                                                <h4 class="card-title">
                                                    <?php echo e($selected_plan->title ?? ''); ?> <?php echo e(__('plan.title')); ?>

                                                    <!--[if BLOCK]><![endif]--><?php if($selected_plan->title && str_contains(strtolower($selected_plan->title), 'professional')): ?>
                                                        <span class="badge badge-gradient-primary ms-2"><?php echo e(__('global.popular')); ?></span>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </h4>
                                                <p class="card-text text-muted">
                                                    <?php if($selected_plan->title && str_contains(strtolower($selected_plan->title), 'basic')): ?>
                                                        <?php echo e(__("global.basic_plan_subtitle")); ?>

                                                    <?php elseif($selected_plan->title && str_contains(strtolower($selected_plan->title), 'professional')): ?>
                                                        <?php echo e(__("global.pro_plan_subtitle")); ?>

                                                    <?php elseif($selected_plan->title && str_contains(strtolower($selected_plan->title), 'enterprise')): ?>
                                                        <?php echo e(__("global.enterprise_plan_subtitle")); ?>

                                                    <?php else: ?>
                                                        <?php echo e(__("global.basic_plan_subtitle")); ?>

                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                </p>

                                                <!--[if BLOCK]><![endif]--><?php if(isset($selected_plan->features) && $selected_plan->features): ?>
                                                    <?php
                                                        $adClicksFeature = $selected_plan->features->where('name', 'ad-clicks')->first();
                                                        $domainsFeature = $selected_plan->features->where('name', 'domains')->first();
                                                    ?>

                                                    <!--[if BLOCK]><![endif]--><?php if($adClicksFeature): ?>
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0">
                                                                <i class="ri-checkbox-circle-fill text-primary"></i>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2 text-muted">
                                                                Up to <span class="fw-bold text-primary"><?php echo e(number_format($adClicksFeature->charges ?? 0)); ?></span> Ad Clicks
                                                            </div>
                                                        </div>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                    <!--[if BLOCK]><![endif]--><?php if($domainsFeature): ?>
                                                        <div class="d-flex">
                                                            <div class="flex-shrink-0">
                                                                <i class="ri-checkbox-circle-fill text-primary"></i>
                                                            </div>
                                                            <div class="flex-grow-1 ms-2 text-muted">
                                                                <span class="fw-bold text-primary"><?php echo e(number_format($domainsFeature->charges ?? 0)); ?></span>
                                                                <?php echo e(__('plan.website')); ?>

                                                            </div>
                                                        </div>
                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                                <button type="button" class="btn btn-soft-primary w-100 mt-3" data-bs-toggle="modal" data-bs-target="#plan-modal">
                                                    <?php echo e(__("global.change_plan")); ?>

                                                </button>

                                                <!-- Additional Plan Features -->
                                                <div class="mt-4 pt-3 border-top">
                                                    <div class="row g-3">
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="ri-shield-check-line text-success fs-18"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2">
                                                                    <small class="text-muted d-block"><?php echo e(__('plan.monitoring_and_blocking')); ?></small>
                                                                    <span class="fw-semibold fs-13"><?php echo e(__('plan.device_fingerprinting')); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="ri-time-line text-info fs-18"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2">
                                                                    <small class="text-muted d-block"><?php echo e(__('global.setup')); ?></small>
                                                                    <span class="fw-semibold fs-13"><?php echo e(__('global.instant_activation')); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="ri-shield-user-line text-warning fs-18"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2">
                                                                    <small class="text-muted d-block"><?php echo e(__('plan.detection')); ?></small>
                                                                    <span class="fw-semibold fs-13"><?php echo e(__('plan.vpn_and_proxy_blocking')); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-shrink-0">
                                                                    <i class="ri-google-fill text-primary fs-18"></i>
                                                                </div>
                                                                <div class="flex-grow-1 ms-2">
                                                                    <small class="text-muted d-block"><?php echo e(__('plan.automated')); ?></small>
                                                                    <span class="fw-semibold fs-13"><?php echo e(__('plan.automated_google_ads_blocking')); ?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Plan Summary -->
                                                <div class="mt-3 p-3 bg-light rounded">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <div class="fw-bold fs-16 text-success"><?php echo e(__('global.14_day')); ?> <?php echo e(__('global.free_trial')); ?></div>
                                                            <small class="text-muted"><?php echo e(__('auth.register_payment_title_message')); ?></small>
                                                            <div class="mt-2">
                                                                <div class="fw-bold fs-20">€<?php echo e($selected_plan->price ?? 0); ?>

                                                                    <small class="text-muted">/<?php echo e($payment_term === 'year' ? __('global.year') : __('global.month')); ?></small>
                                                                    <!--[if BLOCK]><![endif]--><?php if($payment_term === 'year'): ?>
                                                                        <span class="badge bg-dark ms-2"><?php echo e(__('global.save_20_percent')); ?></span>
                                                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                                <div class="mt-4">
                                    <div class="hstack gap-2 justify-content-between">
                                        <div class="hstack flex-wrap gap-2 w-100">
                                            <button type="button" class="btn btn-success btn-load w-100" wire:click="secondStepSubmit" wire:loading.attr="disabled">
                                                <span wire:loading wire:target="secondStepSubmit" class="d-flex align-items-center">
                                                    <span wire:loading wire:target="secondStepSubmit" class="spinner-border flex-shrink-0" style="margin-right: 6px" role="status">
                                                        <span wire:loading wire:target="secondStepSubmit" class="visually-hidden"><?php echo e(__('global.next')); ?></span>
                                                    </span>
                                                    <span class="flex-grow-1" wire:loading wire:target="secondStepSubmit"><?php echo e(__('auth.processing')); ?></span>
                                                    <span class="flex-grow-1" wire:loading.remove wire:target="secondStepSubmit"><?php echo e(__('global.next')); ?></span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3: Payment Information -->
                <div class="tab-pane fade <?php if($step == 3): ?>show active <?php endif; ?>" id="pills-experience" role="tabpanel">
                    <div class="p-4">
                        <div class="text-center mt-2 mb-4">
                            <h5 class="text-primary"><?php echo e(__("auth.register_payment_title")); ?></h5>
                            <p class="text-muted mb-1"><?php echo e(__("auth.register_payment_title_message")); ?></p>
                        </div>
                        <div class="p-2">
                            <div class="mb-2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label"><?php echo e(__('global.name')); ?></label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" wire:model.lazy="name" placeholder="<?php echo e(__('global.name_placeholder')); ?>" required <?php if($loading): ?>disabled <?php endif; ?>>
                                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="surname" class="form-label"><?php echo e(__('global.surname')); ?></label>
                                            <input type="text" class="form-control <?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="surname" wire:model.lazy="surname" placeholder="<?php echo e(__('global.surname_placeholder')); ?>" required <?php if($loading): ?>disabled <?php endif; ?>>
                                            <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['surname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong><?php echo e($message); ?></strong>
                                                </span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                                        </div>
                                    </div>
                                </div>
                                <div id="card-element" wire:ignore></div>
                                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['payment_method_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger d-block mt-2">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                            </div>

                            <div class="mt-4">
                                <div class="hstack gap-2 justify-content-between">
                                    <button class="btn btn-outline-success w-25" type="button" wire:click="backStep" <?php if($loading): ?>disabled <?php endif; ?>>
                                        <?php echo e(__("global.previous")); ?>

                                    </button>
                                    <div class="hstack flex-wrap gap-2 justify-content-end w-75">
                                        <button type="button" class="btn btn-success btn-load w-100" id="finish-button" <?php if($loading): ?>disabled <?php endif; ?>>
                                            <span class="d-flex align-items-center">
                                                <!--[if BLOCK]><![endif]--><?php if($loading): ?>
                                                    <span class="spinner-border flex-shrink-0" style="margin-right: 6px" role="status">
                                                        <span class="visually-hidden"><?php echo e(__('global.next')); ?></span>
                                                    </span>
                                                    <span class="flex-grow-1"><?php echo e(__('auth.processing')); ?></span>
                                                <?php else: ?>
                                                    <span class="flex-grow-1"><?php echo e(__('global.finish') ?? __('global.next')); ?></span>
                                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <p class="text-muted fs-13 text-center mt-4">
                                <?php echo e(__('auth.register_terms_message')); ?> <a class="text-primary" href="#"><?php echo e(__('global.terms_of_service')); ?></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
<?php /**PATH /var/www/html/resources/views/livewire/register-form.blade.php ENDPATH**/ ?>