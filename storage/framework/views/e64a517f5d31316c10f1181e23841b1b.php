<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('translation.signup'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index" class="d-inline-block auth-logo">
                                    <img src="<?php echo e(URL::asset('build/images/logo-light.png')); ?>" alt="" height="80">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium"><?php echo app('translator')->get('translation.register-subtitle'); ?></p>
                        </div>

                        <div class="row d-flex">
                            <div class="col-6 ms-auto">
                                <div class="step-arrow-nav mb-4" id="step-navigation">
                                    <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link step-nav-item" data-step="1">
                                                <?php echo app('translator')->get('translation.register-step-my-account'); ?>
                                            </div>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link step-nav-item" data-step="2">
                                                <?php echo app('translator')->get('translation.register-step-subscription'); ?>
                                            </div>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link step-nav-item" data-step="3">
                                                <?php echo app('translator')->get('translation.register-step-payment-information'); ?>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-3">
                                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('language-selector');

$__html = app('livewire')->mount($__name, $__params, 'lw-4186140704-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card overflow-hidden m-0">
                            <div class="row justify-content-center g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg-small h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4 text-center">
                                                <img class="mb-1" src="<?php echo e(URL::asset('build/images/google.png')); ?>"alt="Google API" height="70">
                                                <h5 class="mb-2">Google API verified</h5>
                                                <h2>More than a free trial</h2>
                                                <h2 class="col--grad-green">An opportunity for better traffic</h2>
                                                <h5 class="mt-3 fs-14 fw-medium">We help you block fake clicks, bots, and invalid traffic. And we’re ready to show you the data for all this with automated reports. All set up and ready to 🚀 in minutes.</h5>
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
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators"data-bs-slide-to="2" aria-label="Slide 3"></button>
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

                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <script>
                                document.write(new Date().getFullYear())
                            </script> Velzon. Crafted with <i
                                    class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('build/libs/particles.js/particles.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/particles.app.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/form-validation.init.js')); ?>"></script>
    <script>
        function updateStepNavigation(step) {
            document.querySelectorAll('.step-nav-item').forEach(function(item) {
                if (parseInt(item.getAttribute('data-step')) === step) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        }

        // Livewire event listener
        document.addEventListener('livewire:init', () => {
            Livewire.on('step-updated', (data) => {
                updateStepNavigation(data.step);
            });

            // Component her güncellendiğinde step'i kontrol et
            Livewire.hook('morph.updated', ({ component, el }) => {
                if (component && component.fingerprint && component.fingerprint.name === 'register-form') {
                    const stepElement = el.querySelector('[data-step]');
                    if (stepElement) {
                        const step = parseInt(stepElement.getAttribute('data-step'));
                        updateStepNavigation(step);
                    }
                }
            });
        });

        // İlk yüklemede step'i kontrol et
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(function() {
                const registerForm = document.querySelector('[data-step]');
                if (registerForm) {
                    const step = parseInt(registerForm.getAttribute('data-step'));
                    updateStepNavigation(step);
                }
            }, 100);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/register.blade.php ENDPATH**/ ?>